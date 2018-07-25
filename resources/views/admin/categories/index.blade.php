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
                            Lista de Categorías
                            <a href="{{ route('categories.create') }}" class="btn-sm btn btn-outline-primary float-right">Crear</a>
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
                                            @foreach($categories as $category)
                                                <tr>
                                                    <td>{{$category->id}}</td>
                                                    <td>{{$category->name}}</td>
                                                    <td witdh="10px">
                                                        <a href="{{ route('categories.show',$category->id) }}" class="btn btn-sm btn-outline-info">
                                                            Ver
                                                        </a>
                                                    </td>
                                                    <td witdh="10px">
                                                            <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-sm btn-outline-success">
                                                                Editar
                                                            </a>
                                                    </td>
                                                    <td witdh="10px">
                                                           {!! Form::open(['route' => ['categories.destroy',$category->id],
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
                                    {{ $categories->render() }}
                        </div>
                </div>
        </div>



    </div>
</div>
@endsection