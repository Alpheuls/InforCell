<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutosController extends Controller
{
    
    public function index() {
        $produtos = Produto::all();
        $total = Produto::all()->count();
        return view('produto.includeproduto', compact('produtos', 'total'));
    }   

    public function create() {
        return view('produto.include-produto');
    }

    public function store(Request $request) {
        $product = new Produto;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price1 = $request->price1;
        $product->price2 = $request->price2;
        $product->price3 = $request->price3;
        $product->imagem = $request->imagem;
        $product->save();
        return redirect()->route('produto')->with('message', 'Produto criado com sucesso!');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $product = Produto::findOrFail($id);
        return view('produto.alter-produto', compact('product'));
    }

    public function update(Request $request, $id) {
        $product = Produto::findOrFail($id); 
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price1 = $request->price1;
        $product->price2 = $request->price2;
        $product->price3 = $request->price3;
        $product->save();
        return redirect()->route('produto')->with('message', 'Produto alterado com sucesso!');
    } 

    public function destroy($id) {
        $product = Produto::findOrFail($id);
        $product->delete();
        return redirect()->route('produto')->with('message', 'Produto excluído com sucesso!');
    }
}
