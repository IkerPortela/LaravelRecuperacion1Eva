@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('priorities.update',$priority)}}" method="POST"
        enctype="multipart/form-data"> @csrf @method('PUT') 
        <div class="form-group mb-3"> 
        <label for="name"
        class="form-label">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" required value="{{$priority->name}}"/> </div>
        <div class="form-group mb-3"> 
        <label for="order"
        class="form-label">Orden</label>
        <input type="text" class="form-control" id="order" name="order" required value="{{$priority->order}}"/> </div>
        <button type="submit" class="btn btn-primary" name="">Actualizar</button>
    </form>
</div>
@endsection