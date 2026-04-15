@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Lista de Parentezcos</h4>
                </div>

                <div class="card-body p-4">

                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle text-center">
                            <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($parentezcos as $parentezcos)
                                <tr>
                                    <td class="fw-bold">{{$parentezcos->id_parentezco}}</td>
                                    <td>{{$parentezcos->nombre}}</td>
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

