@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-10">

           <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Lista de familiares</h4>
                </div>
               <div class="row">
                   <div class="col-1">
                       <a type="button" class="btn btn-info" href="{{route("familiares.create")}}">Agregar</a>

                   </div>
               </div>

                <div class="card-body p-4">

                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Persona</th>
                                    <th>Telefono</th>
                                    <th>DNI</th>
                                    <th>Direccion</th>
                                    <th>Parentezco</th>
                                    <th>Ninio</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>

                            <tbody>

                            @foreach($familiares as $familiar)
                                <tr>
                                    <td class="fw-bold">{{$loop->index+1}}</td>
                                    <td>{{$familiar->id_persona}}</td>
                                    <td>{{$familiar->telefono}}</td>
                                    <td>{{$familiar->dni}}</td>
                                    <td>{{$familiar->direccion}}</td>
                                    <td>{{$familiar->id_parentesco}}</td>
                                    <td>{{$familiar->id_ninio}}</td>
                    
                                    <td>
                                        <form action="{{route("familiares.destroy",$familiar)}}" method="post">
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