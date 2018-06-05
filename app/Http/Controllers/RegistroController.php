<?php

namespace App\Http\Controllers;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pdv;
use App\taxa;
use App\Registro_pdv;
use App\Registro;
use App\pagamento;
use App\registro_edit;

class RegistroController extends Controller
{
    public function index(Request $request) {
        $reg = Pdv::all();
        
        $subtotal = DB::table('pdvs')->select('price');
        $total = $subtotal->sum('price');                
        $taxa = DB::table('taxas')->select('taxa')->orderBy('id', 'desc')->first()->taxa;
        $stotal = $total + $taxa;        
        $dinheiro = $request->input('dinheiro');
        $credito = $request->input('credito');
        $debito = $request->input('debito');
        $boleto = $request->input('boleto');
        $totalp = $request->input('troco');
        $soma = ($dinheiro + $credito + $debito + $boleto);
        if(empty($soma)){
            $troco = "0.00";
            $falta = $stotal;
        }else{
        $troco = ($stotal - $soma) *(-1);
        $falta = ($stotal - $soma);
        }
        

        return view('pdv.pdv-registro', 
        compact('total', 'stotal', 'taxa', 'dinheiro','credito','debito','boleto','troco', 'falta'));
    }  
    public function calcular(Request $request) {
        $subtotal = DB::table('pdvs')->select('price');
        $total = $subtotal->sum('price');                
        $taxa = DB::table('taxas')->select('taxa')->orderBy('id', 'desc')->first()->taxa;
        $stotal = $total + $taxa;  
        $dinheiro = $request->input('dinheiro');
        $credito = $request->input('credito');
        $debito = $request->input('debito');
        $boleto = $request->input('boleto');
        $totalp = $request->input('troco');
        $soma = ($dinheiro + $credito + $debito + $boleto);
        if(empty($soma)){
            $troco = "0.00";
            
        }else{
        $troco = ($stotal - $soma) *(-1);
        $falta = ($stotal - $soma);
        }
        $product = new pagamento;
        $product->dinheiro = $dinheiro;
        $product->credito = $credito;
        $product->debito = $debito;
        $product->boleto = $boleto;
        $product->troco = $troco;
        //dd($dinheiro,$credito,$debito,$boleto);
        $product->save();
        return redirect()->route('registro', compact('total', 'stotal', 'taxa',
         'dinheiro','credito','debito','boleto','troco', 'falta'));
    }
    public function taxa(Request $request) {
        
        $product = new taxa;
        $product->taxa = $request->taxa; 
        $product->save();
        return redirect()->route('registro')->with('message', 'Produto criado com sucesso!');
 
    }
    public function destroy($id) {
        $product = Registro::findOrFail($id);
        $product->delete(); 
        return redirect()->route('vendas')->with('message', 'Produto criado com sucesso!');
 }

