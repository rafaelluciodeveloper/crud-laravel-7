@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
        <a href="{{route('clients.create')}}" class="btn btn-success btn-sm">Novo</a>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <th>
                        Cod.
                    </th>
                    <th>
                        Nome
                    </th>
                    <th>
                        CPF
                    </th>
                    <th>

                    </th>
                </thead>
                <tbody>
                    @foreach($clients as $client )
                    <tr>
                        <td>{{ $client->codigo }}</td>
                        <td>{{ $client->nome }}</td>
                        <td>{{ $client->cpf }}</td>
                        <td>
                        <a href="{{route('clients.edit',['id' => $client->codigo])}}" class="btn btn-primary btn-sm">Editar</a>
                        <a href="{{route('clients.destroy',['id' => $client->codigo])}}" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
