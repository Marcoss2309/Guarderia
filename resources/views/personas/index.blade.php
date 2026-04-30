@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-11">

            <div class="card card-bienestar animate-fade-in">
                <div class="card-header-bienestar text-center">
                    <h4 class="mb-0"> Personas del Bienestar</h4>
                </div>

                <div class="card-body p-4">

                    <div class="d-flex justify-content-end mb-3">
                        <a class="btn btn-bienestar btn-sm" href="{{ route('personas.create') }}">
                            ➕ Agregar Persona
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-striped text-center align-middle">
                            <thead style="background: linear-gradient(135deg, #8B0000, #6B1D2C); color: white;">
                                <tr>
                                    <th>No.</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Fecha Nac.</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($personas as $persona)
                                    <tr>
                                        <td class="fw-bold">{{ $loop->iteration }}</td>
                                        <td>{{ $persona->nombre }}</td>
                                        <td>{{ $persona->apellido_paterno }}</td>
                                        <td>{{ $persona->apellido_materno }}</td>
                                        <td>
                                            <span class="badge" style="background-color: #128c7e; color: white;">
                                                {{ \Carbon\Carbon::parse($persona->fecha_nacimiento)->format('d/m/Y') }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="{{ route('personas.edit', $persona->id_persona) }}"
                                                   class="btn btn-sm" 
                                                   style="background-color: #FFC107; color: #333; border-radius: 20px;">
                                                    ✏️ Editar
                                                </a>
                                                <form action="{{ route('personas.destroy', $persona->id_persona) }}"
                                                      method="post"
                                                      class="d-inline"
                                                      onsubmit="return confirm('¿Eliminar a {{ $persona->nombre }}?')">
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
                                        <td colspan="6" class="text-center py-4">
                                            <div class="alert alert-info mb-0">
                                                No hay personas registradas.
                                                <a href="{{ route('personas.create') }}" class="alert-link">Agregar una</a>
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