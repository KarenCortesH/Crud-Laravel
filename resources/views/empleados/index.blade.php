@extends('layouts.app')

@section('content')

<!-- lo que estamos haciendo es preguntar vea existe un mensaje
creamos una variable de nombre mensaje y despues de esto hacemos
que este mensaje se muestre solo si existe o si tiene informacion-->

@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<a href="{{ url('empleados/create') }}">Agregar Empleado</a>
<table class="table table-light">
    <thead class="thead-light">
    <tr>
    <th>#</th>
    <th>Foto</th>
    <th>Nombre</th>
    <th>Primer Apellido</th>
    <th>Segundo Apellido</th>
    <th>Correo</th>
    <th>Acciones</th>
    </tr>

</thead>
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{ $loop->iteration}}</td>
            <td>
            <img src="{{ asset('storage').'/'. $empleado->Foto}}" alt="" width="200">
            </td>
            <td>{{ $empleado->Nombre}}</td>
            <td>{{ $empleado->Apellido1}}</td>
            <td>{{ $empleado->Apellido2}}</td>
            <td>{{ $empleado->Correo}}</td>
            <td>
            <a href="{{ url('/empleados/'.$empleado->id.'/edit') }}">
            Editar
            </a>

            <form method="POST" action="{{ url('/empleados/'.$empleado->id)}}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
            </td>

        </tr>
        @endforeach
        @endsection
    </table>