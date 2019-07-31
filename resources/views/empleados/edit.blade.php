Seccion para editar empleados
<form action="{{ url('/empleados/'.$empleado->id) }}" method="POST" enctype="multipart/form-data" >
{{ csrf_field() }}
{{ method_field('PATCH') }}
@include('empleados.form',['Modo'=>'editar'])

</form>