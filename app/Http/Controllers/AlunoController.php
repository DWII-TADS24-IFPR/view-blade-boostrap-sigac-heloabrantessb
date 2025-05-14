<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aluno;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all();

        return view('alunos.index')->('alunos', $alunos);
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|max:14',
            'email' => 'required|max:255',
            'telefone' => 'max:15'
        ]);

        Aluno::create([
            'nome' => $request->input('nome'),
            'cpf' => $request->input('cpf'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone')
        ]);
        
        return redirect()->('alunos.index')->with('success', 'Aluno criado com sucesso!');
    }

    public function show(string $id)
    {
        $alunos = Aluno::find($id);

        return view('alunos.show')->with('alunos', $alunos);
    }

    public function edit(string $id)
    {
       
    }

    public function update(Request $request, string $id)
    {
         $aluno = Aluno::find($id);

        //adicionar validação caso o aluno nao exista
        if(isset($aluno)){
            $aluno->nome = $request->nome;
            $aluno->cpf = $request->cpf;
            $aluno->email = $request->email;
            $aluno->telefone= $request->telefone;

            $aluno->save();

            return redirect()->route('alunos.index');
        }
        return '<h1>Não foi possivel atualizar a informação</h1>';
    }

    public function destroy(string $id)
    {
        $aluno = Aluno::find($id);
        
        if(isset($aluno)){
            $aluno->delete();
            return '<h1>Registro deletado com sucesso!</h1>';
        }
        return '<h1>Não foi possivel deletar o registro!</h1>';
    }
}
