@extends('layouts.app')
@section('css')
<link href="{{ asset('css/posts.css') }}" rel="stylesheet">
@endsection
@section('content')

<div class="container" style="padding-top: 25px;">
        <div class="row">
             <div class="col-sm-12">
                     <div class="card mb-3">
                         @if($post->file)
                            <img class="card-img-top" src="{{$post->file}}" style="width: auto; height: 350px;" alt="img post">
                         @endif
                         <div class="card-body">
                           <div class="row" style="margin-bottom: 10px;">
                               <div class="col-4">
                                  <!-- <img src="imgsystem/co2.jpg" style="width: 50px; height: 50px;" alt="fondo"> --> <span style="color: gray;"> <strong>{{$post->user->name}}</strong></span>
                                 <br>
                                 <p> <strong>Fecha: <span style="color: gray;">06/06/2018</span></strong></p>
                                 
                             </div>
                               <div class="col-4">
 
                               </div>
                               <div class="col-4">
                                     <label style="color: gray;"> <strong>Categoría: <span style="color: grey;"><label style="color: gray;"> <a href="{{ route ('category',$post->category->slug)  }}">{{$post->category->name}}</a> </label></span></strong></label>
                               </div>
                           </div>
                           <h4 class="card-title"><strong>{{$post->name }}</strong></h4>
                            {!! $post->body !!}
                            <hr>
                            Etiquetas:
                            @foreach($post->tags as $tag)
                                    <a href="{{ route ('tag', $tag->slug)  }}"> <i class="fas fa-tag"></i> {{$tag->name}} <vr> </a>
                            @endforeach
                         </div>
                     </div>
                 </div>
        </div>
     </div>



@endsection