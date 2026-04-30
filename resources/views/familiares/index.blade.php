@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card card-bienestar animate-fade-in">
                <div class="card-header-bienestar text-center">
                    <h4 class="mb-0">Los Familiares del Bienestar</h4>
                </div>

                <div class="card-body p-4">

                    <div class="d-flex justify-content-end mb-3">
                        <a class="btn btn-bienestar btn-sm" href="{{ route('familiares.create') }}">
                            ➕ Agregar Familiar
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
                                    <th>Familiar</th>
                                    <th>Teléfono</th>
                                    <th>DNI</th>
                                    <th>Dirección</th>
                                    <th>Parentesco</th>
                                    <th>Niño asociado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                            @forelse($familiares as $familiar)
                                <tr>
                                    <td class="fw-bold">{{ $loop->iteration }}</td>
                                    
                                    <td>
                                        @if($familiar->persona)
                                            <span class="badge" style="background-color: #128c7e; color: white;">
                                                👤 {{ $familiar->persona->nombre }} 
                                                {{ $familiar->persona->apellido_paterno }} 
                                                {{ $familiar->persona->apellido_materno }}
                                            </span>
                                        @else
                                            <span class="badge" style="background-color: #8B0000; color: white;">No asignada</span>
                                        @endif
                                    </td>
                                    
                                    <td>{{ $familiar->telefono }}</td>
                                    <td>{{ $familiar->dni }}</td>
                                    <td>{{ $familiar->direccion }}</td>
                                    
                                    <td>
                                        @if($familiar->parentesco)
                                            <span class="badge" style="background-color: #FFC107; color: #333;">
                                                👥 {{ $familiar->parentesco->nombre }}
                                            </span>
                                        @else
                                            <span class="badge" style="background-color: #8B0000; color: white;">No asignado</span>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        @if($familiar->ninio && $familiar->ninio->persona)
                                            <span class="badge" style="background-color: #6c757d; color: white;">
                                                🧸 {{ $familiar->ninio->persona->nombre }} 
                                                {{ $familiar->ninio->persona->apellido_paterno }}
                                                <br>
                                                <small>(Mat: {{ $familiar->ninio->matricula }})</small>
                                            </span>
                                        @else
                                            <span class="badge" style="background-color: #8B0000; color: white;">No asignado</span>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('familiares.edit', $familiar->id_familiar) }}"
                                               class="btn btn-sm" 
                                               style="background-color: #FFC107; color: #333; border-radius: 20px;">
                                                ✏️ Editar
                                            </a>
                                            <form action="{{ route('familiares.destroy', $familiar->id_familiar) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('¿Eliminar a {{ $familiar->persona->nombre ?? 'este familiar' }}?')">
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
                                    <td colspan="8" class="text-center py-4">
                                        <div class="alert alert-info mb-0">
                                            No hay familiares registrados. 
                                            <a href="{{ route('familiares.create') }}" class="alert-link">Agregar el primero</a>
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