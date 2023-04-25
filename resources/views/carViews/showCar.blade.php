@extends('layouts.master')
@section('title', 'Index Autos')     
@section('content')
            <div class="row">
                <table class="table table-dark mt-2">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Año</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Fecha de ingreso</th>
                        <th scope="col">Version</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($car)                    
                            <tr>
                                <th scope="row">{{$car->id}}</th>
                                <td><img width="300" height="200" src="{{ asset('images/cars/'.$car->imagen) }}" alt="job image" title="job image"></td>
                                <td>{{$car->marca}}</td>
                                <td>{{$car->modelo}}</td>
                                <td>{{$car->anio}}</td>
                                <td>{{$car->precio}}</td>
                                <td>{{$car->fecha_ingreso}}</td>
                                <td>{{$car->version}}</td>                                
                            </tr>
                        @endisset
                    </tbody>
                </table>
            </div>
            <div class="row">
                <button type="button" class="btn btn-primary mt-4 mb-2 " onclick='back()'>Atras</button>
            </div>

            <script>
            function back(){
                let new_url = window.location.origin;
                window.location.href = new_url;    
            }
        </script>
@stop