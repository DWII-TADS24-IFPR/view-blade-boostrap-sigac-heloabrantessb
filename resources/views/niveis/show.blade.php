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
    </div>
@endsection
