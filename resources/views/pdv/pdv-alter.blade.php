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
                    <div class="col-md-8" id="center"> 
                        <h1><b>PDV</b></h1>
                        <br>
                    </div>
                </div>
                <div class="box-header">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Panel</a></li>                  
                            <li class="active">Pdv</li>
                        </ol>
                        <br>
                        
                            <div id="pesqClie" class="form form-inline">
                            <form class="form-group" method="post" 
                                  action="{{ route ('search.cliente')}}" > 
                                  {!!csrf_field()!!}                                  
                                  <input type="text" name="cpf" 
                                       class="form-control input-sm pull-left" 
                                       placeholder="CPF do cliente..."
                                       value="{{$cpf}}"
                                       required>
                                <button class="btn btn-default btn-sm pull-right" 
                                        id="color"> 
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                                </form> 
                                <input type="text" name="clienteName" size ="70" 
                                       class="form-control input-sm pull-center" 
                                       value="{{$produtos}}"
                                       required>  

                        <div id="pesquisaProduto" class="pull-right">
                            <form class="form-group" method="post" 
                                  action="{{ route ('search.cliente')}}">
                                  {!! csrf_field() !!}                                   
                                <input type="text" name="CodItem" 
                                       class="form-control input-sm pull-left" 
                                       placeholder="Código do item..." required> 
                                <button class="btn btn-default btn-sm pull-right" 
                                        id="color">                                         
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                                <input type="text" name="Qtde" size ="5" 
                                       class="form-control input-sm pull-center" 
                                       placeholder="Qtde..." required>                                        
                                <a href="{{route('product.create')}}" 
                           class="btn btn-default btn-sm pull-right">
                            <span class="glyphicon glyphicon-plus"></span> Adicionar</a>
                            </form>
                        </div>                      
                    </div>  
                           
                </div>
                <div class="row">
                    <div class="col-md-12">   
                        <br /><a href="{{route('show')}}" style='background-color:#ff1919' size='35'
                           class="btn btn-default btn-sm pull-right">
                            <span class="glyphicon glyphicon-plus"></span> Limpar</a>
                        
                        <a href="{{route('registro')}}" style='background-color: #2dad2d' size='35'
                           class="btn btn-default btn-sm pull-right">
                            <span class="glyphicon glyphicon-plus"></span> Registrar</a>
                        <h4 id="center"><b>Registro de Itens </b></h4>
                         
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th id="center">Código</th>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                        <th id="center">Quantidade</th>
                                        <th>Preço</th>                
                                        <th id="center">Imagem</th>                
                                        <th id="center">Ações</th>              
                                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($produtoPdv as $produto)
                                    <tr>
                                        <td id="center">{{$produto->id}}</td>
                                        <td title="Nome">{{$produto->name}}</td>
                                        <td title="Descrição">{{$produto->description}}</td>
                                        <td title="Quantidade" id="center">{{$produto->quantity}}</td>
                                        <td title="Preço">R$ {{number_format($produto->price, 2,',','.')}}</td> 
                                        <td id="center">
                                            <a href="{{URL::asset('produtos/'. '1' . $produto->imagem)}}" 
                                               data-lightbox="{{URL::asset('produtos/'. '1' . $produto->imagem)}}">
                                                <img src="{{URL::asset('produtos/'. $produto->imagem)}}" />
                                            </a></td>
                                        <td id="center">
                                            <a href="{{route('pdv.edit', $produto->id)}}" 
                                               data-toggle="tooltip" 
                                               data-placement="top"
                                               title="Alterar"><i class="fa fa-pencil"></i></a>
                                            &nbsp;<form style="display: inline-block;" method="POST" 
                                                        action="{{route('pdv.destroy', $produto->id)}}"                                                        
                                                        data-toggle="tooltip" data-placement="top"
                                                        title="Excluir" 
                                                        onsubmit="return confirm('Confirma exclusão?')">
                                                {{method_field('DELETE')}}{{ csrf_field() }}                                                
                                                <button type="submit" style="background-color: #fff">
                                                    <a><i class="fa fa-trash-o"></i></a>                                                    
                                                </button></form></td>               
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{URL::asset('img/subir.png')}}" 
                 id="up" 
                 style="display: none;" 
                 alt="Ícone Subir ao Topo" 
                 title="Subir ao topo?">
            </body>
            </html>
@stop