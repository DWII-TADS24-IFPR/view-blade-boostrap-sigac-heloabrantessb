<!-- Be present above all else. - Naval Ravikant -->
@extends('layouts.app')

@section('title', 'SIGAC - Aluno')

@section('content')
    <h1>Alunos</h1>

    <a class="btn btn-primary" href="{{ route('alunos.create') }}" >Cadastrar Aluno</a>

    <table class="table table-white">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NOME</th>
        <th scope="col">CPF</th>
        <th scope="col">CURSO</th>
        <th scope="col">EMAIL</th>
        <th scope="col">TELEFONE</th>
      </tr>
    </thead>
    <tbody>
        @foreach($alunos as $aluno)
            <tr>
            <td>{{$aluno->id}}</td>
            <td>{{$aluno->nome}}</td>
            <td>{{$aluno->cpf}}</td>
            <td>{{$aluno->email}}</td>
            <td>{{$aluno->telefone}}</td>
            <td><a href="{{ route('niveis.show', $aluno->id) }}" class="btn btn-success">Visualizar</a></td>:
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
