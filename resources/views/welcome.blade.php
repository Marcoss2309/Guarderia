@extends("layouts.template")

@section("content")
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card-bienestar animate-fade-in">
                
                {{-- Header guinda --}}
                <div class="card-header-bienestar">
                    <div class="mb-3">
                        <span class="display-1">🧡</span>
                    </div>
                    <h1 class="display-4 fw-bold mb-0">Guardería del Bienestar</h1>
                    <p class="lead mt-3 mb-0 fw-bold">✊ Programa de Apoyo y Desarrollo Infantil ✊</p>
                </div>
                
                {{-- Cuerpo --}}
                <div class="card-body p-5 text-center">
                    
                    {{-- Slogan principal --}}
                    <div class="mb-5">
                        <h2 class="fw-bold" style="color: var(--bienestar-guinda);">
                            "Sembrando amor, cosechando futuro"
                        </h2>
                        <p class="fs-5 text-muted mt-3">
                            Un espacio seguro donde tus hijas e hijos<br>
                            crecen, aprenden y reciben alimentación caliente y nutritiva.
                        </p>
                    </div>
                    
                    {{-- Línea decorativa --}}
                    <div class="d-flex justify-content-center gap-2 mb-5">
                        <span style="width: 50px; height: 3px; background: var(--bienestar-green);"></span>
                        <span style="width: 30px; height: 3px; background: var(--bienestar-guinda);"></span>
                        <span style="width: 50px; height: 3px; background: var(--bienestar-green);"></span>
                    </div>
                    
                    {{-- Mensaje final --}}
                    <div>
                        <p class="fs-5" style="color: var(--bienestar-green);">
                            <i class="bi bi-heart-fill"></i>
                            Por una infancia con bienestar y esperanza
                            <i class="bi bi-heart-fill"></i>
                        </p>
                        <p class="mt-4 small" style="color: var(--bienestar-guinda);">
                            ✊ ¡Con el poder del Pueblo! ✊
                        </p>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card-bienestar {
        border: none;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
    }
    
    .card-header-bienestar {
        background: linear-gradient(135deg, #8B0000 0%, #6B1D2C 100%);
        color: white;
        padding: 50px 20px;
        text-align: center;
    }
    
    .card-body {
        background: linear-gradient(135deg, #FFF9F0 0%, #FFFFFF 100%);
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fade-in {
        animation: fadeIn 0.8s ease-out;
    }
</style>
@endsection