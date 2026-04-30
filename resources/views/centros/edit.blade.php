@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card card-bienestar animate-fade-in">
                <div class="card-header-bienestar text-center" style="background: linear-gradient(135deg, #FFC107, #e6a800);">
                    <h4 class="mb-0">✏️ Editar Guardería: {{ $centro->nombre }}</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('centros.update', $centro->id_centro) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #8B0000;">🏷️ Nombre</label>
                            <input type="text" 
                                   class="form-control @error('nombre') is-invalid @enderror"
                                   name="nombre" 
                                   value="{{ old('nombre', $centro->nombre) }}"
                                   required>
                            @error('nombre')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold" style="color: #8B0000;">💰 Costo</label>
                                <input type="number" 
                                       step="0.01"
                                       class="form-control @error('costo') is-invalid @enderror"
                                       name="costo" 
                                       value="{{ old('costo', $centro->costo) }}"
                                       required>
                                @error('costo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-8 mb-3">
                                <label class="form-label fw-bold" style="color: #8B0000;">📍 Dirección</label>
                                <input type="text" 
                                       class="form-control @error('direccion') is-invalid @enderror"
                                       name="direccion" 
                                       value="{{ old('direccion', $centro->direccion) }}"
                                       required>
                                @error('direccion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('centros.index') }}" class="btn btn-outline-secondary">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-bienestar px-4" style="background: linear-gradient(135deg, #FFC107, #e6a800); color: #333;">
                                💾 Actualizar Guardería
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection