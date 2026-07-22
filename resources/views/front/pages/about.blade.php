@extends('front.layouts.app')

@section('title', 'À Propos')
@section('content')
<style>
    .topic{
        color:#fff !important;
    }
    .objective-card {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeUp 0.8s ease forwards;
    }
    .objective-card:nth-child(1) { animation-delay: 0.1s; }
    .objective-card:nth-child(2) { animation-delay: 0.2s; }
    .objective-card:nth-child(3) { animation-delay: 0.3s; }
    .objective-card:nth-child(4) { animation-delay: 0.4s; }
    .objective-card:nth-child(5) { animation-delay: 0.5s; }
    .objective-card:nth-child(6) { animation-delay: 0.6s; }
    .objective-card:nth-child(7) { animation-delay: 0.7s; }
    @keyframes fadeUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .objective-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.12);
        transition: all 0.3s;
    }
</style>
<section class="py-5" style="margin-top:50px">
    <div class="container">
        <div class="section-title">
            <h2>À Propos de la Fondation Halya</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <img src="{{ asset('assets/images/halya2.jpg') }}" alt="Fondation Halya" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6">
                <h3 class="mb-3">Agir ensemble pour un avenir durable</h3>
                <p class="lead">La Fondation Halya est une organisation philanthropique engagée dans la promotion de l’autonomisation économique des femmes et l’encadrement éducatif des enfants vulnérables avec un accent particulier sur les orphelins.</p>
                <p>Fondée en 2025 par <strong>Mme Halimatou Toudjani Alifa</strong>, professionnelle du secteur bancaire avec plus de 20 années d’expérience, spécialisée en structuration de financement, développement commercial et accompagnement des acteurs économiques. Elle dispose d’une expertise couvrant les PME, les particuliers, le secteur public, ainsi que les Institutions, Ambassades, ONG et organisations internationales, lui conférant une vision globale des enjeux économiques et financiers.</p>
                <p>Parallèlement, elle est chef d’entreprise depuis plus de 10 ans, avec des activités dans le commerce, la distribution de produits pétroliers et la cosmétique, lui apportant une connaissance concrète des réalités du terrain entrepreneurial.</p>
                <p>La fondation ambitionne de devenir une plateforme d’impact social et économique capable de transformer durablement les communautés.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background-color: white;">
    <div class="container">
        <div class="section-title">
            <h2>Nos Valeurs</h2>
            <p class="text-muted">La fondation repose sur des valeurs essentielles qui inspirent et guident notre mission</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-5 text-center">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                            <i class="fas fa-bullseye fa-2x"></i>
                        </div>
                        <h4 class="fw-bold">Impact</h4>
                        <p class="text-muted mt-3 mb-0">Nous nous engageons à provoquer des transformations tangibles et durables, améliorant ainsi les conditions de vie des communautés que nous soutenons. Chaque initiative que nous entreprenons vise à engendrer un changement concret, mesurable et profondément bénéfique.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-5 text-center">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                            <i class="fas fa-shield-alt fa-2x"></i>
                        </div>
                        <h4 class="fw-bold">Intégrité</h4>
                        <p class="text-muted mt-3 mb-0">Notre action est guidée par la transparence et la responsabilité. Nous opérons avec une éthique irréprochable, car la confiance est la pierre angulaire de notre engagement envers les bénéficiaires, les partenaires et les donateurs.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-5 text-center">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-4" style="width: 80px; height: 80px;">
                            <i class="fas fa-hands-helping fa-2x"></i>
                        </div>
                        <h4 class="fw-bold">Empathie</h4>
                        <p class="text-muted mt-3 mb-0">L'humain est au cœur de toutes nos démarches. Nous écoutons avec attention et bienveillance, comprenons les réalités humaines et agissons avec compassion. Cette approche guide chacune de nos décisions pour répondre aux véritables besoins de ceux que nous aidons.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background-color: white;">
    <div class="container">
        <div class="section-title">
            <h2>Nos Objectifs</h2>
            <p class="text-muted">La Fondation Halya s'engage autour de missions clés pour créer un impact durable et concret.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card objective-card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-balance-scale fa-lg"></i>
                        </div>
                        <h5 class="fw-bold">Autonomisation économique de la femme</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-chart-line fa-lg"></i>
                        </div>
                        <h5 class="fw-bold">Renforcement des capacités</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-university fa-lg"></i>
                        </div>
                        <h5 class="fw-bold">Inclusion financière</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-female fa-lg"></i>
                        </div>
                        <h5 class="fw-bold">Leadership féminin et réseaux</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-hand-holding-usd fa-lg"></i>
                        </div>
                        <h5 class="fw-bold">Accès au financement et aux marchés</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-book-open fa-lg"></i>
                        </div>
                        <h5 class="fw-bold">Éducation et encadrement des enfants vulnérables</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mx-auto">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fas fa-users fa-lg"></i>
                        </div>
                        <h5 class="fw-bold">Développement communautaire</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 mission-section" style="background: linear-gradient(135deg, var(--primary) 0%, #2d6a4f 100%); color: white;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="color: var(--secondary);">Notre Mission</h2>
            <p class="lead opacity-90 mt-3" style="max-width: 800px; margin: 0 auto; font-size: 1.1rem;">
                La Fondation Halya se donne pour mission de transformer les vies et de bâtir un avenir prometteur grâce à des initiatives audacieuses et inspirantes.
            </p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(10px); border-radius: 15px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background: var(--secondary);">
                                <i class="fas fa-hand-holding-heart" style="color: var(--primary);"></i>
                            </div>
                            <h5 class="mb-0 fw-semibold topic">Autonomisation</h5>
                        </div>
                        <p class="mb-0 opacity-90">Libérer le potentiel économique des femmes en les autonomisant et en renforçant leur leadership pour une influence transformante.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(10px); border-radius: 15px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background: var(--secondary);">
                                <i class="fas fa-university" style="color: var(--primary);"></i>
                            </div>
                            <h5 class="mb-0 fw-semibold topic" >Financement</h5>
                        </div>
                        <p class="mb-0 opacity-90">Ouvrir les portes du financement et des opportunités économiques pour toutes, sans distinction ni barrière.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(10px); border-radius: 15px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background: var(--secondary);">
                                <i class="fas fa-book-reader" style="color: var(--primary);"></i>
                            </div>
                            <h5 class="mb-0 fw-semibold topic" >Éducation</h5>
                        </div>
                        <p class="mb-0 opacity-90">Soutenir l'éducation des enfants, avec une attention particulière aux orphelins, grâce à un encadrement structuré et à long terme.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(10px); border-radius: 15px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background: var(--secondary);">
                                <i class="fas fa-leaf" style="color: var(--primary);"></i>
                            </div>
                            <h5 class="mb-0 fw-semibold topic">Durabilité</h5>
                        </div>
                        <p class="mb-0 opacity-90">Favoriser un développement durable et harmonieux des communautés pour un avenir vert et prospère.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow" style="background: rgba(255,255,255,0.08); backdrop-filter: blur(10px); border-radius: 15px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background: var(--secondary);">
                                <i class="fas fa-users" style="color: var(--primary);"></i>
                            </div>
                            <h5 class="mb-0 fw-semibold topic" >Réseau de Femmes Leaders</h5>
                        </div>
                        <p class="mb-0 opacity-90">Tisser un réseau puissant de femmes leaders qui se soutiennent mutuellement pour briller ensemble et créer un impact durable.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card h-100 border-0 shadow" style="background: rgba(212,175,55,0.15); border: 2px solid var(--secondary); border-radius: 15px;">
                    <div class="card-body p-4 text-center">
                        <i class="fas fa-star fa-3x mb-3" style="color: var(--secondary);"></i>
                        <h5 class="fw-bold mb-3 topic">Rejoignez-nous !</h5>
                        <p class="mb-0 opacity-90">Rejoignez-nous dans ce voyage passionnant vers un monde plus équitable et prospère !</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
