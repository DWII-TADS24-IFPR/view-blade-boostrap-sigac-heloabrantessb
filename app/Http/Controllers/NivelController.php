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
        return view("niveis.create");
    }

    public function store(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255'
        ]);  

        Nivel::create([
            'nome' => $request->input('nome')
        ]);

        return redirect()->route("niveis.index")->with('success', 'Nivel criado com sucesso!');
    }

    public function show(string $id){
        $nivel = Nivel::findOrFail($id);

        return view('niveis.show')->with('niveis', $nivel);
    }

    public function update(Request $request, string $id){
        $nivel = Nivel::find($id);

        //adicionar validação caso o nivel nao exista
        if(isset($nivel)){
            $nivel->nome = $request->nome;

            $nivel->save();

            return redirect()->route('niveis.index');
        }
        return '<h1>Não foi possivel atualizar a informação</h1>';
    }

    public function destroy(string $id){
        $nivel = Nivel::findOrFail($id);

        $nivel->delete();

        return redirect()->route('niveis.index');
    }
}

