<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fondation Halya - Agir ensemble pour un avenir durable')</title>
    <meta name="description" content="Fondation engagée dans le soutien aux orphelins, l'éducation des jeunes et l'autonomisation économique des femmes afin de bâtir un avenir meilleur pour les communautés.">

    <meta name="keywords" content="fondation, association, ONG, humanitaire, soutien aux orphelins, éducation des jeunes, autonomisation économique de la femme, aide sociale, développement communautaire, Cameroun, solidarité">

    <meta name="author" content="{{ config('app.name') }}">
    <meta name="robots" content="index, follow">
    <meta name="language" content="fr">
    <meta name="revisit-after" content="7 days">

    <!-- Canonical -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Theme -->
    <meta name="theme-color" content="#1B4D3E">

    <!-- Open Graph (Facebook, WhatsApp, LinkedIn) -->
    <meta property="og:type" content="website">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description" content="Découvrez notre fondation et nos actions en faveur des orphelins, de l'éducation des jeunes et de l'autonomisation économique des femmes.">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:image:alt" content="{{ config('app.name') }} - Logo officiel">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ config('app.name') }}">
    <meta name="twitter:description" content="Découvrez notre fondation et nos actions en faveur des orphelins, de l'éducation des jeunes et de l'autonomisation économique des femmes.">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo.png') }}">

    <!-- Optional -->
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800&family=Montserrat:wght@300;400;500;600&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #1B4D3E;
            --secondary: #D4AF37;
            --light: #F5F0E8;
            --dark: #2C2C2C;
        }
        body {
            font-family: 'Lato', sans-serif;
            color: var(--dark);
            background-color: var(--light);
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            color: var(--primary);
        }
        .navbar {
            background-color: var(--primary) !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: var(--secondary) !important;
            font-size: 1.5rem;
            line-height: 1.2;
            display: flex;
            align-items: center;
            gap:10px;
        }
        .navbar-brand .brand-tagline {
            display: flex;
            flex-direction: column;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.6rem;
            font-weight: 500;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: rgba(212,175,55,0.85);
            margin-top: -4px;
        }
        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            transition: all 0.3s;
            font-size: 0.95rem;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--secondary) !important;
        }
        .btn-primary-custom {
            background-color: var(--secondary);
            color: var(--primary);
            border: none;
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 5px;
            transition: all 0.3s;
            font-family: 'Montserrat', sans-serif;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-size: 0.85rem;
        }
        .btn-primary-custom:hover {
            background-color: #b8962e;
            color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(212,175,55,0.3);
        }
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }
        .section-title h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }
        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--secondary);
        }
        footer {
            background-color: var(--primary);
            color: rgba(255,255,255,0.8);
            padding: 3rem 0 1rem;
        }
        footer h5 {
            color: var(--secondary);
            font-family: 'Playfair Display', serif;
        }
        footer a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: color 0.3s;
        }
        footer a:hover {
            color: var(--secondary);
        }
        .footer-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            color: var(--secondary);
            font-size: 1.4rem;
        }
        .footer-tagline {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.7rem;
            font-weight: 500;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            color: rgba(212,175,55,0.75);
            margin-top: 4px;
        }
        .card-custom {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: all 0.3s;
            overflow: hidden;
        }
        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .hero-slider {
            height: 600px;
            position: relative;
            overflow: hidden;
        }
        .hero-slider .carousel-item {
            height: 600px;
        }
        .hero-slider .carousel-item img {
            height: 600px;
            object-fit: cover;
        }
        .hero-slider .carousel-caption {
            background: rgba(27, 77, 62, 0.75);
            padding: 2rem;
            border-radius: 10px;
            bottom: 35%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo.png') }}" height="75" alt="">
               <span>
                 Fondation Halya
                <span class="brand-tagline">Rise & Care</span>
               </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('programs.*') ? 'active' : '' }}" href="{{ route('programs.index') }}">Programmes</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}" href="{{ route('news.index') }}">Actualités</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">À Propos</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('partners') ? 'active' : '' }}" href="{{ route('partners') }}">Partenaires</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main style="padding-top: 80px;">
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                 <img src="{{ asset('assets/images/logo.png') }}" height="100" alt="">
                <div class="footer-brand mb-1">{{ $settings['site_name'] ?? 'Fondation Halya' }}</div>
                <div class="footer-tagline">Rise & Care</div>
                <p class="mt-3"><em>{{ $settings['footer_motto'] ?? 'Élever les femmes, Éduquer, inspirer les générations, transformer les communautés.' }}</em></p>
                <p class="mt-3">{{ $settings['footer_description'] ?? 'Agir ensemble pour un avenir durable. Ensemble, nous construisons un monde meilleur pour les générations futures.' }}</p>
                <div class="mt-3">
                    <a href="{{ $settings['facebook_url'] ?? '#' }}" class="me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $settings['twitter_url'] ?? '#' }}" class="me-3"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $settings['instagram_url'] ?? '#' }}" class="me-3"><i class="fab fa-instagram"></i></a>
                    <a href="{{ $settings['linkedin_url'] ?? '#' }}" class="me-3"><i class="fab fa-linkedin-in"></i></a>
                </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Liens Rapides</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('home') }}"><i class="fas fa-chevron-right me-2"></i>Accueil</a></li>
                        <li class="mb-2"><a href="{{ route('programs.index') }}"><i class="fas fa-chevron-right me-2"></i>Programmes</a></li>
                        <li class="mb-2"><a href="{{ route('news.index') }}"><i class="fas fa-chevron-right me-2"></i>Actualités</a></li>
                        <li class="mb-2"><a href="{{ route('contact') }}"><i class="fas fa-chevron-right me-2"></i>Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Contact</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i>{{ $settings['site_address'] ?? '123 Avenue de l\'Innovation, Paris' }}</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i>{{ $settings['site_phone'] ?? '+33 1 23 45 67 89' }}</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i>{{ $settings['site_email'] ?? 'info@halya.org' }}</li>
                    </ul>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.1);">
            <div class="text-center">
                <p class="mb-0">&copy; {{ date('Y') }} Fondation Halya. Tous droits réservés.</p>
                <p class="mb-0 mt-2"><a href="https://ghostroar.com" target="_blank" style="color: rgba(255,255,255,0.7); text-decoration: none;">Développé par Ghostroar Digital</a></p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
