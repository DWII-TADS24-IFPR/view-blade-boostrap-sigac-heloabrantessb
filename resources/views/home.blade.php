@extends('layouts.app')

@section('title', 'SIGAC - Home')

@section('content')
    <div class="d-flex justify-content-center align-items-center h-100 flex-column w-1/2">
        <h1 class="align-self-center">SIGAC</h1>
        
        <button type="button" class="btn btn-link"><a href={{ route("niveis.index") }}>Niveis</a></button>
    </div>
@endsection
