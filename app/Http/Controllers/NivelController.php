<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Nivel;

class NivelController extends Controller
{
    public function index(){//Controller

        $niveis = Nivel::all();//Model

        return view('niveis.index')->with('niveis', $niveis);//View
    }

    public function create(){
        return view('niveis.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nome' => 'required|string|max:255'
        ]);  

        Nivel::create($validated);

        return redirect()->route("niveis.index")->with('success', 'Nivel criado com sucesso!');
    }

    public function show(string $id){
        $nivel = Nivel::findOrFail($id);

        return view('niveis.show')->with('nivel', $nivel);
    }

    public function edit(string $id){
        $nivel = Nivel::findOrFail($id);

        return view('niveis.edit')->with('nivel', $nivel);
    }

    public function update(Request $request, string $id){
        $nivel = Nivel::findOrFail($id);
        
        $validated = $request->validate([
            'nome' => 'required|string|max:255'
        ]);  


        $nivel->nome = $validated['nome'];

        $nivel->save();

        return redirect()->route('niveis.index');
    }

    public function destroy(string $id){
        $nivel = Nivel::findOrFail($id);

        $nivel->delete();

        return redirect()->route('niveis.index');
    }
}

