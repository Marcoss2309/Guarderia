@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card card-bienestar animate-fade-in">
                <div class="card-header-bienestar text-center" style="background: linear-gradient(135deg, #FFC107, #e6a800);">
                    <h4 class="mb-0">✏️ Editar Niño</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('ninios.update', $ninio->id_ninio) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #8B0000;">📝 Matrícula</label>
                            <input type="text" class="form-control @error('matricula') is-invalid @enderror" 
                                   name="matricula" value="{{ old('matricula', $ninio->matricula) }}" required>
                            @error('matricula')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold" style="color: #8B0000;">👶 Persona (Niño/a)</label>
                                <select class="form-control @error('id_persona') is-invalid @enderror" name="id_persona" required>
                                    <option value="">Seleccione una persona...</option>
                                    @foreach($personas as $persona)
                                        <option value="{{ $persona->id_persona }}" {{ old('id_persona', $ninio->id_persona) == $persona->id_persona ? 'selected' : '' }}>
                                            {{ $persona->nombre }} {{ $persona->apellido_paterno }} {{ $persona->apellido_materno }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_persona')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold" style="color: #8B0000;">🏫 Centro Educativo</label>
                                <select class="form-control @error('id_centro') is-invalid @enderror" name="id_centro" required>
                                    <option value="">Seleccione un centro...</option>
                                    @foreach($centros as $centro)
                                        <option value="{{ $centro->id_centro }}" {{ old('id_centro', $ninio->id_centro) == $centro->id_centro ? 'selected' : '' }}>
                                            🏫 {{ $centro->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_centro')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold" style="color: #8B0000;">📅 Fecha de Ingreso</label>
                            <input type="date" class="form-control @error('fecha_ingreso') is-invalid @enderror" 
                                   name="fecha_ingreso" value="{{ old('fecha_ingreso', $ninio->fecha_ingreso) }}" required>
                            @error('fecha_ingreso')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('ninios.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-bienestar px-4" style="background: linear-gradient(135deg, #FFC107, #e6a800); color: #333;">
                                💾 Actualizar Niño
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection