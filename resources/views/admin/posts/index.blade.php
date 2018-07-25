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
                            Lista de mis Entrada
                            <a href="{{ route('posts.create') }}" class="btn-sm btn btn-outline-primary float-right">Crear</a>
                        </div>
                        <div class="card-body">
                                <table class="table table-hover table-dark">
                                        <head>
                                            <tr>
                                                <th width="10px">ID</th>
                                                <th>Nombre</th>
                                                <th colspan="3">&nbsp;</th>
                                            </tr>
                                        </head>
                                        <tbody>
                                            @foreach($posts as $post)
                                                <tr>
                                                    <td>{{$post->id}}</td>
                                                    <td>{{$post->name}}</td>
                                                    <td witdh="10px">
                                                        <a href="{{ route('posts.show',$post->id) }}" class="btn btn-sm btn-outline-info">
                                                            Ver
                                                        </a>
                                                    </td>
                                                    <td witdh="10px">
                                                            <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-sm btn-outline-success">
                                                                Editar
                                                            </a>
                                                    </td>
                                                    <td witdh="10px">
                                                           {!! Form::open(['route' => ['posts.destroy',$post->id],
                                                           'method' => 'DELETE'])  !!}

                                                                <button class="btn btn-sm btn-outline-danger">
                                                                    Eliminar
                                                                </button>

                                                           {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                </table>
                                    {{ $posts->render() }}
                        </div>
                </div>
        </div>



    </div>
</div>
@endsection