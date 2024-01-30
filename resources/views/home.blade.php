@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1 style="text-align:center">Bienvenido, {{Auth::user()->name}}</h1>
        </div>
    </div>
    <h5>Departamento: {{ Auth::user()->department->name }}</h5>
    <h3>Tus incidencias ({{ count($incidences->where('user_id', Auth::user()->id)) }})</h3>
    @if(count($incidences->where('user_id', Auth::user()->id))=== 0)
    <p>No has reportado ninguna incidencia</p>
    @else
    @include('layouts.incidenceTable')
    @endif
</div>
@endsection