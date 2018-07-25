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
                            Editar Categoría
                        </div>
                        <div class="card-body">
                                {!! Form::model($category, ['route'=>['categories.update',$category->id],
                                    'method'=>'PUT']) !!}

                                        @include('admin.categories.partials.form')
                                        
                                {!! Form::close()!!}
                        </div>
                </div>
        </div>



    </div>
</div>
@endsection