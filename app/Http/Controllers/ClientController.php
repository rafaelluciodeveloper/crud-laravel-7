<?php

namespace App\Http\Controllers;

use App\Model\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ClientController extends Controller
{
    public function index(){
        $clients = Client::select('*')->orderBy('codigo')->get();
        return view('clients.index',compact('clients'));
    }

    public function create(){
        return view('clients.create');
    }

    public function save(Request $request){

        $client = Client::create([
            "id" => (string) Str::uuid(),
            "nome" =>$request->nome,
            "cpf" => $request->cpf
        ]);

      // $clients2 =  new Client();
        //$clients2->id = (string) Str::uuid();
        //$clients2->nome = $request->nome;
        //$clients2->cpf = $request->cpf;
        //$clients2->save();

        return redirect()->route('clients.index');
    }

    public function edit($id){
        $client = Client::where('codigo',$id)->first();
        return view('clients.edit',compact('client'));
    }

    public function destroy($id){
        $client = Client::where('codigo',$id)->first();
        $client->delete();
        return redirect()->route('clients.index');
    }
    public function update(Request $request){
        $client = Client::where('codigo',$request->codigo)->first();
        $client->nome = $request->nome;
        $client->cpf = $request->cpf;
        $client->save();
        return redirect()->route('clients.index');
    }
}