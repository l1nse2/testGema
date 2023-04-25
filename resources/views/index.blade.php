@extends('layouts.master')
@section('title', 'Index Autos')     
@section('content')      
@isset($success)
    {{$success}}
@endisset
        <div class="container">
            <div class="row">
                <button type="button" class="btn btn-success mt-4 mb-2 " onclick='newCar()'>Agregar Auto</button>
            </div>
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
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($cars)
                            @foreach($cars as $car)                    
                            <tr>
                                <th scope="row">{{$car->id}}</th>
                                <td><img width="200" height="100" src="{{ asset('images/cars/'.$car->imagen) }}" alt="job image" title="job image"></td>
                                <td>{{$car->marca}}</td>
                                <td>{{$car->modelo}}</td>
                                <td>{{$car->anio}}</td>
                                <td>{{$car->precio}}</td>
                                <td>{{$car->fecha_ingreso}}</td>
                                <td>{{$car->version}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" onclick='seeCar({{$car->id}})'>Ver</button>
                                    <button type="button" class="btn btn-warning btn-sm" onclick='editCar({{$car->id}})'>Editar</button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick='deleteAuto({{$car->id}})'>Borrar</button>
                                </td>
                            </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>
    
    <script>
        function seeCar($id){
            let new_url = window.location.origin + '/car/' + $id
            window.location.href = new_url;

            console.log(new_url);    
        }

        function editCar($id){
            let new_url = window.location.origin + '/carEdit/' + $id
            window.location.href = new_url;

        }

        function newCar(){
            let new_url = window.location.origin + '/newCar/'
            window.location.href = new_url;

            console.log(new_url);    
        }

        function deleteAuto($id) {
              let text = "Estas seguro que deseas borrar el auto";
              if (confirm(text) == true) {
                $.ajax({
                   type:'post',
                   url:'/deleteAjax',
                   data: {  "_token": "{{ csrf_token() }}",
                            id: $id },
                   success:function(data) {
                      alert('el auto fue borrado con exito.');                 
                      location.reload();
                    
                   },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert('a ocurrido un error intentelo nuevamente mas tarde o pongase en contacto con el administrador.')
                    }
                });
              } else {
                text = "You canceled!";
              }
              console.log(text);
            }  
        </script>

@stop
