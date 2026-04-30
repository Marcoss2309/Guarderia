@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card card-bienestar animate-fade-in">
                <div class="card-header-bienestar text-center" style="background: linear-gradient(135deg, #FFC107, #e6a800);">
                    <h4 class="mb-0">✏️ Editar Parentesco: {{ $parentesco->nombre }}</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('parentescos.update', $parentesco->id_parentesco) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #8B0000;">👥 Nombre del Parentesco</label>
                            <input type="text" 
                                   class="form-control @error('nombre') is-invalid @enderror" 
                                   name="nombre" 
                                   value="{{ old('nombre', $parentesco->nombre) }}"
                                   required>
                            @error('nombre')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('parentescos.index') }}" class="btn btn-outline-secondary">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-bienestar px-4" style="background: linear-gradient(135deg, #FFC107, #e6a800); color: #333;">
                                💾 Actualizar Parentesco
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>

@endsection