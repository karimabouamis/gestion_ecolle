<?php

namespace App\Http\Controllers;
use App\Models\Enseignant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EnseignantController extends Controller
{
    public function index()
    {
        $enseignants = Enseignant::all();
        return view('enseignant.index', compact('enseignants'));
    }

    public function create()
    {
        return view('enseignant.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'adresse' => 'nullable|string',
            'email' => 'nullable|email|max:100',
            'tel' => 'nullable|string|max:15',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
      
    
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }
    
        $enseignant = new Enseignant();
        $enseignant->nom = $request->nom;
        $enseignant->prenom = $request->prenom;
        $enseignant->adresse = $request->adresse;
        $enseignant->email = $request->email;
        $enseignant->tel = $request->tel;
        $enseignant->photo = $request->file('photo')->hashName();

        $enseignant->save();
    
        return redirect()->route('enseignant.index')->with('success', 'Enseignant ajouté avec succès.');
    }



    public function edit(Enseignant $enseignant)
    {
        return view('enseignant.edit', compact('enseignant'));
    }



    public function update(Request $request, Enseignant $enseignant)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'adresse' => 'nullable|string',
            'email' => 'nullable|email|max:100',
            'tel' => 'nullable|string|max:15',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        
        if ($request->hasFile('photo')) {
          
            if ($enseignant->photo) {
                Storage::delete('public/' . $enseignant->photo);
            }
           
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $enseignant->update($data);

        return redirect()->route('enseignant.index')->with('success', 'Enseignant modifié avec succès.');
    }



    
    public function destroy(Enseignant $enseignant)
    {
       
        if ($enseignant->photo) {
            Storage::delete('public/' . $enseignant->photo);
        }
        
        $enseignant->delete();
        return redirect()->route('enseignant.index')->with('success', 'Enseignant supprimé avec succès.');
    }
}
