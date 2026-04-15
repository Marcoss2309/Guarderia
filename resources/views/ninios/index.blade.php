@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-10">

           <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Lista de Ninios</h4>
                </div>
               <div class="row">
                   <div class="col-1">
                       <a type="button" class="btn btn-info" href="{{route('ninios.create')}}">Agregar</a>

                   </div>
               </div>

                <div class="card-body p-4">

                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Matricula</th>
                                    <th>No. Persona</th>
                                    <th>No. Centro</th>
                                    <th>Fecha fecha_ingreso</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>

                            @foreach($ninios as $ninio)
                                <tr>
                                    <td class="fw-bold">{{$loop->index+1}}</td>
                                    <td>{{$ninio->matricula}}</td>
                                    <td>{{$ninio->id_persona}}</td>
                                    <td>{{$ninio->id_centro}}</td>
                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{$ninio->fecha_ingreso}}
                                        </span>
                                    </td>
                                    <td>
                                        <form action="{{route('ninios.destroy',$ninio)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection