<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    
    protected $table = 'customers';
    protected $fillable = ['id', 'codigo_cliente', 'tipo_doc', 'documento_cliente', 'razon_social', 'direccion', 'telefono', 'mail'];

    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }


}
