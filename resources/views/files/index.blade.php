@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Lista de archivos subidos <a href="files/create"><button type="button" class="btn btn-success float-right">Subir archivo(s)</button></a></h2>
    <h6>
        @if($search)
        <div class="alert alert-primary" role="alert">
            Los resultados para tu busqueda '{{ $search }}' son: 
        </div>
        @endif
    </h6>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre del archivo</th>
        <th scope="col">Opciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach($files as $file)
    <tr>
        <th scope="row">{{$file->id}}</th>
        <td>{{$file->name}}</td>
        <td>
            <form action="{{ route('files.destroy', $file->id) }}" method="POST">
                <a target="_blank" href="{{ route('files.show', $file->id)}}"><button type="button" class="btn btn-secondary btn-sm"><i class="far fa-eye"></i></button></a>
                <a href="{{ route('files.download', $file->id)}}"><button type="button" class="btn btn-primary btn-sm"><i class="fa-duotone fa-download"></i></button></a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button> 
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>
@endsection