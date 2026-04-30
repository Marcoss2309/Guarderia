@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card card-bienestar animate-fade-in">
                <div class="card-header-bienestar text-center" style="background: linear-gradient(135deg, #FFC107, #e6a800);">
                    <h4 class="mb-0">✏️ Editar Menú</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('menus.update', $menu->id_menu) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold" style="color: #8B0000;">🍽️ Plato</label>
                                <select class="form-control @error('id_plato') is-invalid @enderror" name="id_plato" required>
                                    <option value="">Seleccione un plato...</option>
                                    @foreach($platos as $plato)
                                        <option value="{{ $plato->id_plato }}" 
                                            {{ old('id_plato', $menu->id_plato) == $plato->id_plato ? 'selected' : '' }}>
                                            🍽️ {{ $plato->nombre }} - ${{ number_format($plato->precio, 2) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_plato')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold" style="color: #8B0000;">🥗 Ingrediente</label>
                                <select class="form-control @error('id_ingrediente') is-invalid @enderror" name="id_ingrediente" required>
                                    <option value="">Seleccione un ingrediente...</option>
                                    @foreach($ingredientes as $ingrediente)
                                        <option value="{{ $ingrediente->id_ingrediente }}" 
                                            {{ old('id_ingrediente', $menu->id_ingrediente) == $ingrediente->id_ingrediente ? 'selected' : '' }}>
                                            🥗 {{ $ingrediente->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_ingrediente')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('menus.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-bienestar px-4" style="background: linear-gradient(135deg, #FFC107, #e6a800); color: #333;">
                                💾 Actualizar Menú
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection