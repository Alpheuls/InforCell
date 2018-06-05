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
                            <li><a href="{{route('cliente.store')}}">Clientes</a></li>                  
                            <li class="active">Cadastro</li>
                        </ol>              
                    </div>          
                </div>
                <div class="row">  
                    <br>
                    <h4 id="center"><b>CADASTRO DE CLIENTES</b></h4>
                    <br> 
                    <form method="post" 
                          action="{{route('cliente.store')}}" 
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-6">              
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" name="name" 
                                       class="form-control" 
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="text" name="email"                               
                                       class="form-control">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="celular">Celular</label>
                                <input type="text" name="celular"                               
                                       class="form-control">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="CPF">CPF</label>
                                <input type="text" name="cpf" 
                                       class="form-control" 
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Cep">CEP</label>
                                <input type="text" name="cep" 
                                       class="form-control" 
                                       required>
                            </div>    
                        </div>                                                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rua"> Rua/Nº </label>
                                <input type="text" name="rua"                               
                                       class="form-control">
                            </div>
                        </div>          
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bairro"> Bairro </label>
                                <input type="text" name="bairro"                               
                                       class="form-control">
                            </div>  
                        </div>   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cidade"> Cidade/UF </label>
                                <input type="text" name="cidade"                               
                                       class="form-control">
                            </div>  
                        </div>       
                        <div class="col-md-12">                   
                            <button type="reset" class="btn btn-default">
                                Limpar
                            </button>
                            <button type="submit" 
                                    class="btn btn-warning" id="black">
                                Cadastrar
                            </button>
                        </div>
                    </form>             
                </div>
            </div>
        </div>
    </body>
</html>
@stop