Seccion para editar empleados
@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/empleados/'.$empleado->id) }}" method="POST" enctype="multipart/form-data" >
{{ csrf_field() }}
{{ method_field('PATCH') }}
@include('empleados.form',['Modo'=>'editar'])
</div>
@endsection
</form>