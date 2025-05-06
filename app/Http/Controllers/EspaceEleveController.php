<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Evaluation;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EspaceEleveController extends Controller
{
    public function dashboard()
    {
        $eleve = Eleve::with(['classe.niveau', 'classe.anneeScolaire'])
            ->where('id_user', Auth::id())
            ->firstOrFail();

        $evaluationsRecentes = Evaluation::with(['matiere', 'enseignant'])
            ->where('id_classe', $eleve->id_classe)
            ->whereDate('date_evaluation', '<=', now())
            ->orderByDesc('date_evaluation')
            ->get();

        $dernieresNotes = Note::with(['evaluation.matiere', 'evaluation.enseignant'])
            ->where('id_eleve', $eleve->id)
            ->orderByDesc('created_at')
            ->get();

        return view('espace_eleve.dashboard', [
            'eleve' => $eleve,
            'evaluationsRecentes' => $evaluationsRecentes,
            'dernieresNotes' => $dernieresNotes
        ]);
    }
    
    /**
     * Afficher le profil de l'élève
     */
    public function profil()
    {
        $eleve = Auth::user()->eleve;
        return view('espace_eleve.profil', compact('eleve'));
    }
    
    /**
     * Mettre à jour le profil de l'élève
     */
    public function updateProfil(Request $request)
    {
        $eleve = Auth::user()->eleve;
        
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'adresse' => 'nullable|string',
            'email' => 'nullable|email|max:100',
            'tel' => 'nullable|string|max:15',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        // Mise à jour des champs de base
        $eleve->nom = $request->nom;
        $eleve->prenom = $request->prenom;
        $eleve->adresse = $request->adresse;
        $eleve->email = $request->email;
        $eleve->tel = $request->tel;
        
        // Traitement de la photo
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($eleve->photo && Storage::exists('public/photos/' . $eleve->photo)) {
                Storage::delete('public/photos/' . $eleve->photo);
            }
            
            // Enregistrer la nouvelle photo
            $photoName = time() . '_' . $eleve->id . '.' . $request->photo->extension();
            $request->photo->storeAs('public/photos', $photoName);
            $eleve->photo = $photoName;
        }
        
        $eleve->save();
        
        // Mise à jour du mot de passe utilisateur si fourni
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|string|min:8|confirmed',
            ]);
            
            $user = Auth::user();
            $user->password = Hash::make($request->password);
            $user->save();
        }
        
        return redirect()->route('eleve.profil')->with('success', 'Votre profil a été mis à jour avec succès.');
    }
    
    /**
     * Afficher toutes les évaluations de l'élève
     */
    public function evaluations()
    {
        $eleve = Auth::user()->eleve;
        
        // Récupérer les évaluations pour la classe de l'élève
        $evaluations = Evaluation::where('id_classe', $eleve->id_classe)
            ->with(['matiere', 'enseignant'])
            ->orderBy('date_evaluation', 'desc')
            ->get();
        
        // Récupérer les notes de l'élève
        $notes = Note::where('id_eleve', $eleve->id)
            ->get()
            ->keyBy('id_evaluation');
        
        return view('espace_eleve.evaluations', compact('eleve', 'evaluations', 'notes'));
    }
    
    /**
     * Afficher toutes les notes de l'élève groupées par matière
     */
    public function notes()
    {
        $eleve = Auth::user()->eleve;
        
        // Récupérer toutes les notes de l'élève avec leurs évaluations et matières
        $notes = Note::where('id_eleve', $eleve->id)
            ->with(['evaluation.matiere'])
            ->get();
        
        // Grouper les notes par matière
        $notesParMatiere = [];
        foreach ($notes as $note) {
            if ($note->evaluation && $note->evaluation->matiere) {
                $matiereId = $note->evaluation->matiere->id;
                $matiereName = $note->evaluation->matiere->nom_matiere;
                
                if (!isset($notesParMatiere[$matiereId])) {
                    $notesParMatiere[$matiereId] = [
                        'nom' => $matiereName,
                        'coefficient' => $note->evaluation->matiere->coefficient,
                        'notes' => [],
                        'moyenne' => 0
                    ];
                }
                
                $notesParMatiere[$matiereId]['notes'][] = $note;
            }
        }
        
        // Calculer la moyenne par matière
        foreach ($notesParMatiere as $matiereId => $data) {
            $totalNotes = 0;
            $totalCoef = 0;
            
            foreach ($data['notes'] as $note) {
                $totalNotes += $note->valeur;
                $totalCoef++;
            }
            
            $notesParMatiere[$matiereId]['moyenne'] = $totalCoef > 0 ? $totalNotes / $totalCoef : 0;
        }
        
        // Calculer la moyenne générale
        $moyenneGenerale = 0;
        $totalCoefficients = 0;
        
        foreach ($notesParMatiere as $data) {
            $moyenneGenerale += $data['moyenne'] * $data['coefficient'];
            $totalCoefficients += $data['coefficient'];
        }
        
        $moyenneGenerale = $totalCoefficients > 0 ? $moyenneGenerale / $totalCoefficients : 0;
        
        return view('espace_eleve.notes', compact('eleve', 'notesParMatiere', 'moyenneGenerale'));
    }
    
    /**
     * Détails d'une évaluation spécifique
     */
    public function detailEvaluation($id)
    {
        $eleve = Auth::user()->eleve;
        
        $evaluation = Evaluation::with(['matiere', 'enseignant', 'classe'])
            ->findOrFail($id);
        
        // Vérifier que l'évaluation concerne bien la classe de l'élève
        if ($evaluation->id_classe != $eleve->id_classe) {
            return redirect()->route('eleve.evaluations')
                ->with('error', 'Vous n\'avez pas accès à cette évaluation.');
        }
        
        // Récupérer la note de l'élève pour cette évaluation
        $note = Note::where('id_eleve', $eleve->id)
            ->where('id_evaluation', $evaluation->id)
            ->first();
        
        return view('espace_eleve.detail_evaluation', compact('eleve', 'evaluation', 'note'));
    }
}
