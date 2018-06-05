@extends('adminlte::page')

@section('title', 'JR InforCell')

@section('content_header')

@stop

@section('content')
<!DOCTYPE html>
<?php

//require_once __DIR__ . '/vendor/autoload.php';
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
try {
        // Enter the share name for your USB printer here
        //$connector = null;
        $connector = new WindowsPrintConnector("Receipt Printer");
        /* Print a "Hello world" receipt" */
        $printer = new Printer($connector);
        $printer -> text("JR INFORCELL DISTRIBUIDORA\n");
        $printer -> text("00.000.000/0001-91\n");
        $printer -> text("------------------------------------------------\n");
        $printer -> text("COMPROVANTE DE REGISTRO DE\n");
        $printer -> text("NOTA FISCAL DE VENDA AO CONSUMIDOR\n");
        $printer -> text("------------------------------------------------\n");
        $printer -> text("Cliente:     369 - ROOHXCELL \n");
        $printer -> text("Endereço:    Praça Do Correio Camelodromo SV, 12, Box 12, Centro\n");
        $printer -> text("CEP:  - São Vicente\n");
        $printer -> text("Telefone:\n");
        $printer -> text("Atendente: Master\n");
        $printer -> text("------------------------------------------------\n");
        $printer -> text("Venda: 8883 de 11/05/2018 12:29:54\n");
        $printer -> text("------------------------------------------------\n");
        $printer -> text("Produtos\n");
        $printer -> text("------------------------------------------------\n");
        $printer -> text("9990000003556 Conector de Carga 5/10 1 UN x R$10,00\n");
        $printer -> text("------------------------------------------------\n");
        $printer -> text("Total: (desc. R$0,00)    R$10,00\n");
        $printer -> text("Quantidade Itens: 1\n");
        $printer -> text("------------------------------------------------\n");
        $printer -> text("Observação: NSU: 8883 11/05/2018 12:29:54\n");
        $printer -> text("Não trocamos peças danificadas, Flex rasgado, películas removidas ou selos de garantia danificados. Favor testar as peças antes de montar os aparelhos.\n");
        $printer -> text("------------------------------------------------\n");
        
        $printer -> cut();
        
        /* Close printer */
        $printer -> close();
    } catch (Exception $e) {
        echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
    }
    
?> 
<html>
    <head>
<script type='text/javascript'>
function Fechar() {

fechar = window.open(window.location, "_self");
fechar.close();
} 
setTimeout("javascript:Fechar();",1000); //definir o tempo 5000 significa 5 segundos

</script>
</head>
</html>
@stop
