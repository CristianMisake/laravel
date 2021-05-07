@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-8">
                <h3 class="text-center">Editar Lenguaje de programación {{$actualizarLenguaje->id}}</h3>
                <form class="mt-5" action="{{route('update',$actualizarLenguaje->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="">Ingrese el lenguaje de programación a editar: </label>
                        <input type="text" class="form-control" id="lenguaje" name="lenguaje" value="{{$actualizarLenguaje->lenguaje}}" placeholder="lenguaje de programación">
                    </div>
                    <div class="form-group">
                        <label for="">Ingrese el compilado a editar: </label>
                        <input type="text" class="form-control" id="compilado" name="compilado" value="{{$actualizarLenguaje->compilado}}" placeholder="compilado">
                    </div>
                    <div class="form-group">
                        <label for="">Ingrese el descripción a editar: </label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{$actualizarLenguaje->descripcion}}" placeholder="descripción">
                    </div>
                    <div class="btn-group w-100 mt-1" role="group">
                        <a href="{{route('inicio')}}" class="btn btn-danger">Volver</a>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-md-center mt-5">
            <div class="col-8">
                @if (Session::has('editado'))
                    <div class="alert alert-success">
                        {{Session::get('editado')}}
                    </div>
                @endif
            </div>
        </div>
    </div>   
    
@endsection