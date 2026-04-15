@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-10">

           <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Lista de Personas</h4>
                </div>

                <div class="card-body p-4">

                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($personas as $persona)
                                <tr>
                                    <td class="fw-bold">{{$persona->id_persona}}</td>
                                    <td>{{$persona->nom}}</td>
                                    <td>{{$persona->ap}}</td>
                                    <td>{{$persona->am}}</td>
                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{$persona->fecha_nac}}
                                        </span>
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
