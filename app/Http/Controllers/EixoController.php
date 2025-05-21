<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Eixo;

class EixoController extends Controller
{
    public function index()
    {
        $eixos = Eixo::all();

        return view('eixos.index')->with('eixos', $eixos);
    }

    public function create()
    {
        return view('eixos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|maz:255'
        ]);

        return redirect()->route("eixos.index")->with('success', 'Eixo criado com sucesso!');
    }

    public function show(string $id)
    {
        $eixo = Eixo::findOrFail($id);

        return view('eixos.show')->with('eixo', $eixo);
    }

    public function edit(string $id)
    {
        $eixo = Eixo::findOrFail($id);

        return view('eixos.edit')->with('eixo', $eixo);
    }

    public function update(Request $request, string $id)
    {
        $eixo = Eixo::findOrFail($id);

         $validated = $request->validate([
            'nome' => 'required|string|maz:255'
        ]);
        
        $eixo->nome = $validated['nome'];

        $eixo->save();

        return redirect()->route('eixos.index');
    }

    public function destroy(string $id)
    {
        $eixo = Eixo::findOrFail($id);
        
        $eixo->delete();

        return redirect()->route('eixos.index');
    }
}
