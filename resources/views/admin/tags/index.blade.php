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
                            Lista de Etiquetas
                            <a href="{{ route('tags.create') }}" class="btn-sm btn btn-outline-primary float-right">Crear</a>
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
                                            @foreach($tags as $tag)
                                                <tr>
                                                    <td>{{$tag->id}}</td>
                                                    <td>{{$tag->name}}</td>
                                                    <td witdh="10px">
                                                        <a href="{{ route('tags.show',$tag->id) }}" class="btn btn-sm btn-outline-info">
                                                            Ver
                                                        </a>
                                                    </td>
                                                    <td witdh="10px">
                                                            <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-sm btn-outline-success">
                                                                Editar
                                                            </a>
                                                    </td>
                                                    <td witdh="10px">
                                                           {!! Form::open(['route' => ['tags.destroy',$tag->id],
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
                                    {{ $tags->render() }}
                        </div>
                </div>
        </div>



    </div>
</div>
@endsection