@extends('adminlte::page')

@section('title', 'JR InforCell')

@section('content_header')
<div id="saudacao">
<?php 
  echo "Seja bem vindo(a)!";
?>
</div>
@stop

@section('content')
<!DOCTYPE html>
<html lang="en">
<body>
<div id="line-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" id="center">              
                        <h1><b>Produto</b></h1>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="">Panel</a></li>                  
                            <li><a href="{{route('product.index')}}">Produtos</a></li>                  
                            <li class="active">Alteração</li>
                        </ol>              
                    </div>           
                </div>
                <div class="row">  
                    <br>
                    <h4 id="center"><b>ALTERAÇÃO DOS DADOS DO PRODUTO</b></h4>
                    <br> 
                    <form method="post" 
                          action="{{route('product.update', $product->id)}}" 
                          enctype="multipart/form-data">
                        {!! method_field('put') !!}
                        {{ csrf_field() }}
                        <div class="col-md-6">              
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" name="name" 
                                       class="form-control" 
                                       value="{{$product->name or old('name')}}"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="text" 
                                       accept=".gif,.jpg,.png"
                                       class="form-control"
                                       data-toggle="tooltip" 
                                       data-placement="top"
                                       title="Usar arquivo com dimensões 300x300 
                                       - JPG, GIF, PNG"
                                       value="{{$product->imagem or old('imagem')}}">
                            </div>   
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <input type="text" name="description" 
                                       class="form-control" 
                                       value="{{$product->description or old('description')}}"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">Quantidade</label>
                                <input type="number" name="quantity" 
                                       class="form-control" 
                                       value="{{$product->quantity or old('quantity')}}"
                                       required>
                            </div>    
                        </div>                 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price1">Preço Consumidor</label>
                                <input type="text" name="price1"                               
                                       class="form-control"
                                       value="{{$product->price1 or old('price1')}}"
                                       required>
                            </div>
                        </div>          
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price2">Preço Lojista</label>
                                <input type="text" name="price2"                               
                                       class="form-control"
                                       value="{{$product->price2 or old('price2')}}"
                                       required>
                            </div>
                        </div>   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price3">Preço Promocional</label>
                                <input type="text" name="price3"                               
                                       class="form-control"
                                       value="{{$product->price3 or old('price3')}}"
                                       required>
                            </div>
                        </div>                
                        <div class="col-md-12">                   
                            <button type="reset" class="btn btn-default">
                                Limpar
                            </button>
                            <button type="submit" 
                                    class="btn btn-warning" id="black">
                                Alterar
                            </button>
                        </div>
                    </form>             
                </div>
            </div>
        </div>
    </body>
</html>
@stop