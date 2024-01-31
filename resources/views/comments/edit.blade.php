@extends('layouts.app')
@section('content')
<div class="container">
    <form class="mt-2" name="create_platform" action="{{route('comments.update',$comment)}}" method="POST"
        enctype="multipart/form-data"> @csrf @method('PUT') <div class="form-group mb-3"> <label for="text"
        class="form-label">Texto</label>
        <input type="text" class="form-control" id="text" name="text" required value="{{$comment->text}}"/> </div>
        <div class="form-group mb-3"> <label for="used_time"
        class="form-label">Tiempo Utilizado</label>
        <input type="used_time" class="form-control" id="used_time" name="used_time" required value="{{$comment->used_time}}"/> </div>
        <button type="submit" class="btn btn-primary" name="">Actualizar</button>
    </form>
</div>
@endsection