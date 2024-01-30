@extends('layouts.app')

@section('content')
    <h1 style="text-align: center">CATEGORIAS</h1>
    <div class="container mx-auto">
    @if(count($categories)=== 0)
<p>No hay ninguna categoria</p>
        @else
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Incidencias</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>{{$category->name}}</span>
                                @auth
                                    <div class="d-flex gap-1">
                                        <a class="btn btn-warning btn-sm btn-custom-width" href="{{route('categories.edit',$category)}}" role="button">Editar</a>
                                        <form action="{{route('categories.destroy',$category)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger btn-custom-width" type="submit" onclick="return confirm('¿Estas seguro?')">Borrar</button>
                                        </form>
                                    </div>
                                @endauth
                            </div>
                        </td>
                        <td><a href="{{route('categories.show', $category)}}">Ver Incidencias</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" style="text-align:center">No hay categorias</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        @endif
        @auth  
        <div class="d-flex flex-column flex-md-row p-1 gap-1 py-md-1">
            <a class="btn btn-primary" href="{{route('categories.create')}}" role="button">Crear una nueva categoria</a>
        </div>
    @endauth
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    </div>
@endsection

