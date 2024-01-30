@extends('layouts.app')

@section('content')
    <h1 style="text-align: center">DEPARTAMENTOS</h1>
    <div class="container mx-auto">
    @if(count($departments)=== 0)
<p>No hay ningun departamento</p>
@else
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Incidencias</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($departments as $department)
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>{{$department->name}}</span>
                                @auth
                                    <div class="d-flex gap-1">
                                        <a class="btn btn-warning btn-sm btn-custom-width" href="{{route('departments.edit',$department)}}" role="button">Editar</a>
                                        <form action="{{route('departments.destroy',$department)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger btn-custom-width" type="submit" onclick="return confirm('¿Estas seguro?')">Borrar</button>
                                        </form>
                                    </div>
                                @endauth
                            </div>
                        </td>
                        <td><a href="{{route('departments.show', $department)}}">Ver Incidencias</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" style="text-align:center">No hay departamentos</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @endif
        @auth  
        <div class="d-flex flex-column flex-md-row p-1 gap-1 py-md-1">
            <a class="btn btn-primary" href="{{route('departments.create')}}" role="button">Crear un nuevo departamento</a>
        </div>
    @endauth
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection

