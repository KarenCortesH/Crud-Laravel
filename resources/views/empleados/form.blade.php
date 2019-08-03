{{ $Modo=='crear' ? 'Agregar empleado':'Modificar Empleado' }}
<!-- -->
<div class="form-group">
  <label for="Nombre" class="control-label">{{'Nombre'}}</label>
  <input type="text" class="form-control is-invalid {{$errors->has('Nombre')?'is-invalid':'' }}" name="Nombre" id="Nombre" value="{{ isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}">
  {!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>') !!}
</div>
  
<div class="form-group">
<label for="Apellido1" class="control-label">{{'Primer Apellido'}}</label>    
<input type="text"  class="form-control  is-invalid {{$errors->has('Apellido1')?'is-invalid':'' }}" name="Apellido1" id="Apellido1" value="{{ isset($empleado->Apellido1)?$empleado->Apellido1:old('Apellido1') }}">
{!! $errors->first('Apellido1','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="Apellido2" class="control-label">{{'Segundo Apellido'}}</label>    
<input type="text" class="form-control  is-invalid {{$errors->has('Apellido2')?'is-invalid':'' }}" name="Apellido2" id="Apellido2" value="{{ isset($empleado->Apellido2)?$empleado->Apellido2:old('Apellido2') }}">
{!! $errors->first('Apellido2','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="Correo" class="control-label">{{'Correo'}}</label>    
<input type="email" class="form-control  is-invalid {{$errors->has('Correo')?'is-invalid':'' }}"  name="Correo" id="Correo" value="{{ isset($empleado->Correo)?$empleado->Correo:old('Correo') }}">
{!! $errors->first('Correo','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
<label for="Foto" class="control-label">{{'Foto'}}</label>  
@if(isset($empleado->Foto)) 
<br/>
<img  class="img-thumbnail img-fluid" src="{{ asset('storage').'/'. $empleado->Foto}}" alt="" width="200">
<br/>
@endif
<input type="file" class="form-control  is-invalid {{$errors->has('Foto')?'is-invalid':'' }}" name="Foto" id="Foto" value="">
{!! $errors->first('Foto','<div class="invalid-feedback">:message</div>') !!}
</div>

<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}">
<a class="btn btn-primary" href="{{ url('empleados') }}">Regresar</a>

