<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\OS;

class OsController extends Controller
{
    public function index() { 
       
        return view('OS.os');
    }
    public function save(Request $request) {
        $product = new OS;
        $product->name = $request->name;
        $product->end = $request->end;
        $product->tel = $request->tel;
        $product->produto = $request->produto;
        $product->acessorio = $request->acessorio;
        $product->problema = $request->problema;
        $product->marca = $request->marca;
        $product->modelo = $request->modelo;
        $product->status = $request->status;
        $product->save();
        $name = $request->name;
        $end = $request->end;
        $tel = $request->tel;
        $produto = $request->produto;
        $acessorio = $request->acessorio;
        $problema = $request->problema;
        $marca = $request->marca;
        $modelo = $request->modelo;
        $status = $request->status;
        $id = DB::table('o_s')->select('id')->orderBy('id', 'desc')->first()->id;
        $os = $id + 1;
        return view('OS.imprimir-os', compact('os','name', 'end', 'tel', 'produto', 'acessorio', 'problema', 'marca', 'modelo', 'status'));
    
       
    } 
    public function imprimir(Request $request) {
        $name = $request->name;
        $end = $request->end;
        $tel = $request->tel;
        $produto = $request->produto;
        $acessorio = $request->acessorio;
        $problema = $request->problema;
        $marca = $request->marca;
        $modelo = $request->modelo;
        $status = $request->status;
        return view('OS.imprimir-os', compact('name', 'end', 'tel', 'produto', 'acessorio', 'problema', 'marca', 'modelo', 'status'));
    }  

    public function show() {
        $produtos = os::all();
        $total = os::all()->count();        
        return view('OS.os-show', compact('produtos', 'total'));
    }  
}
