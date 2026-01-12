<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dark Market - Vendeur</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('css/vendor-style.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<style>
    /* Sidebar Style Premium */
    .sb-sidenav-dark .nav-link {
        color: rgba(255, 255, 255, 0.75) !important;
        font-size: 0.92rem;
        margin: 4px 12px;
        border-radius: 10px;
        transition: all 0.25s ease;
    }

    .sb-sidenav-dark .nav-link:hover {
        color: #fff !important;
        background-color: rgba(255, 255, 255, 0.08);
        transform: translateX(3px);
    }

    .sb-sidenav-dark .nav-link.active {
        color: #fff !important;
        background-color: #0d6efd !important;
        box-shadow: 0 4px 15px rgba(13, 110, 253, 0.25);
    }

    .sb-sidenav-dark .sb-sidenav-menu-heading {
        color: #adb5bd !important;
        font-weight: 700;
    }

    /* Style des sous-menus */
    .sb-sidenav-menu-nested.nav {
        border-left: 1px solid rgba(255, 255, 255, 0.1) !important;
    }

    .sb-sidenav-menu-nested .nav-link {
        margin: 2px 0 2px 10px !important;
        font-size: 0.85rem;
    }

    /* Animation douce pour le collapse */
    .collapse {
        transition: all 0.3s ease-in-out;
    }

    /* Style du Footer SJ SHOP */
    .payment-icon {
        height: 30px;
        /* Taille standardisée professionnelle */
        width: auto;
        filter: grayscale(100%);
        /* Gris par défaut pour l'élégance */
        opacity: 0.5;
        transition: all 0.3s ease-in-out;
    }

    .payment-icon:hover {
        filter: grayscale(0%);
        /* Reprend ses couleurs au survol */
        opacity: 1;
        transform: scale(1.1);
    }

    footer.bg-white {
        background-color: #ffffff !important;
    }

    .border-top {
        border-top: 1px solid rgba(0, 0, 0, 0.08) !important;
    }
</style>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark"
        style="background-color: #0e1c36; border-bottom: 1px solid rgba(255,255,255,0.1);">
        <a class="navbar-brand ps-3 fw-bold" href="{{ route('vendors.dashboard') }}">
            <span style="color: #fff;">SJ</span> <span class="text-primary">SHOP</span>
            <small style="font-size: 10px; display: block; line-height: 0; color: #adb5bd;">ESPACE VENDEUR</small>
        </a>

        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-white" id="sidebarToggle"
            href="#!">
            <i class="fas fa-bars"></i>
        </button>

        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group input-group-sm">
                <input class="form-control border-0 shadow-none" type="text" placeholder="Rechercher une commande..."
                    aria-label="Search" style="background: rgba(255,255,255,0.1); color: white;" />
                <button class="btn btn-primary border-0" id="btnNavbarSearch" type="button"
                    style="background: #2a3b5c;">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 align-items-center">
                <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center text-white" id="navbarDropdown"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-none d-lg-inline me-2 small fw-bold">
                        {{ auth('vendor')->user()->name ?? 'Mon Compte' }}
                    </div>
                    <img src="{{ Auth::guard('vendor')->user()->avatar ? asset('storage/' . Auth::guard('vendor')->user()->avatar) : asset('assets/images/default-avatar.png') }}"
                        alt="Profil" class="rounded-circle"
                        style="width: 35px; height: 35px; object-fit: cover; border: 2px solid #fff;">
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3" aria-labelledby="navbarDropdown">
                    <li class="p-3 text-center border-bottom">
                        <h6 class="mb-0 fw-bold">{{ auth('vendor')->user()->name }}</h6>
                        <small class="text-muted">{{ auth('vendor')->user()->email }}</small>
                    </li>
                    <li><a class="dropdown-item py-2" href="{{ route('profile.index') }}"><i
                                class="fas fa-user-cog me-2 text-muted"></i>Mon
                            Profil</a></li>
                    <li><a class="dropdown-item py-2" href="#!"><i class="fas fa-store me-2 text-muted"></i>Ma
                            Boutique</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a class="dropdown-item py-2 text-danger fw-bold" href="{{ route('vendors.logout') }}">
                            <i class="fas fa-sign-out-alt me-2"></i>Quitter ma boutique
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark shadow-lg" id="sidenavAccordion"
                style="background-color: #0e1c36;">
                <div class="sb-sidenav-menu">
                    <div class="nav mt-3">
                        <div class="sb-sidenav-menu-heading text-uppercase small opacity-50 px-3 mb-2"
                            style="font-size: 0.7rem; letter-spacing: 1.5px;">Performance</div>

                        <a class="nav-link py-3 {{ Route::is('vendors.dashboard') ? 'active bg-primary bg-opacity-10' : '' }}"
                            href="{{ route('vendors.dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-line text-primary"></i></div>
                            <span class="fw-medium">Tableau de bord</span>
                        </a>

                        <div class="sb-sidenav-menu-heading text-uppercase small opacity-50 px-3 mt-4 mb-2"
                            style="font-size: 0.7rem; letter-spacing: 1.5px;">Ma Boutique</div>

                        <a class="nav-link collapsed py-3" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseArticles" aria-expanded="false" aria-controls="collapseArticles">
                            <div class="sb-nav-link-icon"><i class="fas fa-boxes text-info"></i></div>
                            <span class="fw-medium">Mes Articles</span>
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down text-white-50"></i></div>
                        </a>
                        <div class="collapse {{ Request::is('articles*') ? 'show' : '' }}" id="collapseArticles"
                            aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav
                                class="sb-sidenav-menu-nested nav ps-4 border-start border-primary border-opacity-25 ms-3 mt-1">
                                <a class="nav-link small py-2" href="{{ route('articles.index') }}">
                                    <i class="fas fa-th-list me-2 opacity-50"></i>Catalogue
                                </a>
                                <a class="nav-link small py-2" href="{{ route('articles.create') }}">
                                    <i class="fas fa-plus-circle me-2 opacity-50"></i>Ajouter un produit
                                </a>
                            </nav>
                        </div>

                        <div class="sb-sidenav-menu-heading text-uppercase small opacity-50 px-3 mt-4 mb-2"
                            style="font-size: 0.7rem; letter-spacing: 1.5px;">Portefeuille</div>

                        <a class="nav-link py-3 {{ Route::is('payment.Info') ? 'active' : '' }}"
                            href="{{ route('payment.Info') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-wallet text-success"></i></div>
                            <span class="fw-medium">Revenus & Paiements</span>
                        </a>

                        <a class="nav-link py-3 {{ Route::is('payment.configuration') ? 'active' : '' }}"
                            href="{{ route('payment.configuration') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-shield text-warning"></i></div>
                            <span class="fw-medium">Config. Retrait</span>
                        </a>
                    </div>
                </div>

                <div class="sb-sidenav-footer p-3"
                    style="background-color: rgba(0,0,0,0.2); border-top: 1px solid rgba(255,255,255,0.05);">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center fw-bold text-white shadow-sm"
                                style="width: 38px; height: 38px; font-size: 0.9rem; border: 2px solid rgba(255,255,255,0.1);">
                                {{ strtoupper(substr(auth('vendor')->user()->name ?? 'V', 0, 1)) }}
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3 overflow-hidden">
                            <div class="small text-white-50" style="font-size: 0.7rem;">Session Vendeur</div>
                            <div class="text-truncate fw-bold text-white small" style="text-transform: capitalize;">
                                {{ auth('vendor')->user()->name ?? 'Invité' }}
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small"
                style="font-weight:bolder;font-family:'Times New Roman', Times, serif;text-transform:uppercase"">
                Connecté en tant que :</div>
            <p
                style="text-transform:capitalize;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">
                {{ auth('vendor')->check() ? auth('vendor')->user()->name : 'invité' }}</p>
        </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
        <footer class="py-4 bg-white mt-auto border-top shadow-sm">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">
                        &copy; {{ date('Y') }} <span class="fw-bold text-dark">SJ SHOP ONLINE</span>.
                        <span class="d-none d-sm-inline">Console Vendeur v1.0</span>
                    </div>

                    <div class="d-flex align-items-center gap-4">
                        <span class="text-muted d-none d-md-inline small">Solutions de paiement intégrées :</span>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('Storage/cloud_files/articles/mtn.png') }}" class="payment-icon me-3"
                                alt="MTN Mobile Money">
                            <img src="{{ asset('Storage/cloud_files/articles/orange.png') }}" class="payment-icon"
                                alt="Orange Money">
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
</body>

</html>
