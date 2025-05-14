@extends('layouts.app')

@section('title', 'SIGAC - Mostrar Nivel')

@section('content')
    <div>
        <form action="{{ route('niveis.update', $nivel->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nome">Editar Nome:</label>
            <input type="text" name="nome" id="nome" value="{{ $nivel->nome }}">

            <input type="submit" value="Atualizar">
        </form>
    </div>
@endsection