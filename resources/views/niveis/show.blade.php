<!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
@extends('layouts.app')

@section('title', 'SIGAC - Pesquisar Nivel')

@section('content')
    <div>
        <h1>SIGAC - Visualizar Nivel</h1>

        <div>
            <p>ID: {{ $nivel->id }}</p>
            <p>Nome: {{ $nivel->nome }}</p>
        </div>

        <a href="{{ route('niveis.edit', $nivel->id) }}" class="btn btn-success">Editar</a>

        <form action="{{ route('niveis.destroy', $nivel->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
    </div>
@endsection
