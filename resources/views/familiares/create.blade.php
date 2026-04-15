@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white text-center">
                    <h4 class="mb-0">Asignar un familiar</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{url('familiares')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="id_persona" class="form-label">Id_persona</label>
                                <input type="text" class="form-control @error('id_persona') is-invalid @enderror" id="id_persona" name="id_persona" placeholder="Ej. 1" required>
                                @error('id_persona')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" placeholder="Ej. 7224146785" required>
                                @error('telefono')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" placeholder="" required>
                                 @error('telefono')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            
                            <div class="col-md-8 mb-3">
                                <label for="direccion" class="form-label">Direccion</label>
                                <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" placeholder="Valle de Bravo" required>
                                 @error('direccion')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                                <label for="id_parentesco" class="form-label">Parentesco</label>
                                <input type="text" class="form-control @error('id_parentesco') is-invalid @enderror" id="id_parentezco" name="id_parentezco" placeholder="Eje.1" required>
                                 @error('id_parentesco')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="id_ninio" class="form-label">Id_ninio</label>
                                <input type="text" class="form-control @error('id_ninio') is-invalid @enderror" id="id_ninio" name="id_ninio" placeholder="Valle de Bravo" required>
                                 @error('id_ninio')
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