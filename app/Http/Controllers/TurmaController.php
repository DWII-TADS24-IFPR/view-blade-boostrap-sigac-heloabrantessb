<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Nivel;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();

        return view('turmas.index')->with('turmas', $turmas);
    }

    public function create()
    {
        return view('turmas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ano' => 'required|integer',
            'curso_id' => 'required|exists:cursos,id'
        ]);

        Turma::create($validated);

        return redirect()->route('turmas.index')->with('success', 'Turmas criada com sucesso');
    }

    public function show(string $id)
    {
        $turma = Turma::findOrFail($id);

        return view('turmas.show')->with('turma', $turma);
    }

    public function edit(string $id)
    {
        $turma = Turma::findOrFail($id);

        return view('turmas.edit')->with('turma', $turma);
    }

    public function update(Request $request, string $id)
    {
        $turma = Turma::findOrFail($id);

        $validated = $request->validate([
            'ano' => 'required|integer',
        ]);

        $turma->ano = $validated['ano'];

        $turma->save();

        return redirect()->route('turmas.index');
    }

    public function destroy(string $id)
    {
        $turma = Turma::findOrFail($id);

        $turma->delete();

        return redirect()->route('turmas.index');
    }
}
