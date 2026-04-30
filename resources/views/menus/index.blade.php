@extends("layouts.template")

@section("content")

    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card card-bienestar animate-fade-in">
                <div class="card-header-bienestar text-center">
                    <h4 class="mb-0">Los Menus del Bienestar</h4>
                </div>

                <div class="card-body p-4">

                    <div class="d-flex justify-content-end mb-3">
                        <a class="btn btn-bienestar btn-sm" href="{{ route('menus.create') }}">
                            ➕ Agregar Menú
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
                                    <th>Plato</th>
                                    <th>Ingrediente</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                            @forelse($menus as $menu)
                                <tr>
                                    <td class="fw-bold">{{ $loop->iteration }}</td>
                                    
                                    <td>
                                        @if($menu->plato)
                                            <span class="badge" style="background-color: #128c7e; color: white; padding: 8px 15px;">
                                                🍽️ {{ $menu->plato->nombre }} - ${{ number_format($menu->plato->precio, 2) }}
                                            </span>
                                        @else
                                            <span class="badge" style="background-color: #8B0000; color: white;">No asignado</span>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        @if($menu->ingrediente)
                                            <span class="badge" style="background-color: #FFC107; color: #333; padding: 8px 15px;">
                                                🥗 {{ $menu->ingrediente->nombre }}
                                            </span>
                                        @else
                                            <span class="badge" style="background-color: #8B0000; color: white;">No asignado</span>
                                        @endif
                                    </td>
                                    
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('menus.edit', $menu->id_menu) }}"
                                               class="btn btn-sm" 
                                               style="background-color: #FFC107; color: #333; border-radius: 20px;">
                                                ✏️ Editar
                                            </a>
                                            
                                            <form action="{{ route('menus.destroy', $menu->id_menu) }}" 
                                                  method="POST" 
                                                  class="d-inline"
                                                  onsubmit="return confirm('¿Eliminar menú de {{ $menu->plato->nombre ?? 'este plato' }}?')">
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
                                <table>
                                    <td colspan="4" class="text-center py-4">
                                        <div class="alert alert-info mb-0">
                                            No hay menús registrados. 
                                            <a href="{{ route('menus.create') }}" class="alert-link">Agregar el primero</a>
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