@extends('layouts.master')
@section('title', 'Index Autos')     
@section('content')
@if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
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
                        <input value ="{{$car->anio}}" type="numeric" name="anio" class="form-control" placeholder="Anio del vehiculo">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Precio:</strong>
                        <input value ="{{$car->precio}}" type="numeric" name="precio" class="form-control" placeholder="Precio del vehiculo">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Fecha de ingreso:</strong>
                        <input value ="{{$car->fecha_ingreso}}" type="date" name="fecha_ingreso" class="form-control" placeholder="Fecha ingreso del vehiculo">
                    </div>
                </div>
            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Guardar</button>
        </form>
    </div>
    
   

@stop