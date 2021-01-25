<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    use HasFactory;
    protected $fillable=['modelo', 'color', 'kilometros', 'marca_id', 'foto'];
    //como tenemos una relación 1:n 1 coche pertence a una marca

    public function marca(){
        return $this->belongsTo(Marca::class)->withDefault(['nombre'=>"No tiene Marca"]);
    }
}
