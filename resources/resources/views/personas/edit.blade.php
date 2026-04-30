@extends("layouts.template")

@section("content")
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="card-header bg-danger py-3">
                    <h4 class="mb-0 text-white fw-bold text-center">Editar Registro</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('personas.update', $persona->id) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">Nombre</label>
                            <input type="text" name="nombre" class="form-control rounded-pill" value="{{ $persona->nombre }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">Apellido Paterno</label>
                            <input type="text" name="apellido_paterno" class="form-control rounded-pill" value="{{ $persona->apellido_paterno }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold text-secondary">Apellido Materno</label>
                            <input type="text" name="apellido_materno" class="form-control rounded-pill" value="{{ $persona->apellido_materno }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold text-secondary">Fecha de Nacimiento</label>
                            <input type="date" name="fecha_nacimiento" class="form-control rounded-pill" value="{{ $persona->fecha_nacimiento }}" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-danger rounded-pill fw-bold">Actualizar Datos</button>
                            <a href="{{ route('personas.index') }}" class="btn btn-light rounded-pill text-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection