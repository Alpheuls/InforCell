<?php

namespace App\Http\Controllers\produto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdutosController extends Controller
{
    public function index()
    {
        return view('produto.includeproduto');
    }
}
