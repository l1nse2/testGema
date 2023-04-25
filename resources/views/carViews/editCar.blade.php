@extends('layouts.master')
@section('title', 'Index Autos')     
@section('content')
    <div class='container'>
        <div class='row'>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <h1>Editar nuevo vehiculo </h1>
            </div>
        </div>
    </div>
    <div class='row'>
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
            @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                </div>
            @endif
            </div>
        </div>
    <div class='content bg-secondary'>
        <form action="/carUpload" method="post" enctype="multipart/form-data">            
            @csrf
            <input value ="{{$car->id}}" type="text" name="id" hidden>
            <div class="form-group mt-4">
            <img width="200" height="100" src="{{ asset('images/cars/'.$car->imagen) }}" alt="job image" title="job image">
              <input type="file" name="file" class="form-control" accept=".jpg,.jpeg,.bmp,.png,.gif">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Marca:</strong>
                        <input value ="{{$car->marca}}" type="twxt" name="marca" class="form-control" placeholder="Marca del vehiculo">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Modelo:</strong>
                        <input value ="{{$car->modelo}}" type="text" name="modelo" class="form-control" placeholder="Modelo del vehiculo">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Version:</strong>
                        <input value ="{{$car->version}}"  type="text" name="version" class="form-control" placeholder="Version del vehiculo">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Anio:</strong>
                        <input value ="{{$car->anio}}" type="number" name="anio" class="form-control" placeholder="Anio del vehiculo">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Precio:</strong>
                        <input value ="{{$car->precio}}" type="number" name="precio" class="form-control" placeholder="Precio del vehiculo">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fecha de ingreso:</strong>
                        <input value ="{{$car->fecha_ingreso}}" type="date" name="fecha_ingreso" class="form-control" placeholder="Fecha ingreso del vehiculo">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button class="w-100 btn btn-lg btn-primary mt-4 mb-4" type="submit">Guardar</button>
                </div>            
        </form>
    </div>
    <div class="row">
        <div class="col-xs-11 col-sm-11 col-md-11">
        </div>        
        <div class="col-xs-2 col-sm-2 col-md-1">
            <button type="button" class="btn btn-primary mt-4 mb-2 " onclick='back()'>Atras</button>
        </div>
    </div>

    <script>
            function back(){
                let new_url = window.location.origin;
                window.location.href = new_url;    
            }
    </script>
    
   

@stop