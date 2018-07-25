@extends('layouts.app')
@section('css')
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endsection 
@section('content')
<div class="container py-4">
    <div class="row">


        <div class="col-md-8 offset-md-2">
                <div class="card">
                        <div class="card-header">
                            Ver Etiqueta
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 text-center">
                                        <h3><strong>Nombre </strong></h3> <h5 style="color:gray;">{{$tags->name}}</h5> 
                                    </div>
                                    <div class="col-md-6 col-sm-12 text-center">
                                        <h3><strong>Slug </strong></h3> <h5 style="color:gray;">{{$tags->slug}}</h5> 
                                    </div>
                                </div>
                        </div>
                </div>
        </div>



    </div>
</div>
@endsection