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
                        <h1><b>Registro</b></h1>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="">Panel</a></li>                  
                            <li><a href="{{route('show')}}">Pdv</a></li>                  
                            <li class="active">Registro</li>
                        </ol>              
                    </div>          
                </div>
                <div class="row" align="center">  
                    <br>
                    <h4 id="center"><b>Registrar Compra</b></h4>
                    <br> 
                    
                   
                    
                        {{ csrf_field() }}
                        <div class="col-md-6">              
                            <div class="form-group">
                                <label for="name">SubTotal</label>
                                <input type="text" name="subtotal" size ="45" 
                                       class="form-control input-sm pull-center" 
                                       value="{{$total}}"
                                       required>  
                            </div>
                        </div>
                        
                        <form class="form-group" method="put" 
                        action="{{route('registro.taxa')}}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="foto"> Taxa de Entrega </label>
                                <input type="text" name="taxa"                                       
                                       class="form-control input-sm pull-center"
                                       placeholder="Digite a taxa..." 
                                       value="{{$taxa}}"
                                       required>
                                <button type="submit">                                
                            </button>                                
                           </div>   
                        </div>
                        </form>	
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Total</label>
                                <input type="text" name="total" 
                                       class="form-control"
                                       value="{{$stotal }}" 
                                       required>                                       
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="quantity">Falta</label>
                                <input type="text" name="falta" 
                                       class="form-control" 
                                       value="{{$falta}}"
                                       required>
                            </div>    
                        </div>       
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="quantity">Troco</label>
                                <input type="text" name="troco" 
                                       class="form-control" 
                                       value="{{$troco}}"
                                       required>
                            </div>    
                        </div>
                        <div class="row">
                        <form class="form-group" method="get"                                                                  
                        action="{{ route ('calcular')}}">
                        {!! csrf_field() !!}
                        <div class="col-md-3">
						<div id="pesquisaProduto" class="pull-left">
                                <input type="text" name="dinheiro" size ="45"
                                       class="form-control input-sm pull-left" 
                                       placeholder="Dinheiro" 
                                       value="{{$dinheiro}}"
                                       required>                                      											
						</div>	
                        </div>
                        <div class="col-md-3">					
						<div id="pesquisaProduto" class="pull-right">
                                                             
                                <input type="text" name="credito" size ="45"
                                       class="form-control input-sm pull-left" 
                                       placeholder="Crédito" 
                                       value="{{$credito}}"
                                       required>
                                       						
						</div>
						</div>
						
						<div class="col-md-3">
						<div id="pesquisaProduto" class="pull-left">
                                                              
                                <input type="text" name="debito" size ="45"
                                       class="form-control input-sm pull-left" 
                                       placeholder="Débito" 
                                       value="{{$debito}}"
                                       required>
                                       
                                       </div>	
                        </div>
                        <div class="col-md-3">					
						<div id="pesquisaProduto" class="pull-right">                                                             
                                <input type="text" name="boleto" size ="45"
                                       class="form-control input-sm pull-left" 
                                       placeholder="Boleto" 
                                       value="{{$boleto}}"
                                       required>			
						</div>
						</div>	
                        <button type="submit"></button>
                        </form>             
                </div>					 
                        <div class="col-md-12">  
						<label for="price"></label>                 
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