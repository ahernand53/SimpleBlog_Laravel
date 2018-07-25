<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Salvar datos de forma masiva por formularios
    protected $fillable =[
        'name','slug','excerpt','body'
    ];

  
    public function posts(){
        return $this->hasMany(Post::class); //Una categoria tiene muchos post
    }
}
