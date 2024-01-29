@extends('layouts.app')
@section('content')
<div class="container">
    <h1>{{$incidence->title}}</h1>
    <p>Creado el {{$incidence->created_at}}</p>
    <p>{{$incidence->text}}</p>

    @include('layouts.commentSection')
</div>
@endsection
