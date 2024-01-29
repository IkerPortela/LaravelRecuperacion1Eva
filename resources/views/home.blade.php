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
    <ul>
        @foreach ($incidences as $incidence)
            @if($incidence->user_id === Auth::user()->id)
                <li>
                    <a href="{{ route('incidences.show', $incidence) }}"> {{ $incidence->title }}</a>.
                    Escrito el {{ $incidence->created_at }}
                </li>
            @endif
        @endforeach
</ul>
</div>
@endsection