<!doctype html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <title>Listagem Cliente</title>
    <style>

        .conteudo {
            text-align: center;
        }

        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<div class="conteudo">
    <h2>Listagem Clientes</h2>
    <table>
        <tr>
            <th>
                Código
            </th>
            <th>
                Nome
            </th>
            <th>
                Cpf
            </th>
        </tr>
        @foreach($clients as $client)
            <tr>
                <td width="10">{{$client->codigo}}</td>
                <td width="350">{{$client->nome}}</td>
                <td width="100">{{$client->cpf}}</td>
            </tr>
        @endforeach
    </table>
    <p>{{ $clients->count() }} Cliente(s) Cadastrados.</p>
</div>
</body>
</html>
