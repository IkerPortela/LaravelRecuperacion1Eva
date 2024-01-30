    @extends('layouts.app')
    @section('content')
    <h1 style="text-align: center">INCIDENCIAS</h1>
    <div class="container mx-auto">
    @include('layouts.incidenceTable')
    @auth  
        <div class="d-flex flex-column flex-md-row p-1 gap-1 py-md-1">
            <a class="btn btn-primary" href="{{route('incidences.create')}}" role="button">Crear una nueva incidencia</a>
        </div>
    @endauth
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    </div>
        @endsection
        
