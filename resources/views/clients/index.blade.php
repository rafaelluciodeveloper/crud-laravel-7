@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listagem Clientes
                        <span class="float-right">
                                    <a href="{{route('clients.create')}}" class="btn btn-success btn-sm">Novo</a>
                                    <a href="{{route('clients.print')}}" class="btn btn-warning btn-sm">Imprimir</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>
                                    Código
                                </th>
                                <th>
                                    Nome
                                </th>
                                <th>
                                    CPF/CNPJ
                                </th>
                                <th>
                                    Tipo
                                </th>
                                <th>

                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client )
                                <tr>
                                    <td>{{ $client->codigo }}</td>
                                    <td>{{ $client->nome }}</td>
                                    <td>{{ $client->cpf }}</td>
                                    <td width="5px" class="text-center">
                                        <span class="badge badge-light">
                                            {{ $client->tipo }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('clients.edit',['id' => $client->codigo])}}"
                                           class="btn btn-primary btn-sm">Editar</a>
                                        <a href="{{route('clients.destroy',['id' => $client->codigo])}}"
                                           class="btn btn-danger btn-sm delete" >Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        {{$clients->count()}} Cliente(s) Cadastrados.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
   $('.delete').on('click',function(e){
        if(confirm('Deseja realmente excluir ?')){
            alert('Registro excluido!')
        }else{
            e.preventDefault();
        }
   });
</script>
@endsection
