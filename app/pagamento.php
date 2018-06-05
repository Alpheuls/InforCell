<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pagamento extends Model
{
    protected $fillable = ['dinheiro','credito','debito','boleto','troco'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'pagamentos'; 
}
