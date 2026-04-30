@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card card-bienestar animate-fade-in">
                <div class="card-header-bienestar text-center" style="background: linear-gradient(135deg, #FFC107, #e6a800);">
                    <h4 class="mb-0">✏️ Editar a {{ $persona->nombre }}</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('personas.update', $persona->id_persona) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #8B0000;">Nombre</label>
                            <input type="text" 
                                   class="form-control @error('nombre') is-invalid @enderror" 
                                   name="nombre" 
                                   placeholder="Ej. Juan" 
                                   value="{{ old('nombre', $persona->nombre) }}" 
                                   required>
                            @error('nombre')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold" style="color: #8B0000;">Apellido Paterno</label>
                                <input type="text" 
                                       class="form-control @error('apellido_paterno') is-invalid @enderror" 
                                       name="apellido_paterno" 
                                       placeholder="Ej. Pérez" 
                                       value="{{ old('apellido_paterno', $persona->apellido_paterno) }}" 
                                       required>
                                @error('apellido_paterno')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold" style="color: #8B0000;">Apellido Materno</label>
                                <input type="text" 
                                       class="form-control @error('apellido_materno') is-invalid @enderror" 
                                       name="apellido_materno" 
                                       placeholder="Ej. García" 
                                       value="{{ old('apellido_materno', $persona->apellido_materno) }}" 
                                       required>
                                @error('apellido_materno')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold" style="color: #8B0000;">Fecha de Nacimiento</label>
                            <input type="date" 
                                   class="form-control @error('fecha_nacimiento') is-invalid @enderror" 
                                   name="fecha_nacimiento" 
                                   value="{{ old('fecha_nacimiento', $persona->fecha_nacimiento) }}" 
                                   required>
                            @error('fecha_nacimiento')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('personas.index') }}" class="btn btn-outline-secondary">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-bienestar px-4" style="background: linear-gradient(135deg, #FFC107, #e6a800); color: #333;">
                                💾 Actualizar Persona
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection