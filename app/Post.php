<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    //Salvar datos de forma masiva por formularios
    protected $fillable =[
        'user_id','Category_id','name','slug','excerpt','body','status','file'
    ];

    //Hacemos las relaciones 
    public function user(){
        return $this -> belongsTo(User::class);
    }

    public function category(){
        return $this -> belongsTo(Category::class); //Relacion de uno a muchos
    }

    public function tags(){
        return $this->belongsToMany(Tag::class); //Relacion de muchos a muchos
    }
}
