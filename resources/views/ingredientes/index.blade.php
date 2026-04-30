@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card card-bienestar animate-fade-in">
                <div class="card-header-bienestar text-center">
                    <h4 class="mb-0">Los Ingredientes del Bienestar</h4>
                </div>

                <div class="card-body p-4">

                    <div class="d-flex justify-content-end mb-3">
                        <a class="btn btn-bienestar btn-sm" href="{{ route('ingredientes.create') }}">
                            ➕ Agregar Ingrediente
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle text-center">
                            <thead style="background: linear-gradient(135deg, #8B0000, #6B1D2C); color: white;">
                                <tr>
                                    <th>No.</th>
                                    <th>Ingrediente</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($ingredientes as $ingrediente)
                                <tr>
                                    <td class="fw-bold">{{ $loop->iteration }}</td>
                                    <td>
                                        <span class="badge" style="background-color: #128c7e; color: white; padding: 8px 15px;">
                                            🥗 {{ $ingrediente->nombre }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('ingredientes.edit', $ingrediente->id_ingrediente) }}"
                                               class="btn btn-sm" 
                                               style="background-color: #FFC107; color: #333; border-radius: 20px;">
                                                ✏️ Editar
                                            </a>
                                            <form action="{{ route('ingredientes.destroy', $ingrediente->id_ingrediente) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('¿Eliminar ingrediente {{ $ingrediente->nombre }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm" 
                                                        style="background-color: #8B0000; color: white; border-radius: 20px;">
                                                    🗑️ Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4">
                                            <div class="alert alert-info mb-0">
                                                No hay ingredientes registrados.
                                                <a href="{{ route('ingredientes.create') }}" class="alert-link">Agregar el primero</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection