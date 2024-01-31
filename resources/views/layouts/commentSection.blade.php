<div class="container my-5 py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="card">
                    <div class="card-body p-4">
                        <h4 class="mb-4 pb-2">Comentarios</h4>
                        @auth
                        @if($incidence->department_id === Auth::user()->department_id)
                        <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" id="incidence_id" name="incidence_id" value="{{ $incidence->id }}">
                        <div class="form-group mb-3">
                        <textarea class="form-control" id="text" name="text" placeholder="Escribe tu comentario aquí..." required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <div class="d-flex">
                                <label for="used_time" class="mr-2">Tiempo Utilizado:</label>
                                <input type="text" class="form-control" id="used_time" name="used_time" required/>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Publicar Comentario</button>
                        </div>
                        @endif
                        </form>
                        @endauth
                    @if(auth()->check())
                        @forelse($incidence->comments as $comment)
                        <hr class="my-0" style="height: 3px; margin-top: 10px; margin-bottom: 10px;" />
                        @auth
                            <div class="d-flex flex-start">
                                <h5>{{$comment->user->name}}</h5>
                            </div>
                            <div>
                                <div>
                                    <p class="mb-0">{{$comment->text}}</p>
                                    
                                </div>
                                <div class="d-flex justify-content-end">
                                <p>Tiempo usado: {{$comment->used_time}}</p>
                            </div>
                                @if($comment->user_id === Auth::user()->id)
                                    <div class="d-flex gap-1 mb-3">
                                        <a class="btn btn-warning btn-sm btn-custom-width" href="{{route('comments.edit',$comment)}}" role="button">Editar</a>
                                        <form action="{{route('comments.destroy',$comment)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger btn-custom-width" type="submit" onclick="return confirm('¿Estas seguro?')">Borrar</button>
                                        </form>
                                    </div>
                                    @endif
                                    @endauth
                            </div>
                        @empty
                            <p>No hay comentarios</p>
                        @endforelse
                        @else
                        <p>Si desea ver los comentarios, registrese o inicie sesión</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>