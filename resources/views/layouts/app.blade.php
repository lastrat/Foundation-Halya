<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
        <style>
            :root {
                --primary: #1B4D3E;
                --secondary: #D4AF37;
                --light: #F5F0E8;
                --dark: #2C2C2C;
            }
            body {
                font-family: 'Lato', sans-serif;
                background-color: #f8f9fa;
            }
            .navbar {
                background-color: var(--primary) !important;
            }
            .navbar-brand {
                font-family: 'Playfair Display', serif;
                color: var(--secondary) !important;
                font-weight: 700;
            }
            .nav-link {
                color: rgba(255,255,255,0.9) !important;
            }
            .nav-link:hover, .nav-link.active {
                color: var(--secondary) !important;
            }
            .btn-primary-custom {
                background-color: var(--primary);
                color: white;
                border: none;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <i class="fas fa-leaf me-2"></i>Fondation Halya
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Accueil</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">
            <div class="container">
                @if (isset($header))
                    <header class="mb-4">
                        <div class="bg-white shadow-sm p-4 rounded">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                @hasSection('content')
                    @yield('content')
                @else
                    {{ $slot }}
                @endif
            </div>
        </main>

        <footer class="bg-dark text-white py-4 mt-5">
            <div class="container text-center">
                <p class="mb-0">&copy; {{ date('Y') }} Fondation Halya. Tous droits réservés.</p>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
