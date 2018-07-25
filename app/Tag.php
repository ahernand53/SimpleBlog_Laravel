<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //Salvar datos de forma masiva por formularios
    protected $fillable =[
        'name','slug'
    ];

  
    public function posts(){
        return $this->belongsToMany(Post::class); //Relacion de muchos a muchos
    }
}
