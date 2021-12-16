<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostProducto extends Model
{
    use HasFactory;

    
    public function negocio(){
        return $this->belongsToMany(Negocio::class, "negocio_postproducto", "negocio_id", "postproducto_id");
    }

    public function producto(){
        return $this->belongsTo(Producto::class);
    }

    public function oferta(){
        return $this->hasOne(Oferta::class);
    }
}
