@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Crear un ingrediente</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{url('ingredientes')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="id_persona" class="form-label">ID Ingrediente</label>
                                <input type="number" class="form-control" id="id_ingrediente" name="id_ingrediente" placeholder="Ej. 1">
                            </div>

                            <div class="col-md-8 mb-3">
                                <label for="nom" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Padre">
                            </div>
                        </div>

                            <div class="d-flex justify-content-between">
                                <button type="reset" class="btn btn-outline-secondary">
                                    Limpiar
                                </button>

                                <button type="submit" class="btn btn-success px-4">
                                    Guardar
                                </button>
                            </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection
