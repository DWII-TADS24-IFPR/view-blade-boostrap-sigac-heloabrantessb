<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Curso;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();

        return view('cursos.index')->with('cursos', $cursos);
    }

    public function create()
    {
        return view('cursos.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|min:2',
            'total_horas' => 'required|integer'
        ]);

        Curso::create($validated);

        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso!');
    }

    public function show(string $id)
    {
        $curso = Curso::findOrFail($id);

        return view('cursos.show')->with('curso', $curso);
    }

    public function edit(string $id)
    {
        $curso = Curso::findOrFail($id);
        
        return view('cursos.edit')->with('curso', $curso);
    }

    public function update(Request $request, string $id)
    {
        $curso = Curso::findOrFail($id);
        
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|min:2',
            'total_horas' => 'required|integer'
        ]);

        $curso->nome = $validated['nome'];
        $curso->sigla = $validated['sigla'];
        $curso->total_horas = $validated['total_horas'];

        $curso->save();

        return redirect()->route('cursos.index');

    }

    public function destroy(string $id)
    {
        $curso = Curso::findOrFail($id);

        $curso->delete();

        return redirect()->route('cursos.index');
    }
}
