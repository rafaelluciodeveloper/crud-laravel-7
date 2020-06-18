@extends('layouts.app')

@section('content')
    <div class="container">
            <form action="{{route('clients.update')}}" method="POST">
                @csrf
                <div class="form-group ">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" value="{{ $client->nome }}" >
                </div>
                <div class="form-group">
                    <label>Cpf</label>
                    <input type="text" class="form-control" name="cpf" value="{{ $client->cpf }}">
                </div>
                <input type="hidden" name="codigo" value="{{$client->codigo}}">
                <input type="submit" value="Salvar" class="btn btn-success btn-sm" >
            </form>
        </div>
@endsection
