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
                background-color: var(--light);
                min-height: 100vh;
            }
            h1, h2, h3 {
                font-family: 'Playfair Display', serif;
                color: var(--primary);
            }
            .auth-card {
                border-radius: 15px;
                box-shadow: 0 10px 40px rgba(0,0,0,0.1);
                border: none;
            }
            .btn-primary-custom {
                background-color: var(--primary);
                color: white;
                border: none;
                padding: 10px 25px;
                border-radius: 5px;
                font-weight: 600;
            }
            .btn-primary-custom:hover {
                background-color: #143d31;
                color: white;
            }
            .auth-header {
                background: linear-gradient(135deg, var(--primary), #2d6a4f);
                color: white;
                padding: 2rem;
                border-radius: 15px 15px 0 0;
                text-align: center;
            }
            .auth-header i {
                font-size: 3rem;
                color: var(--secondary);
            }
        </style>
    </head>
    <body>
        <div class="min-h-screen d-flex align-items-center justify-content-center py-5 px-4">
            <div class="w-100" style="max-width: 450px;">
                <div class="text-center mb-4">
                    
                </div>
                <!-- <div class="card auth-card"> -->
                    <!-- <div class="auth-header">
                        <i class="fas fa-leaf mb-2 d-block"></i>
                        <h4 class="mb-0">{{ config('app.name') }}</h4>
                    </div> -->
                    <div class="card-body p-4">
                        @hasSection('content')
                            @yield('content')
                        @else
                            {{ $slot }}
                        @endif
                    </div>
                <!-- </div> -->
                <!-- <div class="text-center mt-3">
                    <a href="{{ route('home') }}" class="text-decoration-none" style="color: var(--primary);">
                        <i class="fas fa-arrow-left me-1"></i>Retour au site
                    </a>
                </div> -->
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
