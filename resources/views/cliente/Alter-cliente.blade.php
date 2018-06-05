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
                        <h1><b>Clientes</b></h1>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="">Panel</a></li>                  
                            <li><a href="{{route('exibir')}}">Cliente</a></li>                  
                            <li class="active">Alteração</li>
                        </ol>              
                    </div>          
                </div>
                <div class="row">  
                    <br>
                    <h4 id="center"><b>ALTERAÇÃO DOS DADOS DO CLIENTE</b></h4>
                    <br> 
                    <form method="post" 
                          action="{{route('cliente.update', $product->id)}}" 
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
                            <label for="Email">Email</label>
                                <input type="text" name="email"                                        
                                       class="form-control"                                       
                                       value="{{$product->email or old('email')}}">
                            </div>   
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="celular">Celular</label>
                                <input type="text" name="celular" 
                                       class="form-control" 
                                       value="{{$product->celular or old('celular')}}"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="CPF">CPF</label>
                                <input type="text" name="cpf" 
                                       class="form-control" 
                                       value="{{$product->cpf or old('cpf')}}"
                                       required>
                            </div>    
                        </div>                 
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="cep">CEP</label>
                                <input type="text" name="cep"                               
                                       class="form-control"
                                       value="{{$product->cep or old('cep')}}"
                                       required>
                            </div>
                        </div>      
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="rua"> Rua/Nº </label>
                                <input type="text" name="rua"                                 
                                       class="form-control"
                                       value="{{$product->rua or old('rua')}}"
                                       required>
                            </div>
                        </div>   
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="bairro"> Bairro </label>
                                <input type="text" name="bairro"                              
                                       class="form-control"
                                       value="{{$product->bairro or old('bairro')}}"
                                       required>
                            </div> 
                        </div>           
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="cidade"> Cidade/UF </label>
                                <input type="text" name="cidade"                              
                                       class="form-control"
                                       value="{{$product->cidade or old('cidade')}}"
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