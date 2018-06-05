<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OS extends Model
{
    protected $fillable = ['name','end','tel','produto','acessorio','problema','marca','modelo','status'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'o_s';
}
