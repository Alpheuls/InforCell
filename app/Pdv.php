<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdv extends Model
{     
    protected $fillable = ['cliente','name','description','quantity','price','priceone','imagem'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'pdvs'; 
}
