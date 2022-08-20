@extends('layouts.plantilla')

@section('css')
<link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endsection

@section('contenido')

@if (session()->has('flash'))
    <div class="alert alert-success" role="alert">{{session('flash') }} </div>
@endif

@if (session()->has('flash2'))
    <div class="alert alert-warning" role="alert">{{session('flash2') }} </div>
@endif

@if (session()->has('flash3'))
    <div class="alert alert-danger" role="alert">{{session('flash3') }} </div>
@endif

<a href="articulos/create" class="btn btn-success">Crear Artículo</a>

<table id="articulos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">CODIGO</th>
            <th scope="col">DESCRIPCIÓN</th>
            <th scope="col">CANTIDAD</th>
            <th scope="col">PRECIO</th>
            <th scope="col">ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articulos as $articulo) 
        <tr>
            <td>{{$articulo->id}}</td>
            <td>{{$articulo->codigo}}</td>
            <td>{{$articulo->descripcion}}</td>
            <td>{{$articulo->cantidad}}</td>
            <td>{{$articulo->precio}}</td>
            <td>
                <form action="{{ route ('articulos.destroy',$articulo->id)}}" method="POST">
                <a href="/articulos/{{$articulo->id}}/edit" class="btn btn-warning">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Estas seguro de eliminar este artículo?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {
    $('#articulos').DataTable();
});
</script>
@endsection

@endsection