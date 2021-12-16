<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    public function usuario(){

        return $this->belongsToMany(User::class, "favorito_user", "favorito_id", "user_id");
    }
}
