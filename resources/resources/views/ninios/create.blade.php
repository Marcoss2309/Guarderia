@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Crear un Niño</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{url('ninios')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="matricula" class="form-label">Matricula</label>
                                <input type="text" class="form-control @error('matricula') is-invalid @enderror" id="matricula" name="matricula" placeholder="AE328" required>
                                @error('matricula')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="id_persona" class="form-label">No. Persona</label>
                                <input type="text" class="form-control @error('id_persona') is-invalid @enderror" id="id_persona" name="id_persona" placeholder="Eje. 1" require>
                                 @error('id_persona')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="id_centro" class="form-label">No. Centro</label>
                                <input type="text" class="form-control @error('id_centro') is-invalid @enderror" id="id_centro" name="id_centro" placeholder="Eje. 1" require>
                                 @error('id_centro')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
                            <input type="date" class="form-control @error('fecha_ingreso') is-invalid @enderror" id="fecha_ingreso" name="fecha_ingreso" require>
                             @error('fecha_ingreso')
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
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