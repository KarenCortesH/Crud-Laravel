{{ $Modo=='crear' ? 'Agregar empleado':'Modificar Empleado' }}
<!-- -->
<div class="form-group">
  <label for="Nombre" class="control-label">{{'Nombre'}}</label>
  <input type="text" class="form-control" name="Nombre" id="Nombre" value="{{ isset($empleado->Nombre)?$empleado->Nombre:'' }}">
</div>
  
<div class="form-group">
<label for="Apellido1" class="control-label">{{'Primer Apellido'}}</label>    
<input type="text"  class="form-control" name="Apellido1" id="Apellido1" value="{{ isset($empleado->Apellido1)?$empleado->Apellido1:'' }}">
</div>

<div class="form-group">
<label for="Apellido2" class="control-label">{{'Segundo Apellido'}}</label>    
<input type="text" class="form-control" name="Apellido2" id="Apellido2" value="{{ isset($empleado->Apellido2)?$empleado->Apellido2:'' }}">
</div>

<div class="form-group">
<label for="Correo" class="control-label">{{'Correo'}}</label>    
<input type="email" class="form-control"  name="Correo" id="Correo" value="{{ isset($empleado->Correo)?$empleado->Correo:'' }}">
</div>

<div class="form-group">
<label for="Foto" class="control-label">{{'Foto'}}</label>  
@if(isset($empleado->Foto)) 
<br/>
<img  class="img-thumbnail img-fluid" src="{{ asset('storage').'/'. $empleado->Foto}}" alt="" width="200">
<br/>
@endif
<input type="file" class="form-control" name="Foto" id="Foto" value="">
</div>

<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}">
<a class="btn btn-primary" href="{{ url('empleados') }}">Regresar</a>

