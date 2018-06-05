<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\registro_edit;
use App\registro_pdv;

class EditRegistro extends Controller
{
    public function edit($id) {
        $product = registro_edit::findOrFail($id);
        //dd($product);
        return view('registro.edit-item-register', compact('product'));
    }
    public function destroy($id) {
        $list = DB::table('registro_pdvs')->where('id',$id)->value('created_at');        
        $cliente = DB::table('registros')->where('created_at', $list)->value('cliente'); 
        $cpf = DB::table('cliente_tables')->where('name',$cliente)->value('cpf'); 
        $product = DB::table('registro_pdvs')->where('created_at', $list)->where('id',$id)->get();
        //dd($product);
        DB::table('registro_pdvs')->where('created_at', $list)->where('id',$id)->delete();
        DB::table('registro_edits')->where('created_at', $list)->where('id',$id)->delete();
        
               
        $total = registro_edit::all()->count();
        //dd($produtos,$list);
        return redirect()->route('alter');  
    }
    public function update(Request $request, $id) {
        $list = DB::table('registro_pdvs')->where('id',$id)->value('created_at');        
        $cliente = DB::table('registros')->where('created_at', $list)->value('cliente'); 
        $cpf = DB::table('cliente_tables')->where('name',$cliente)->value('cpf'); 
        $produto = DB::table('registro_pdvs')->where('created_at', $list)->where('id',$id);
        $product = registro_pdv::where('created_at', $list)->where('id',$id)->get();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        //$product->save();
        //dd($product, $produto);
        DB::table('registro_pdvs')->where('id', $id)->where('created_at', $list)
        ->update(['name' => $request->name, 'description' => $request->description, 'quantity' => $request->quantity,
        'price' => $request->price]);
        return redirect()->route('alter')->with('message', 'Produto alterado com sucesso!');
    }  
}
