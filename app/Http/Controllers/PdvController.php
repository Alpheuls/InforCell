<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClienteTable;
use App\Produto;
use App\User;
use App\ClienteLocal;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Pdv;
use App\taxa;

class PdvController extends Controller
{
    public function index(Request $request) {      
        $produtoPdv = Pdv::all();
        $total = Pdv::all()->count();
        $cpf = "";
        $product = new taxa;
        $product->taxa = "0.00";
        $product->save(); 
        $cp = $request->input('cpf');     
        if(empty($cp)){             
		$produtos = DB::table('cliente_tables')->where('cpf', $cp)->value('name');
        return view('pdv.pdv', compact ('produtos','produtoPdv','total','cpf'));    
    }  
        $produtos = DB::table('cliente_tables')->where('cpf', $cp)->value('name');
        dd($cp); 
        //return view('pdv.pdv', compact ('produtos','produtoPdv', 'total','cpf'));
}
    public function truncate(){
        $pdv = DB::table('pdvs')->truncate();
        $cliente = DB::table('cliente_locals')->truncate();
        return redirect()->route('show')->with('message', 'Produto excluído com sucesso!');
}
    
    
    public function show(Request $request) {   
        $produtoPdv = Pdv::all();
        $total = Pdv::all()->count();
        $cpf = "";
        $product = new taxa;
        $product->taxa = "0.00";
        $product->save(); 
        $cp = $request->input('cpf');     
        if(empty($cp)){ 
        $cpf = DB::table('cliente_locals')->value('cpf');
		$produtos = DB::table('cliente_tables')->where('cpf', $cpf)->value('name');
        return view('pdv.pdv', compact ('produtos','produtoPdv','total', 'cpf'));    
        }          
        $cpf = DB::table('cliente_locals')->value('cpf');       
        $produtos = DB::table('cliente_tables')->where('cpf', $cpf)->value('name');
        return view('pdv.pdv', compact ('produtos','produtoPdv','total', 'cpf'));    
}
    
    public function searchCliente(Request $request){
        $produtoPdv = Pdv::all();
        $total = Pdv::all()->count();
       
        $cpf = $request->input('cpf'); 
        $cp = $cpf;    
        
        if(empty($cpf)){
            
            
        $cpf = DB::table('cliente_locals')->value('cpf');
                             
        $cod = $request->input('CodItem'); 
        $qtd = $request->input('Qtde');  
        $name = DB::table('produtos')->where('id', $cod)->value('name');
        $desc = DB::table('produtos')->where('id', $cod)->value('description');
        $qtde = $qtd;
        $tipy = $request->input('tipy');         
        $price = DB::table('produtos')->where('id', $cod)->value($tipy);
        $priceTot = $qtd * $price;
        $imagem = DB::table('produtos')->where('id', $cod)->value('imagem');
        $cliente = DB::table('cliente_locals')->value('name');
        
        $product = new Pdv;
        $product->cliente = $cliente;
        $product->name = $name;
        $product->description = $desc;
        $product->quantity = $qtde;
        $product->price = $priceTot;
        $product->priceone = $price;
        $product->imagem = $imagem;
        try{
        $product->save();
        }catch (QueryException $e) {
            echo "Produto não encontrado! ";
            $cpf = DB::table('cliente_locals')->value('cpf');        
        $produtos = DB::table('cliente_tables')->where('cpf', $cpf)->value('name');
        return view('pdv.pdv', compact ('produtos','produtoPdv','total', 'cpf'));  
        }
        $cpf = DB::table('cliente_locals')->value('cpf');        
        $produtos = DB::table('cliente_tables')->where('cpf', $cpf)->value('name');
        return redirect()->route('show')->with('message', 'Produto criado com sucesso!');
    } 
          else{
            
        $cpf = $request->input('cpf');         
        $cod = $request->input('CodItem'); 
        $qtd = $request->input('Qtde');         
        $cliente = $request->input('clienteName');
        $name = DB::table('cliente_tables')->where('cpf', $cpf)->value('name');
        $email = DB::table('cliente_tables')->where('cpf', $cpf)->value('email');
        $celular = DB::table('cliente_tables')->where('cpf', $cpf)->value('celular');
        $cep = DB::table('cliente_tables')->where('cpf', $cpf)->value('cep');
        $rua = DB::table('cliente_tables')->where('cpf', $cpf)->value('rua');
        $bairro = DB::table('cliente_tables')->where('cpf', $cpf)->value('bairro');
        $cidade = DB::table('cliente_tables')->where('cpf', $cpf)->value('cidade');
        $product = new ClienteLocal;
        $product->name = $name;
        $product->cpf = $cpf;
        $product->email = $email;
        $product->celular = $celular;
        $product->cep = $cep;
        $product->rua = $rua;
        $product->bairro = $bairro;
        $product->cidade = $cidade;
        try{
            $product->save();
            }catch (QueryException $e) {
                echo "CPF não encontrado! " ;
                $cpf = $request->input('cpf'); 
        $produtos = $request->input('ClienteName');           
        $cpf = DB::table('cliente_locals')->value('cpf');         
        $produtos = DB::table('cliente_tables')->where('cpf', $cpf)->value('name');
        return view('pdv.pdv', compact ('produtos','produtoPdv','total', 'cpf'));  
        
            }
        $cpf = $request->input('cpf'); 
        $produtos = $request->input('ClienteName');           
        $cpf = DB::table('cliente_locals')->value('cpf');         
        $produtos = DB::table('cliente_tables')->where('cpf', $cpf)->value('name');
        return view('pdv.pdv', compact ('produtos','produtoPdv','total', 'cpf'));  
        
   
    }
 
        $cpf = DB::table('cliente_locals')->value('cpf');        
        $produtos = DB::table('cliente_tables')->where('cpf', $cpf)->value('name');
        return view('pdv.pdv', compact ('produtos','produtoPdv','total', 'cpf'));
    } 

    public function update(Request $request, $id) {
        $product = Pdv::findOrFail($id); 
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->save();
        return redirect()->route('show')->with('message', 'Produto alterado com sucesso!');
    }   
    public function imprimir() {
        
        
        return view('pdv.imprimir');
    }

    public function edit($id) {
        $product = Pdv::findOrFail($id);
        
        return view('pdv.edit-pdv', compact('product'));
    }


    public function save(Request $request){
        $cod = $request->input('CodItem'); 
        $qtd = $request->input('Qtde'); 
        $product = Produto::findOrFail($cod);
        $pdv = new Pdv;
        $pdv->name = $request->name;
        $pdv->description = $request->description;
        $pdv->quantity = $request->quantity;
        $pdv->price = $request->price;
        $pdv->imagem = $request->imagem;
        $pdv->save(); 
        $produtoPdv = Pdv::all();
        $total = Pdv::all()->count();
        //dd($produtoPdv);
        return view('pdv.pdv', compact ('produtos','produtoPdv','total'));
    }

    public function destroy($id) {
        $product = Pdv::findOrFail($id);
        $product->delete();
        return redirect()->route('show')->with('message', 'Produto excluído com sucesso!');
    }

    public function remove($id) {
        $product = Produto::findOrFail($id);
        $product->delete();
        return redirect()->route('vendas')->with('message', 'Produto excluído com sucesso!');
    }

}
