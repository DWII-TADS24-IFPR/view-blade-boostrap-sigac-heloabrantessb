<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comprovante;

class ComprovanteController extends Controller
{
    public function index()
    {
        $comprovantes = Comprovante::all();

        return view('comprovantes.index')->with('comprovantes', $comprovantes);
    }

    public function create()
    {
        return view('comprovantes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'horas' => 'required|integer',
            'atividade' => 'required|string|max:255'
        ]);

        Comprovante::create($validated);

        return redirect()->route('comprovantes.index')->with('success', 'Comprovante gerado com sucesso!');
    }

    public function show(string $id)
    {
        $comprovante = Comprovante::findOrFail($id);

        return view('comprovantes.show')->with('comprovante', $comprovante);
    }

    public function edit(string $id)
    {
        $comprovante = Comprovante::findOrFail($id);

         return view('comprovantes.edit')->with('comprovante', $comprovante);
    }

    public function update(Request $request, string $id)
    {
        $comprovante = Comprovante::findOrFail($id);

        $validated = $request->validate([
            'horas' => 'required|integer',
            'atividade' => 'required|string|max:255',
        ])

        $comprovante->horas = $validated['horas'];
        $comprovante->atividade= $validated['atividade'];

        $comprovante->save();

        return redirect()->route('comprovantes.index');
    }

    public function destroy(string $id)
    {
        $comprovante = Comprovante::findOrFail($id);

        $comprovante->delete();

        return redirect()->route('comprovantes.index'); 
    }
}
