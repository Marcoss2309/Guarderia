@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card card-bienestar animate-fade-in">
                <div class="card-header-bienestar text-center" style="background: linear-gradient(135deg, #FFC107, #e6a800);">
                    <h4 class="mb-0">✏️ Editar Familiar</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('familiares.update', $familiar->id_familiar) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold" style="color: #8B0000;">👤 Persona (Familiar)</label>
                                <select class="form-control @error('id_persona') is-invalid @enderror" name="id_persona" required>
                                    <option value="">Seleccione una persona...</option>
                                    @foreach($personas as $persona)
                                        <option value="{{ $persona->id_persona }}" {{ old('id_persona', $familiar->id_persona) == $persona->id_persona ? 'selected' : '' }}>
                                            {{ $persona->nombre }} {{ $persona->apellido_paterno }} {{ $persona->apellido_materno }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_persona')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold" style="color: #8B0000;">📞 Teléfono</label>
                                <input type="text" class="form-control @error('telefono') is-invalid @enderror" 
                                       name="telefono" placeholder="Ej. 7224146785" value="{{ old('telefono', $familiar->telefono) }}" required>
                                @error('telefono')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold" style="color: #8B0000;">🆔 DNI</label>
                                <input type="text" class="form-control @error('dni') is-invalid @enderror" 
                                       name="dni" placeholder="Ej. 12345678A" value="{{ old('dni', $familiar->dni) }}" required>
                                @error('dni')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold" style="color: #8B0000;">👥 Parentesco</label>
                                <select class="form-control @error('id_parentesco') is-invalid @enderror" name="id_parentesco" required>
                                    <option value="">Seleccione un parentesco...</option>
                                    @foreach($parentescos as $parentesco)
                                        <option value="{{ $parentesco->id_parentesco }}" {{ old('id_parentesco', $familiar->id_parentesco) == $parentesco->id_parentesco ? 'selected' : '' }}>
                                            {{ $parentesco->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_parentesco')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label class="form-label fw-bold" style="color: #8B0000;">📍 Dirección</label>
                                <input type="text" class="form-control @error('direccion') is-invalid @enderror" 
                                       name="direccion" placeholder="Calle, número, colonia, ciudad" value="{{ old('direccion', $familiar->direccion) }}" required>
                                @error('direccion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold" style="color: #8B0000;">🧸 Niño asociado</label>
                                <select class="form-control @error('id_ninio') is-invalid @enderror" name="id_ninio" required>
                                    <option value="">Seleccione un niño...</option>
                                    @foreach($ninios as $ninio)
                                        <option value="{{ $ninio->id_ninio }}" {{ old('id_ninio', $familiar->id_ninio) == $ninio->id_ninio ? 'selected' : '' }}>
                                            🧸 {{ $ninio->persona->nombre ?? 'Niño' }} {{ $ninio->persona->apellido_paterno ?? '' }}
                                            (Mat: {{ $ninio->matricula }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_ninio')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('familiares.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-bienestar px-4" style="background: linear-gradient(135deg, #FFC107, #e6a800); color: #333;">
                                💾 Actualizar Familiar
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection