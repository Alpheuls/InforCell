<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $fillable = ['cliente','valor_pedido','taxa','dinheiro','credito','debito','boleto','troco'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'registros'; 
}
