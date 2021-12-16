<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function usuario(){

        return $this->belongsTo(User::class);
    }

    public function postproductos(){
        return $this->belognsToMany(PostProductos::class, "negocio_postproducto", "negocio_id", "postproducto_id");
    }

    public function feedback(){
        return $this->belongsToMany(Feedback::class, "feedback_negocio", "feedback_id", "negocio_id");
    }
}
