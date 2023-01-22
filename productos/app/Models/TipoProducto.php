<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Producto;

class TipoProducto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nombre'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_tipo_producto');
    }
}
