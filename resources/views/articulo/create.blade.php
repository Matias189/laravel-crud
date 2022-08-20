@extends('layouts.plantilla');

@section('contenido')

<h2>Crear Registros</h2>

<form action="/articulos" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Código</label>
        <input id="codigo" name="codigo" type="text" class="form-control" tabindex="1" value="{{old('codigo')}}">
        @error('codigo')
        <small>
            <strong><li style="color:red";>{{$message}}</li></strong>
        </small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <input id="descripcion" name="descripcion" type="text" class="form-control" tabindex="2" value="{{old('descripcion')}}">
        @error('descripcion')
        <small>
            <strong><li style="color:red";>{{$message}}</li></strong>
        </small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Cantidad</label>
        <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="3" value="{{old('cantidad')}}">
        @error('cantidad')
        <small>
            <strong><li style="color:red";>{{$message}}</li></strong>
        </small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Precio</label>
        <input id="precio" name="precio" type="number" step="any" value="0.00" class="form-control" tabindex="3">
        @error('precio')
        <small>
            <strong><li style="color:red";>{{$message}}</li></strong>
        </small>
        @enderror
    </div>
    <a href="/articulos" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button> 
</form>
@endsection