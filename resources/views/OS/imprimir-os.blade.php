@extends('adminlte::page')

@section('title', 'JR InforCell')

@section('content_header')

@stop

@section('content')
<!DOCTYPE html>

<html lang="en">
<script>
window.print();
</script>

<body>
        <center><h4>JR INFORCELL</h4>
                <h5>Assitência Técnica em celulares, tablets, notebooks</h5>    
                <h5>Tel.: 13-99622-5864</h5>            
                <h5>Rua João Ramalho 815, loja 04, Centro-SV</h5></center><br>
                <h5>Ordem de Serviço nº {{$os}}</h5>
                <h5>Nome: {{$name}}</h5>
                <h5>Endereço: {{$end}}</h5>
                <h5>Tel.: {{$tel}}</h5>
                <h5>Produto: {{$produto}}</h5>
                <h5>Acessórios: {{$acessorio}}</h5>
                <h5>DEFEITO: {{$problema}}</h5>                          
                <h5>Marca: {{$marca}}</h5>
                <h5>Modelo: {{$modelo}}</h5>
                <h5>  DECLARO ESTAR CIENTE QUE: O prazo legal para retirada do objeto levado por mim à loja é de 90 dias, passado este</h5>
                <h5>período será cobrado uma taxa de R$10,00 diário a título de estadia, para o custeio da manutenção que foi executado.</h5>
                <h5>Obs.: Toda manutenção (troca de peças) terá garantia de 6 meses.</h5>
                <h5>Não damos garantia para instalação de sistemas, (formatação) e reset em celulares.</h5>   
                        <b><p align="center">Cliente ________________________________________________</p></b>
                        <b><p align="center">JR InforCell ____________________________________________</p></b>
                        
                <center><h2>---------------------------------------------------------------------</h2></center>
                <center><h4>JR INFORCELL</h4>
                <h5>Assitência Técnica em celulares, tablets, notebooks</h5>    
                <h5>Tel.: 13-99622-5864</h5>            
                <h5>Rua João Ramalho 815, loja 04, Centro-SV</h5></center><br>
                <h5>Ordem de Serviço nº </h5>
                <h5>Nome: {{$name}}</h5>
                <h5>Produto: {{$produto}}</h5>              
                <h5>  DECLARO ESTAR CIENTE QUE: O prazo legal para retirada do objeto levado por mim à loja é de 90 dias, passado este</h5>
                <h5>período será cobrado uma taxa de R$10,00 diário a título de estadia, para o custeio da manutenção que foi executado.</h5>
                <h5>Obs.: Toda manutenção (troca de peças) terá garantia de 3 meses</h5>
                <h5>Não damos garantia para instalação de sistemas, (formatação) e reset em celulares.</h5>   
                        <b><p align="center">Cliente ________________________________________________</p></b>
                        <b><p align="center">JR InforCell ____________________________________________</p></b>
                             
    </body>
</html>
@stop
