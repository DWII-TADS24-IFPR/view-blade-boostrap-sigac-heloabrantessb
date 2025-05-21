<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::all();

        return view('documentos.index')->with('documentos', $documentos);//View
    }

    public function create()
    {
        return view('documentos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required|string',
            'horas_in' => 'required|double',
            'status' => 'required|string',
            'comentario' => 'string',
            'horas_out' => 'required|double'
        ]);

        Documento::create($validated);

        return redirect()->route("documentos.index")->with('success', 'Documento criado com sucesso!');
    }

    public function show(string $id)
    {
        $documento = Documento::findOrFail($id);

        return view('documentos.show')->with('documento', $documento);
    }

    public function edit(string $id)
    {
        $documento = Documento::findOrFail($id);
        
        return view('documentos.edit')->with('documentos', $documentos);

    }

    public function update(Request $request, string $id)
    {
        $documento = Documento::findOrFail($id);

        $validated = $request->validate([
            'url' => 'required|string',
            'horas_in' => 'required|double',
            'status' => 'required|string',
            'comentario' => 'string',
            'horas_out' => 'required|double'
        ]);

        $documento->url = $validated['url'];
        $documento->horas_in = $validated['horas_in'];
        $documento->status= $validated['status'];
        $documento->comentario= $validated['comentario'];
        $documento->horas_out = $validated['horas_out'];

        $documento->save();

        return redirect()->route('documentos.index');
    }

    public function destroy(string $id)
    {
        $documento = Documento::findOrFail($id);

        $documento->delete();

        return redirect()->route('niveis.index');
    }
}
