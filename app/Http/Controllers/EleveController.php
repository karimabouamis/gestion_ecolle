<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleve;
use App\Models\Classe;

class EleveController extends Controller
{
   
    public function index()
    {
        $eleves = Eleve::all();
        $classes=Classe::all();
        return view('eleve.index', compact('eleves','classes'));
    }

    public function create()
    {
        $classes=Classe::all();
        return view('eleve.create',compact('classes'));
    }
    
    public function store(Request $request)
    {
       
       $data = $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'adresse' => 'required|string|max:255',
            'email' => 'nullable|email|max:100',  
            'genre' => 'required|string|max:50',
            'tel' => 'nullable|string|max:50',     
            'id_classe'=> 'required|exists:classes,id',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);


            if($request->hasFile('photo')){
                $data['photo']=$request->file('photo')->store('photos','public');
            }


            
            $eleve = new Eleve();
            $eleve->nom = $request->nom;
            $eleve->prenom = $request->prenom;
            $eleve->adresse = $request->adresse;
            $eleve->email = $request->email;
            $eleve->genre = $request->genre;
            $eleve->tel = $request->tel;
            $eleve->id_classe = $request->id_classe;
            $eleve->photo = $request->file('photo')->hashName();

            $eleve->save();

        return redirect()->route('eleve.index')->with('success', 'Élève créé avec succès.');
    }



    public function edit(Eleve $eleve)
    {
        $classes=Classe::all();
        return view('eleve.edit', compact('classes','eleve'));
    }
    

    public function update(Request $request, Eleve $eleve)
    {
        
       $data = $validated = $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'adresse' => 'required|string|max:255',
            'email' => 'nullable|email|max:100',  
            'genre' => 'required|string|max:50',
            'tel' => 'nullable|string|max:50',    
            'classe'=> 'nullable|string|max:50',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if($request-> hasFile('photo')){
            $data['photo']=$request->file('photo')->store('photos','public');
        }


        $eleve->update($validated);

        return redirect()->route('eleve.index')->with('success', 'eleve mise à jour.');
    }

    public function destroy(Eleve $eleve)
    {
        $eleve->delete();
        return redirect()->route('eleve.index')->with('success', 'Eleve supprimé avec succès.');
    }
}