@extends('layouts.app')

@section('content')
    <div class="container">
            <form action="{{route('clients.save')}}" method="POST">
                @csrf
                <div class="form-group ">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" >
                </div>
                <div class="form-group">
                    <label>Cpf</label>
                    <input type="text" class="form-control" name="cpf" >
                </div>
                <input type="submit" value="Salvar" class="btn btn-success btn-sm" >
            </form>
        </div>
@endsection
