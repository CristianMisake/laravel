@extends('layouts.master')

@section('content')
    <div class="container">
        <form action="{{route('store')}}" method="POST">
            @csrf
            <div class="row mt-5">
                <div class="col-12 mb-3">
                    <h3 class="text-center">Nuevo Lenguaje de programacón</h3>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <input type="text" name="lenguaje" id="lenguaje" class="form-control" placeholder="lenguaje de programación"/>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <input type="text" name="compilado" id="compilado" class="form-control" placeholder="Ingrese en que compila"/>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese la descripción"/>
                    </div>
                </div>
                <div class="col-3">
                    <button type="submit" class="btn btn-success w-100">Guardar</button>
                </div>
            </div>
        </form>
        <hr>
        <div class="row mt-4">
            <div class="col-12 mb-3">
                <h3 class="text-center">Listado de Lenguajes de programacón <span class="badge badge-pill badge-primary">{{count($lenguajes)}}</span></h3>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" scope="col">Id</th>
                            <th class="text-center" scope="col">Lenguaje</th>
                            <th class="text-center" scope="col">Compilado</th>
                            <th class="text-center" scope="col">Descripcion</th>
                            <th class="text-center" scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lenguajes as $lenguaje)
                            <tr>
                                <td class="text-center">{{$lenguaje->id}}</td>
                                <td class="text-center">{{$lenguaje->lenguaje}}</td>
                                <td class="text-center">{{$lenguaje->compilado}}</td>
                                <td>{{$lenguaje->descripcion}}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{route('editar', $lenguaje->id)}}" class="btn btn-primary">Editar</a>
                                        <a href="#" onclick="document.getElementById('destroyForm{{$lenguaje->id}}').submit();" class="btn btn-danger">Eliminar</a>
                                    </div>
                                    <form id="destroyForm{{$lenguaje->id}}" method="POST" action="{{route('eliminar', $lenguaje->id)}}">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No hay registros</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if (Session::has('exitoso'))
                    <div class="alert alert-success">
                        {{Session::get('exitoso')}}
                    </div>
                @endif
                @if (Session::has('eliminado'))
                    <div class="alert alert-success">
                        {{Session::get('eliminado')}}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection