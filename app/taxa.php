<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class taxa extends Model
{
    protected $fillable = ['taxa'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'taxas'; 
}
