@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card card-bienestar animate-fade-in">
                <div class="card-header-bienestar text-center">
                    <h4 class="mb-0">Abonos del Bienestar</h4>
                </div>

                <div class="card-body p-4">

                    <div class="d-flex justify-content-end mb-3">
                        <a class="btn btn-bienestar btn-sm" href="{{ route('abonos.create') }}">
                            ➕ Registrar Abono
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
                                    <th>Niño</th>
                                    <th>Cantidad</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                            @forelse($abonos as $abono)
                                <tr>
                                    <td class="fw-bold">{{ $loop->iteration }}</td>
                                    <td>
                                        @if($abono->ninio && $abono->ninio->persona)
                                            <span class="badge" style="background-color: #128c7e; color: white; padding: 8px 15px;">
                                                🧸 {{ $abono->ninio->persona->nombre }} 
                                                {{ $abono->ninio->persona->apellido_paterno }}
                                            </span>
                                        @else
                                            <span class="badge" style="background-color: #8B0000; color: white;">No asignado</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge" style="background-color: #FFC107; color: #333; padding: 8px 15px;">
                                            💲 {{ number_format($abono->cantidad, 2) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge" style="background-color: #6c757d; color: white;">
                                            📅 {{ \Carbon\Carbon::parse($abono->fecha)->format('d/m/Y') }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('abonos.edit', $abono->id_abono) }}"
                                               class="btn btn-sm" 
                                               style="background-color: #FFC107; color: #333; border-radius: 20px;">
                                                ✏️ Editar
                                            </a>
                                            <form action="{{ route('abonos.destroy', $abono->id_abono) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('¿Eliminar este abono?')">
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
                                    <td colspan="5" class="text-center py-4">
                                        <div class="alert alert-info mb-0">
                                            No hay abonos registrados.
                                            <a href="{{ route('abonos.create') }}" class="alert-link">Registrar el primero</a>
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