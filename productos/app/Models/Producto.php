<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\TipoProducto;


class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id_tipo_producto', 'nombre', 'precio', 'cantidad'];

    public function tipo()
    {
        return $this->hasOne(TipoProducto::class);
    }
}
