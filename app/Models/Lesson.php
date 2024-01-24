<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [];

    //relacion muchos a muchos
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    //relacion uno a muchos inversa indica que este modelo pertenece a un nivel
    public function level(){
        return $this->belongsTo(Level::class);
    }
}
