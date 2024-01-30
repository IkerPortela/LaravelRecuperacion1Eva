@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$incidence->title}}</h1>
    <h4>Creador: {{$incidence->user->name}}</h4>
    <h5>Incidencia del departamento de {{$incidence->department->name}}</h5>
<div class="d-flex justify-content-between">
    <h5 class="text-start">Categoria: {{$incidence->category->name}}</h5>
    <h5 class="text-center">Prioridad: {{$incidence->priority->name}}</h5>
    <h5 class="text-end">Estado: {{$incidence->status->name}}</h5>
</div>
<h4>Descripcion:</h4>
    <p>{{$incidence->text}}</p>
    <div class="d-flex justify-content-between">
    <p>CREADO EL {{$incidence->created_at}}</p>
    @if($incidence->updated_at != null)
        <p class="text-end">ULTIMA ACTUALIZACION EL {{$incidence->updated_at}}</p>
    @endif
</div>
    @include('layouts.commentSection')
</div>
@endsection
