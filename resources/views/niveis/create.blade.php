@extends('layouts.app')

@section('title', 'SIGAC - Criar Nivel')

@section('content')

<h1>SIGAC - Criar Nivel</h1>

<form action="{{ route('niveis.store') }}" method="POST">
    @csrf
    <label for="nome" class="form-label">Insira um nivel</label>
    <input class="form-control p-4" id="nome" type="text" placeholder="Insira um nivel" aria-label="default input example" name="nome">

    <input class="btn btn-primary" type="submit" value="Criar">
</form>

@endsection