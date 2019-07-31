{{ $Modo=='crear' ? 'Agregar empleado':'Modificar Empleado' }}
<!-- -->
<label for="Nombre">{{'Nombre'}}</label>    
<input type="text" name="Nombre" id="Nombre" value="{{ isset($empleado->Nombre)?$empleado->Nombre:'' }}">
<br/>
<label for="Nombre">{{'Primer Apellido'}}</label>    
<input type="text" name="Apellido1" id="Apellido1" value="{{ isset($empleado->Apellido1)?$empleado->Apellido1:'' }}">
<br/>
<label for="Nombre">{{'Segundo Apellido'}}</label>    
<input type="text" name="Apellido2" id="Apellido2" value="{{ isset($empleado->Apellido2)?$empleado->Apellido2:'' }}">
<br/>
<label for="Nombre">{{'Correo'}}</label>    
<input type="email" name="Correo" id="Correo" value="{{ isset($empleado->Correo)?$empleado->Correo:'' }}">
<br/>
<label for="Nombre">{{'Foto'}}</label>  
@if(isset($empleado->Foto)) 
<br/>
<img src="{{ asset('storage').'/'. $empleado->Foto}}" alt="" width="200">
<br/>
@endif
<input type="file" name="Foto" id="Foto" value="">
<br/>

<input type="submit" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}">
<br/>
<a href="{{ url('empleados') }}">Regresar</a>

