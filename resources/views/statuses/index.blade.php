@extends('layouts.app')

@section('content')
    <h1 style="text-align: center">ESTADOS DE INCIDENCIAS</h1>
    <div class="container mx-auto">
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Incidencias</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($statuses as $status)
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>{{$status->name}}</span>
                                @auth
                                    <div class="d-flex gap-1">
                                        <a class="btn btn-warning btn-sm btn-custom-width" href="{{route('statuses.edit',$status)}}" role="button">Editar</a>
                                        <form action="{{route('statuses.destroy',$status)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger btn-custom-width" type="submit" onclick="return confirm('¿Estas seguro?')">Borrar</button>
                                        </form>
                                    </div>
                                @endauth
                            </div>
                        </td>
                        <td><a href="{{route('statuses.show', $status)}}">Ver Incidencias</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" style="text-align:center">No hay estados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @auth  
        <div class="d-flex flex-column flex-md-row p-1 gap-1 py-md-1">
            <a class="btn btn-primary" href="{{route('statuses.create')}}" role="button">Crear un nuevo estado</a>
        </div>
    @endauth
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection

