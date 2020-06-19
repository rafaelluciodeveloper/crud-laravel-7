@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{route('clients.save')}}" method="POST">
                        @csrf
                        <div class="card-header">
                            Cadastro Cliente
                            <a href="{{route('clients.index')}}" class="btn btn-primary btn-sm float-right">Voltar</a>
                        </div>
                        <div class="card-body">
                            <div class="form-group ">
                                <label>Nome</label>
                                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome"
                                       value="{{old('nome')}}">
                                @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>CPF/CNPJ</label>
                                <input type="text"
                                       class="form-control cpfOuCnpj col-md-3 @error('cpf') is-invalid @enderror"
                                       name="cpf" value="{{old('cpf')}}">
                                @error('cpf')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label>Tipo</label>
                                <select name="tipo" class="form-control col-md-4 @error('tipo') is-invalid @enderror">
                                    <option value="">Selecione</option>
                                    <option value="PF" @if (old('tipo') == "PF") {{ 'selected' }} @endif>Pessoa Física
                                    </option>
                                    <option value="PJ" @if (old('tipo') == "PJ") {{ 'selected' }} @endif>Pessoa
                                        Jurídica
                                    </option>
                                </select>
                                @error('tipo')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" value="Salvar" class="btn btn-success btn-sm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function ($) {
            var options = {
                onKeyPress: function (cpf, ev, el, op) {
                    var masks = ['000.000.000-000', '00.000.000/0000-00'];
                    $('.cpfOuCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
                }
            }

            $('.cpfOuCnpj').length > 11 ? $('.cpfOuCnpj').mask('00.000.000/0000-00', options) : $('.cpfOuCnpj').mask('000.000.000-00#', options);
        });
    </script>
@endsection
