<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro_pdv extends Model
{
    protected $fillable = ['id','cliente','name','description','quantity','price','imagem','created_at'];
    protected $guarded = ['created_at','update_at'];
    protected $table = 'registro_pdvs'; 
}
