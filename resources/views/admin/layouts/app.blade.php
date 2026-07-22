<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administration - Fondation Halya')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #1B4D3E;
            --secondary: #D4AF37;
            --light: #F5F0E8;
            --dark: #2C2C2C;
            --sidebar-width: 260px;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background-color: var(--primary);
            color: white;
            padding-top: 1rem;
            overflow-y: auto;
            z-index: 1000;
        }
        .sidebar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--secondary);
            text-align: center;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        .sidebar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .sidebar-nav li {
            border-left: 3px solid transparent;
        }
        .sidebar-nav li.active {
            background-color: rgba(255,255,255,0.1);
            border-left-color: var(--secondary);
        }
        .sidebar-nav a {
            display: block;
            padding: 0.9rem 1.5rem;
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            transition: all 0.3s;
        }
        .sidebar-nav a:hover, .sidebar-nav a.active {
            color: var(--secondary);
            background-color: rgba(255,255,255,0.05);
        }
        .sidebar-nav a i {
            width: 25px;
            margin-right: 10px;
        }
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2rem;
            min-height: 100vh;
        }
        .top-bar {
            background: white;
            padding: 1rem 2rem;
            margin: -2rem -2rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card-stat {
            border: none;
            border-radius: 10px;
            padding: 1.5rem;
            color: white;
            transition: transform 0.3s;
        }
        .card-stat:hover {
            transform: translateY(-5px);
        }
        .card-stat .icon {
            font-size: 2rem;
            opacity: 0.8;
        }
        .table-custom {
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }
        .table-custom thead {
            background-color: var(--primary);
            color: white;
        }
        .badge-custom {
            padding: 0.4rem 0.8rem;
            border-radius: 5px;
            font-size: 0.85rem;
        }
        .badge-success { background-color: #28a745; color: white; }
        .badge-warning { background-color: #ffc107; color: #333; }
        .badge-danger { background-color: #dc3545; color: white; }
        .btn-custom {
            padding: 0.5rem 1rem;
            border-radius: 5px;
            border: none;
            font-weight: 500;
        }
        .btn-primary-custom {
            background-color: var(--primary);
            color: white;
        }
        .btn-secondary-custom {
            background-color: var(--secondary);
            color: var(--primary);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
             <img src="{{ asset('assets/images/logo.png') }}" height="80" alt=""> 
        </div>
        <ul class="sidebar-nav">
            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i>Tableau de Bord</a>
            </li>
            <li class="{{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                <a href="{{ route('admin.sliders.index') }}"><i class="fas fa-images"></i>Sliders</a>
            </li>
            <li class="{{ request()->routeIs('admin.programs.*') ? 'active' : '' }}">
                <a href="{{ route('admin.programs.index') }}"><i class="fas fa-project-diagram"></i>Programmes</a>
            </li>
            <li class="{{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <a href="{{ route('admin.news.index') }}"><i class="fas fa-newspaper"></i>Actualités</a>
            </li>
            <li class="{{ request()->routeIs('admin.partners.*') ? 'active' : '' }}">
                <a href="{{ route('admin.partners.index') }}"><i class="fas fa-handshake"></i>Partenaires</a>
            </li>
            <li class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                <a href="{{ route('admin.testimonials.index') }}"><i class="fas fa-quote-left"></i>Témoignages</a>
            </li>
            <li class="{{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                <a href="{{ route('admin.settings.index') }}"><i class="fas fa-cog"></i>Paramètres</a>
            </li>
            <li class="{{ request()->routeIs('admin.visits.*') ? 'active' : '' }}">
                <a href="{{ route('admin.visits.index') }}"><i class="fas fa-chart-bar"></i>Statistiques</a>
            </li>
            <li class="mt-4">
                <a href="{{ route('home') }}" target="_blank"><i class="fas fa-external-link-alt"></i>Voir le Site</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link text-white p-0 ms-0" style="padding: 0.9rem 1.5rem !important; width: 100%; text-align: left; background: none; border: none;">
                        <i class="fas fa-sign-out-alt"></i>Déconnexion
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="top-bar">
            <h4 class="mb-0">@yield('page_title', 'Tableau de Bord')</h4>
            <div class="d-flex align-items-center">
                <span class="me-3">{{ Auth::user()->name }}</span>
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=D4AF37&color=1B4D3E" class="rounded-circle" width="40" height="40" alt="Avatar">
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
