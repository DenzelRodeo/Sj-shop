@extends('layouts.website-layout')

@section('content')
    <style>
        body {
            background-color: #f4f7f6;
        }

        .card-vendor {
            border: none;
            border-radius: 1.2rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            background-color: #ffffff;
        }

        .vendor-header {
            background: #1a237e;
            /* Bleu Business Profond */
            color: white;
            border-radius: 1.2rem 1.2rem 0 0;
            padding: 2rem;
        }

        .btn-vendor {
            background-color: #1a237e;
            color: white;
            border: none;
            padding: 0.8rem;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .btn-vendor:hover {
            background-color: #0d1440;
            color: white;
            transform: translateY(-2px);
        }

        .input-group-text {
            background-color: #fff;
            border-right: none;
        }

        .form-control {
            border-left: none;
            height: 45px;
        }

        .form-control:focus {
            border-color: #ced4da;
            box-shadow: none;
        }
    </style>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card card-vendor">

                    <div class="vendor-header text-center">
                        <div class="mb-3">
                            <ion-icon name="briefcase-outline" style="font-size: 50px;"></ion-icon>
                        </div>
                        <h4 class="fw-bold mb-0">Espace Vendeur</h4>
                        <p class="small opacity-75 mb-0">Gérez votre boutique SJ ONLINE</p>
                    </div>

                    <div class="card-body p-4 p-lg-5">

                        @if (Session::get('error'))
                            <div class="alert alert-danger border-0 small py-2">{{ session('error') }}</div>
                        @endif
                        @if (Session::get('success'))
                            <div class="alert alert-success border-0 small py-2">{{ session('success') }}</div>
                        @endif

                        <form method="post" action="{{ route('vendors.handleLogin') }}">
                            @csrf

                            <div class="mb-4">
                                <label class="form-label small fw-bold">Email Professionnel</label>
                                <div class="input-group">
                                    <span class="input-group-text text-muted"><ion-icon
                                            name="mail-outline"></ion-icon></span>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="vendeur@boutique.com" value="{{ old('email') }}" required>
                                </div>
                                @error('email')
                                    <div class="text-danger x-small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label small fw-bold">Mot de passe</label>
                                <div class="input-group">
                                    <span class="input-group-text text-muted"><ion-icon
                                            name="lock-closed-outline"></ion-icon></span>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" placeholder="••••••••"
                                        required>
                                </div>
                                @error('password')
                                    <div class="text-danger x-small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-vendor w-100 shadow-sm mb-4">
                                Accéder au Tableau de Bord
                            </button>

                            <div class="text-center">
                                <p class="small text-muted mb-2">Vous n'avez pas encore de boutique ?</p>
                                <a href="{{ route('vendors.handleRegister') }}"
                                    class="text-primary fw-bold text-decoration-none">
                                    <ion-icon name="add-circle-outline" class="align-middle me-1"></ion-icon>Ouvrir une
                                    boutique
                                </a>
                            </div>

                            <div class="text-center mt-5 pt-4 border-top">
                                <p class="x-small text-muted mb-3">Besoin d'assistance technique ?</p>
                                <div class="d-flex justify-content-center gap-3">
                                    <a href="#" class="text-success fs-3"><ion-icon
                                            name="logo-whatsapp"></ion-icon></a>
                                    <a href="#" class="text-primary fs-3"><ion-icon
                                            name="logo-facebook"></ion-icon></a>
                                    <a href="#" class="text-dark fs-3"><ion-icon name="mail-outline"></ion-icon></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
