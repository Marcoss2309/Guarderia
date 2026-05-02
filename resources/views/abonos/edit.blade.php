@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card card-bienestar animate-fade-in">
                <div class="card-header-bienestar text-center" style="background: linear-gradient(135deg, #FFC107, #e6a800);">
                    <h4 class="mb-0">✏️ Editar Abono</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('abonos.update', $abono->id_abono) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #8B0000;">🧸 Niño</label>
                            <select class="form-control @error('id_ninio') is-invalid @enderror" name="id_ninio" required>
                                <option value="">Seleccione un niño...</option>
                                @foreach($ninios as $ninio)
                                    <option value="{{ $ninio->id_ninio }}" 
                                        {{ old('id_ninio', $abono->id_ninio) == $ninio->id_ninio ? 'selected' : '' }}>
                                        🧸 {{ $ninio->persona->nombre ?? 'Niño' }} 
                                        {{ $ninio->persona->apellido_paterno ?? '' }}
                                        (Mat: {{ $ninio->matricula }})
                                    </option>
                                @endforeach
                            </select>
                            @error('id_ninio')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #8B0000;">💰 Cantidad</label>
                            <div class="input-group">
                                <span class="input-group-text" style="background-color: #128c7e; color: white;">$</span>
                                <input type="number" 
                                       step="0.01" 
                                       class="form-control @error('cantidad') is-invalid @enderror" 
                                       name="cantidad" 
                                       value="{{ old('cantidad', $abono->cantidad) }}" 
                                       required>
                            </div>
                            @error('cantidad')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold" style="color: #8B0000;">📅 Fecha</label>
                            <input type="date" 
                                   class="form-control @error('fecha') is-invalid @enderror" 
                                   name="fecha" 
                                   value="{{ old('fecha', $abono->fecha) }}" 
                                   required>
                            @error('fecha')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('abonos.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-bienestar px-4" style="background: linear-gradient(135deg, #FFC107, #e6a800); color: #333;">
                                💾 Actualizar Abono
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection