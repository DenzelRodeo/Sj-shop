<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('user.visite') }}"
            style="letter-spacing: -1px; font-size: 24px;">
            <span class="text-dark">SJ</span> ONLINE SHOP
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link active fw-medium" href="{{ route('user.visite') }}">
                        <ion-icon name="home-outline" class="align-middle me-1"></ion-icon> Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-medium" href="{{ route('contact') }}">
                        <ion-icon name="mail-unread-outline" class="align-middle me-1"></ion-icon> Contact
                    </a>
                </li>
            </ul>

            <div class="d-flex align-items-center">

                @auth
                    <button type="button" class="btn btn-outline-primary border-0 position-relative me-3"
                        data-bs-toggle="modal" data-bs-target="#cartModal">
                        <ion-icon name="cart-outline" class="fs-4 align-middle"></ion-icon>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ session('cart') ? count(session('cart')) : 0 }}
                        </span>
                    </button>

                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center p-0" href="#" role="button"
                            data-bs-toggle="dropdown">
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center me-2 shadow-sm"
                                style="width: 38px; height: 38px; overflow: hidden; border: 2px solid #fff;">

                                @if (auth()->user()->avatar)
                                    {{-- Si l'utilisateur a une photo --}}
                                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="mdo"
                                        width="100%" height="100%" class="rounded-circle" style="object-fit: cover;">
                                @else
                                    {{-- Sinon, on affiche l'initiale de son nom --}}
                                    <span class="fw-bold" style="font-size: 14px; text-transform: uppercase;">
                                        {{ substr(auth()->user()->name, 0, 1) }}
                                    </span>
                                @endif

                            </div>
                            <span class="d-none d-md-inline fw-semibold small text-dark">
                                {{ auth()->user()->name }}
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3 animate-up">
                            <li><a class="dropdown-item py-2" href="{{ route('account') }}"><i
                                        class="fas fa-user-circle me-2 text-muted"></i> Mon compte</a></li>

                            <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item py-2 text-danger" href="{{ route('user.logout') }}"><i
                                        class="fas fa-sign-out-alt me-2"></i> Déconnexion</a></li>
                        </ul>
                    </div>
                @endauth

                @guest
                    <div class="dropdown">
                        <button class="btn btn-primary px-4 fw-bold shadow-sm dropdown-toggle" type="button"
                            data-bs-toggle="dropdown">
                            Connexion
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3">
                            <li><a class="dropdown-item py-2" href="{{ route('user.login') }}">Me connecter</a></li>
                            <li><a class="dropdown-item py-2" href="{{ route('user.register') }}">Créer un compte</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item py-2 fw-bold text-primary"
                                    href="{{ route('vendors.handleLogin') }}">Espace Vendeur</a></li>
                        </ul>
                    </div>
                @endguest

            </div>
        </div>
    </div>
</nav>
<style>
    /* Navbar Fixe avec effet de flou */
    .navbar {
        backdrop-filter: blur(10px);
        background-color: rgba(255, 255, 255, 0.95) !important;
        transition: all 0.3s ease;
    }

    /* Effet sur les liens */
    .nav-link {
        color: #444 !important;
        font-size: 0.95rem;
        padding: 0.5rem 1rem !important;
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: #0d6efd !important;
    }

    /* Animation des menus déroulants */
    .animate-up {
        animation: slideUp 0.3s ease-out;
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Logo Pro */
    .navbar-brand {
        font-family: 'Inter', sans-serif !important;
        /* Une police plus moderne que Georgia */
    }
</style>
