<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Nivel;

class DeclaracaoController extends Controller
{
    public function index()
    {
        $declaracoes = Declaracao::all();

        return view('declaracoes.index')->with('declaracoes', $declaracoes);//View
    }

    public function create()
    {
        return view('declaracoes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hash' => 'required|string',
            'data' => 'required|date'
        ]);

        Declaracao::create($validated);

        return redirect()->route("declaracoes.index")->with('success', 'Declaração criado com sucesso!');
    }

    public function show(string $id)
    {
        $declaracao = Declaracao::findOrFail($id);

        return view('declaracoes.show')->with('declaracao', $declaracao);
    }

    public function edit(string $id)
    {
        $declaracao = Declaracao::findOrFail($id);

         return view('declaracoes.edit')->with('declaracao', $declaracao);
    }

    public function update(Request $request, string $id)
    {
        $declaracao = Declaracao::findOrFail($id);
    
        $validated = $request->validate([
            'hash' => 'required|string',
            'data' => 'required|date'
        ]);

        $declaracao->hash = $validated['hash'];
        $declaracao->data = $validated['data'];

        $declaracao->save();

        return redirect()->route('declaracoes.index');
    }

    public function destroy(string $id)
    {
        $declaracao = Declaracao::findOrFail($id);

        $declaracao->delete();

        return redirect()->route('declaracao.index');
    }
}
