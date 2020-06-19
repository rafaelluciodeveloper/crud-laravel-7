<?php

namespace App\Http\Controllers;

use App\Model\Client;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clients = Client::select('*')->orderBy('codigo')->get();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function save(Request $request)
    {

        $validatedData = $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'tipo' => 'required',
        ]);

        $client = Client::create([
            "id" => (string)Str::uuid(),
            "nome" => $request->nome,
            "cpf" => $request->cpf,
            "tipo" => $request->tipo
        ]);

        return redirect()->route('clients.index');
    }

    public function edit($id)
    {
        $client = Client::where('codigo', $id)->first();
        return view('clients.edit', compact('client'));
    }

    public function destroy($id)
    {
        $client = Client::where('codigo', $id)->first();
        $client->delete();
        return redirect()->route('clients.index');
    }

    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'tipo' => 'required',
        ]);

        $client = Client::where('codigo', $request->codigo)->first();
        $client->nome = $request->nome;
        $client->cpf = $request->cpf;
        $client->tipo = $request->tipo;
        $client->save();

        return redirect()->route('clients.index');
    }

    public function print()
    {
        $data = ['clients' => Client::select('*')->orderBy('codigo')->get() ];
        $pdf = PDF::loadView('clients.pdf.list', $data);
        return $pdf->stream();
    }
}
