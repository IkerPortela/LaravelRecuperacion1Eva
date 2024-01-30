@if(count($incidences)=== 0)
<p>No hay ninguna incidencia</p>
@else
<table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Prioridad</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Actualizada</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($incidences as $incidence)
                    <tr>
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <span>{{$incidence->id}}</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center gap-1">
                                <a href="{{ route('incidences.show', $incidence) }}"><span>{{ $incidence->title }}</span></a>
                                @auth
                                @if($incidence->user_id === Auth::user()->id)
                                    <div class="ms-md-auto d-flex gap-1">
                                        <a class="btn btn-warning btn-sm btn-custom-width" href="{{ route('incidences.edit', $incidence) }}" role="button">Editar</a>
                                        <form action="{{ route('incidences.destroy', $incidence) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger btn-custom-width" type="submit" onclick="return confirm('¿Estás seguro?')">Borrar</button>
                                        </form>
                                    </div>
                                @endif
                                @endauth
                            </div>
                        </td>

                    <td>
                    <span>{{$incidence->category->name}}</span>
                    </td>
                    <td>
                    <span>{{$incidence->priority->name}}</span>
                    </td>
                    <td>
                    <span>{{$incidence->status->name}}</span>
                    </td>
                    <td>
                        @if($incidence->updated_at === null)
                    <span>{{$incidence->created_at}}</span>
                        @else
                    <span>{{$incidence->updated_at}}</span>
                        @endif
                    </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" style="text-align:center">No hay incidencias</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
@endif