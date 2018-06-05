<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteTable extends Model
{
    protected $fillable = ['name','cpf','email','celular','cep','rua','bairro','cidade'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'cliente_tables';
}