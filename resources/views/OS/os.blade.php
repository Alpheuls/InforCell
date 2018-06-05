@extends('adminlte::page')

@section('title', 'JR InforCell')

@section('content_header')

@stop

@section('content')
<!DOCTYPE html>
<html lang="en">
<body>
<div id="line-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" id="center">              
                        <h1><center><b>Ordem de Serviço</b></center></h1>
                        <br>
                    </div>
                </div>                
                <div class="row">  
                    <br>
                    <h4 id="center"><b>Ordem de Serviço Nº</b></h4>
                    <br> 
                    <form method="post" 
                          action="{{route('OS.save')}}" 
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
                                <label for="Email">Endereço</label>
                                <input type="text" name="end"                               
                                       class="form-control">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="celular">Telefone</label>
                                <input type="text" name="tel"                               
                                       class="form-control">
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="CPF">Produto</label>
                                <input type="text" name="produto" 
                                       class="form-control" 
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Sexo">Acessórios</label>
                                <input type="text" name="acessorio" 
                                       class="form-control" 
                                       required>
                            </div>    
                        </div>                                                   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dataNascimento">Problema</label>
                                <input type="text" name="problema"                               
                                       class="form-control">
                            </div>
                        </div>          
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Marca</label>
                                <input type="text" name="marca"                               
                                       class="form-control">
                            </div>
                        </div>   
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Modelo</label>
                                <input type="text" name="modelo"                               
                                       class="form-control">
                            </div>
                        </div> 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" name="status"                               
                                       class="form-control">
                            </div>
                        </div> 
                        <div class="col-md-12">                   
                            <center><button type="reset" class="btn btn-default">
                                Limpar
                            </button>                            
                            <button type="submit" 
                            class="btn btn-warning" id="print">
                                Imprimir
                            </button>                                                    
                            <button type="submit"                              
                                    class="btn btn-warning" id="black">
                                Salvar
                            </button></center>
                        </div>
                    </form>             
                </div>
            </div>
        </div>
    </body>
</html>
@stop