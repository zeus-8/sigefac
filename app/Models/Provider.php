<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'providers';
    //protected $guarded = []; //con guarded dices cuales quieres que excluya
    protected $fillable = ['id', 'codigo_proveedor', 'direccion', 'telefono', 'mail', 'razon_social']; // con fillable debes indicar cuales campos quieres que se guarden
}
