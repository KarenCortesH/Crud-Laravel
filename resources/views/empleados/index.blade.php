@extends('layouts.app')

@section('content')

<!-- lo que estamos haciendo es preguntar vea existe un mensaje
creamos una variable de nombre mensaje y despues de esto hacemos
que este mensaje se muestre solo si existe o si tiene informacion-->
<div class="container">
@if(Session::has('Mensaje'))

    <div class="alert alert-success" role="alert">
    {{ Session::get('Mensaje') }}
    </div>

@endif
<a href="{{ url('empleados/create') }}" class="btn btn-success">Agregar Empleado</a>
<br/>
<br/>
<table class="table table-light table-hover">
    <thead class="thead-light">
    <tr>
    <th>#</th>
    <th>Foto</th>
    <th>Nombre Completo</th>
    <th>Correo</th>
    <th>Acciones</th>
    </tr>

</thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>
            <img src="{{ asset('storage').'/'. $empleado->Foto}}" class="img-thumbnail img-fluid" alt="" width="200">
            </td>
            <td>{{ $empleado->Nombre}} {{ $empleado->Apellido1}} {{ $empleado->Apellido2}}</td>
            <td>{{ $empleado->Correo}}</td>
            <td>
            <a  class="btn btn-warning" href="{{ url('/empleados/'.$empleado->id.'/edit') }}">
            Editar
            </a>

            <form method="POST" action="{{ url('/empleados/'.$empleado->id)}}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
         
            <button class="btn btn-danger" type="button" onclick="return confirm('¿Borrar?');">Borrar</button>
            </td>

        </tr>
        @endforeach
      
        </div>
        </table>
        <!-- esto es para poner la paginacion de los datos del CRUD-->
        {{ $empleados->links()}}

        @endsection  
     