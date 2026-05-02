<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Guarderías del Bienestar" />
    <title>Guarderías del Bienestar</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
      /* Solo colores básicos del Bienestar */
      .bg-bienestar {
        background-color: #8B0000 !important; /* Guinda */
      }
      
      .navbar-brand {
        font-weight: bold;
      }
      
      .nav-link:hover {
        color: #FFC107 !important; /* Dorado */
        transform: translateY(-2px);
        transition: all 0.2s;
      }
      
      .btn-bienestar {
        background-color: #8B0000;
        color: white;
        border-radius: 25px;
      }
      
      .btn-bienestar:hover {
        background-color: #6B1D2C;
        color: #FFC107;
      }
      
      footer {
        background-color: #8B0000;
        color: white;
        margin-top: 50px;
      }
      
      footer a {
        color: #FFC107;
      }
      
      .card:hover {
        transform: translateY(-3px);
        transition: all 0.3s;
      }
    </style>
  </head>
  <body>
    
    {{-- NAVBAR BOOTSTRAP 5 --}}
    <nav class="navbar navbar-expand-md navbar-dark bg-bienestar mb-4 shadow">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">
          🧡 Guarderías del Bienestar
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ms-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link {{ request()->is('personas*') ? 'active' : '' }}" href="{{url('personas')}}">Personas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('ninios*') ? 'active' : '' }}" href="{{url('ninios')}}">Niños</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('centros*') ? 'active' : '' }}" href="{{url('centros')}}">Centros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('familiares*') ? 'active' : '' }}" href="{{url('familiares')}}">Familiares</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('parentescos*') ? 'active' : '' }}" href="{{url('parentescos')}}">Parentescos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('menus*') ? 'active' : '' }}" href="{{url('menus')}}">Menús</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('platos*') ? 'active' : '' }}" href="{{url('platos')}}">Platos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('ingredientes*') ? 'active' : '' }}" href="{{url('ingredientes')}}">Ingredientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('abonos*') ? 'active' : '' }}" href="{{ route('abonos.index') }}">Abonos</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    {{-- CONTENIDO --}}
    <main class="container py-3">
      @yield("content")
    </main>

    {{-- FOOTER --}}
    <footer class="text-center py-4 mt-5">
      <div class="container">
        <p class="mb-1">✊ Guarderías del Bienestar - Programa de Apoyo Infantil ✊</p>
        <small>© 2025 - Con el poder del Pueblo</small>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>