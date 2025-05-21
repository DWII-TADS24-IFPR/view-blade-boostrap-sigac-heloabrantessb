<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Aluno;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all();

        return view('alunos.index')->with('alunos', $alunos);
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'cpf' => 'required|max:14',
        'email' => 'required|max:255|email',
        'telefone' => 'max:15',
        'senha' => 'required|string|min:8',
        'curso_id' => 'required|exists:cursos, id',
        'turma_id' => 'required|exists:turmas, id',
        ]);

        Aluno::create([
            'nome' => $validated['nome'],
            'cpf' => $validated['cpf'],
            'email' => $validated['email'],
            'telefone' => $validated['telefone'],
            'senha' => $validated['telefone'],
        ]);
        
        return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso!');
    }

    public function show(string $id)
    {
        $aluno = Aluno::findOrFail($id);

        return view('alunos.show')->with('aluno', $aluno);
    }

    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);

        return view('alunos.edit')->with('aluno', $nivel);
    }

    public function update(Request $request, string $id)
    {
        $aluno = Aluno::findOrFail($id);

        $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'cpf' => 'required|max:14',
        'email' => 'required|max:255|email',
        'telefone' => 'max:15',
        'senha' => 'required|string|min:8',
        'curso_id' => 'required|exists:cursos, id',
        'turma_id' => 'required|exists:turmas, id',
        ]);


        $aluno->nome = $validated['nome'];
        $aluno->cpf = $validated['cpf'];
        $aluno->email = $validated['email'];
        $aluno->telefone= $validated['telefone'];

        $aluno->save();

        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
            $aluno = Aluno::findOrFail($id);
        
            $aluno->delete();

            return redirect()->route('alunos.index');
    }
    
}
