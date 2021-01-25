<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $fillable=['nombre', 'historia', 'logo', 'url'];

    public function coches(){
        return $this->hasMany(Coche::class);
    }
}
