@extends('layouts.app')
@section('css')
<link href="{{ asset('css/posts.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container" style="padding-top: 25px;">
    <div class="row">

    @foreach($posts as $post)

    <div class="col-sm-12">
         <div class="card mb-3">
             @if($post->file)
             <img class="card-img-top" src="{{$post->file}}" style="width: auto; height: 200px;" alt="img post">
             @endif
             <div class="card-body">
               <h5 class="card-title">{{$post->name}}</h5>
               <p class="card-text">{{$post->excerpt}}</p>
               <div class="row">
                   <div class="col-sm-4">
                         <p class="card-text"><small style="color: gray;">Publicado: <span style="color:black">{{$post->created_at }}</span> </small></p>
                   </div>
                   <div class="col-sm-8">
                         <a href="{{ route('post', $post->slug )  }}" class="btn btn-outline-primary btn-sm active more" role="button" aria-pressed="true">Leer más <i class="fas fa-book-open"></i> </a>
                   </div>
               </div>
             </div>
         </div>
     </div>
    @endforeach  
    {{$posts->render()}}
    </div>
</div>

@endsection