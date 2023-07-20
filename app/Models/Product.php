<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'products';
    protected $fillable = ['id', 'brand_id', 'unit_id', 'codigo', 'cod_prov', 'descripcion', 'cantidad_u', 'cantidad_eu', 'stock', 'stock_minimo', 'peso'];

    public function providers()
    {
        return $this->belongsToMany(Provider::class, 'product_provider')
                    ->withPivot('orden', 'cantidad', 'precio_compra', 'active');
    }
}
