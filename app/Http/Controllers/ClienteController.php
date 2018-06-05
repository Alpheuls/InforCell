<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClienteTable;

class ClienteController extends Controller
{
    public function index() {
        $produtos = ClienteTable::all();
        $total = ClienteTable::all()->count();        
        return view('cliente.show-cliente', compact('produtos', 'total'));
    }  

    public function create() {
        return view('cliente.include-cliente');
    }

    public function store(Request $request) {
        $product = new ClienteTable;
        $product->name = $request->name;
        $product->cpf = $request->cpf;
        $product->email = $request->email;
        $product->celular = $request->celular;
        $product->cep = $request->cep;
        $product->rua = $request->rua;
        $product->bairro = $request->bairro;
        $product->cidade = $request->cidade;
        $product->save();
        return redirect()->route('exibir')->with('message', 'Cliente cadastrado com sucesso!');
    } 

    public function show($id) {
        $produto = ClienteTable::findOrFail($id);
        
        return view('pdv.pdv', compact('produto'));   
    }

    public function edit($id) {
        $product = ClienteTable::findOrFail($id);
        return view('cliente.alter-cliente', compact('product'));
    }

    public function update(Request $request, $id) {
        $product = ClienteTable::findOrFail($id); 
        $product->name = $request->name;
        $product->cpf = $request->cpf;
        $product->email = $request->email;
        $product->celular = $request->celular;
        $product->cep = $request->cep;
        $product->rua = $request->rua;
        $product->bairro = $request->bairro;
        $product->cidade = $request->cidade;
        $product->save();
        return redirect()->route('exibir')->with('message', 'Cliente alterado com sucesso!');
    } 

    public function destroy($id) {
        $product = ClienteTable::findOrFail($id);
        $product->delete();
        return redirect()->route('exibir')->with('message', 'Produto excluído com sucesso!');
    }

}
