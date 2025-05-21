@extends('layouts.app')

@section('title', 'SIGAC - Adicionar Aluno')

@section('content')
    <h1>Adicionar Aluno</h1>

    <form action="{{ route('alunos.store') }}" method="POST">
        @csrf
        <label for="nome" class="form-label">Insira o nome do aluno</label>
        <input class="form-control p-4" id="nome" type="text" placeholder="Nome" aria-label="default input example"
            name="nome">

        <label for="cpf" class="form-label">Insira o CPF</label>
        <input class="form-control p-4" id="cpf" type="text" placeholder="CPF" aria-label="default input example"
            name="cpf">

        <label for="email" class="form-label">Insira um E-mail</label>
        <input class="form-control p-4" id="email" type="email" placeholder="Email" aria-label="default input example"
            name="email">

        <label for="senha" class="form-label">Insira uma senha</label>
        <input class="form-control p-4" id="senha" type="password" placeholder="Senha"
            aria-label="default input example" name="senha">

        <label for="telefone" class="form-label">Insira o telefone</label>
        <input class="form-control p-4" id="telefone" type="text" placeholder="Telefone"
            aria-label="default input example" name="telefone">

        <label for="curso_id" class="form-label">Selecione um curso</label>
        <select name="curso_id" class="form-control p-4" required>
            @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
            @endforeach
        </select>

        <label for="turma_id" class="form-label">Selecione uma turma</label>
        <select name="turma_id" class="form-control p-4" required>
            @foreach ($turmas as $turma)
                <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
            @endforeach
        </select>


        <input class="btn btn-primary" type="submit" value="Criar">
    </form>
@endsection