    public function register(Request $request){
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        $data = strftime('%d de %B de %Y', strtotime('today'));
        $today = date("H:i:s");          
        $id = Registro::all()->count();
        $venda = $id + 1;
        $cliente = DB::table('pdvs')->select('cliente')->value('cliente');        
        $telefone = DB::table('cliente_tables')->where('name',$cliente)->value('celular');
        $cep = DB::table('cliente_tables')->where('name',$cliente)->value('cep');
        $rua = DB::table('cliente_tables')->where('name',$cliente)->value('rua');
        $bairro = DB::table('cliente_tables')->where('name',$cliente)->value('Bairro');
        $cidade = DB::table('cliente_tables')->where('name',$cliente)->value('Cidade');
        $user = auth()->user()->name;
        $subtotal = DB::table('pdvs')->select('price');
        $total = $subtotal->sum('price');                
        $taxa = DB::table('taxas')->select('taxa')->orderBy('id', 'desc')->first()->taxa;
        $stotal = $total + $taxa;        
        $dinheiro = DB::table('pagamentos')->select('dinheiro')->orderBy('id', 'desc')->first()->dinheiro;
        $credito = DB::table('pagamentos')->select('credito')->orderBy('id', 'desc')->first()->credito;
        $debito = DB::table('pagamentos')->select('debito')->orderBy('id', 'desc')->first()->debito;
        $boleto = DB::table('pagamentos')->select('boleto')->orderBy('id', 'desc')->first()->boleto;
        $troco = DB::table('pagamentos')->select('troco')->orderBy('id', 'desc')->first()->troco;
        $product = new registro;
        $product->cliente = $cliente;
        $product->valor_pedido = $total;
        $product->taxa = $taxa;
        $product->dinheiro = $dinheiro;
        $product->credito = $credito;
        $product->debito = $debito;
        $product->boleto = $boleto;
        $product->troco = $troco;
        $product->save();
        $inserts = [];
        $bids = DB::table('pdvs')->select('id','cliente','name','description','quantity','price','imagem','created_at')->get();
        foreach($bids as $bid) {
        $inserts[] = [ 'id'  => $bid->id,
        'cliente'  => $bid->cliente,
        'name'  => $bid->name,
        'description'  => $bid->description,
        'quantity'  => $bid->quantity,
        'price'  => $bid->price,
        'imagem'  => $bid->imagem,
        'created_at' => $date = date('Y-m-d H:i:s'),
        
    ]; 
    
        }
    try {
        // Enter the share name for your USB printer here
        //$connector = null;
        $connector = new WindowsPrintConnector("Receipt Printer");
        /*Print a "Hello world" receipt" */
        $printer = new Printer($connector);
        $printer -> text("JR INFORCELL DISTRIBUIDORA\n");
        $printer -> text("00.000.000/0001-91\n");
        $printer -> text("------------------------------------------------\n");
        $printer -> text("COMPROVANTE DE REGISTRO DE\n");
        $printer -> text("NOTA FISCAL DE VENDA AO CONSUMIDOR\n");
        $printer -> text("------------------------------------------------\n");
        $printer -> text("Cliente:     {$cliente}\n");
        $printer -> text("Endereço:    {$rua}\n");
        $printer -> text("Bairro:      {$bairro}\n");
        $printer -> text("Cidade:      {$cidade}\n");
        $printer -> text("CEP:         {$cep}\n");
        $printer -> text("Telefone:    {$telefone}\n");        
        $printer -> text("------------------------------------------------\n");
        $printer -> text("Venda:  Nº {$venda}   {$today}    {$data}\n");
        $printer -> text("------------------------------------------------\n");
        $printer -> text("Produtos\n");
        $printer -> text("------------------------------------------------\n");
        $printer -> text("Nome               Qtde  Valor Uni(R$) Total(R$)\n");
        $printer -> text("------------------------------------------------\n");  
        //dd($inserts2);
        $bids2 = DB::table('pdvs')->select('name','description','quantity','price','priceone')->get();
    
        foreach($bids2 as $bid2 ) {
        $inserts2[] = [ 
        'name'  => $bid2->name,
        'description'  => $bid2->description,
        'quantity'  => $bid2->quantity,
        'price'  => $bid2->price,
        'priceone'  => $bid2->priceone,
        ]; 
        $printer ->text($bid2->name."    ".$bid2->quantity."     ".$bid2->priceone."     ".$bid2->price."\n");
        }
        $printer -> text("------------------------------------------------\n");
        $printer -> text("Total:                               R$ {$total}\n");
        $printer -> text("Taxa:                                R$ {$taxa}\n");
        $printer -> text("Troco:                               R$ {$troco}\n");
        $printer -> text("------------------------------------------------\n");
        $printer -> text("Observação: NSU: 8883 11/05/2018 12:29:54\n");
        $printer -> text("Não trocamos peças danificadas, Flex rasgado, películas removidas ou selos de garantia danificados. Favor testar as peças antes de montar os aparelhos.\n");
        $printer -> text("------------------------------------------------\n");
        $printer -> text("                    Atendente:   {$user} \n");
        $printer -> cut();
        
       // Close printer 
        $printer -> close();
    } catch (Exception $e) {
        echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
    }
        DB::table('registro_pdvs')->insert($inserts);
        DB::table('pdvs')->truncate();
        DB::table('cliente_locals')->truncate();
        return redirect()->route('show')->with('message', 'Produto criado com sucesso!');
    }
    public function show() {
        $produtos = registro::all();
        $total = registro::all()->count();        
        DB::table('registro_edits')->truncate(); 
        return view('registro.show-pdv', compact('produtos', 'total'));
    }  

    public function edit($id) {
        $list = DB::table('registros')->where('id',$id)->value('created_at');
        $produtos = DB::table('registro_pdvs')->where('created_at', $list)->get();
        $cliente = DB::table('registros')->where('id',$id)->value('cliente'); 
        $cpf = DB::table('cliente_tables')->where('name',$cliente)->value('cpf'); 
        $bids = DB::table('registro_pdvs')->where('created_at', $list)
        ->select('id','cliente','name','description','quantity','price','imagem','created_at')->get();
        
        foreach($bids as $bid) {
            $inserts[] = [ 
            'id'  => $bid->id,
            'cpf' => $cpf,
            'cliente'  => $bid->cliente,
            'name'  => $bid->name,
            'description'  => $bid->description,
            'quantity'  => $bid->quantity, 
            'price'  => $bid->price,
            'imagem'  => $bid->imagem,
            'created_at' => $list,
            
        ]; 
    }
        DB::table('registro_edits')->insert($inserts);               
        $total = $produtos->count();
        //dd($produtos,$list,$cliente,$cpf);
        return redirect()->route('alter'); 
       
        //return view('registro.edit-registro', compact('produtos', 'total','cpf','cliente'));
    }
    

    
    public function alter() {
        $cliente = DB::table('registro_pdvs')->value('cliente'); 
        $cpf = DB::table('cliente_tables')->where('name',$cliente)->value('cpf'); 
        //$list = DB::table('registros')->where('id',$id)->value('created_at');
        $produto = DB::table('registro_edits')->get();
        $product = DB::table('registro_edits')->value('created_at');
        $total = $produto->count();
        $produtos = DB::table('registro_pdvs')->where('created_at',$product)->get();
        //dd($produtos,$total);
        //DB::table('registro_edits')->truncate();
        return view('registro.edit-registro-item', compact('produtos', 'total','cpf','cliente'));
    }
    

}
//<iframe src="http://192.168.0.3:3000/imprimir" frameborder="no" width="500" height="500" 
  //  scrolling="no" marginwidth="0" marginheight="0" 
   //allowtransparency="true" style="visibility:hidden" name="galeria2"> </iframe>   
  
