<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'destinations';
    protected $fillable = ['id','customer_id', 'contacto', 'telef_contac',  'punto_partida', 'punto_llegada', 'placa', 'documento_chofer'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
