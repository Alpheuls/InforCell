<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class registro_edit extends Model
{
    protected $fillable = ['id','cliente','cpf','name','description','quantity','price','imagem','created_at'];
    protected $guarded = ['created_at','update_at'];
    protected $table = 'registro_edits'; 
}
