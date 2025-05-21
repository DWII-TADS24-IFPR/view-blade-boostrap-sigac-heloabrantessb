@extends('layouts.app')

@section('title', 'SIGAC - Níveis')

@section('content')

<h1>Niveis</h1>

<button class="btn btn-primary" onclick="window.location.href='{{route('niveis.create')}}'"> Adicionar Nivel</button>

<table class="table table-white">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NOME</th>
      </tr>
    </thead>
    <tbody>
        @foreach($niveis as $nivel)
            <tr>
            <td>{{$nivel->id}}</td>
            <td>{{$nivel->nome}}</td>
            <td><a href="{{ route('niveis.show', $nivel->id) }}" class="btn btn-success">Visualizar</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection