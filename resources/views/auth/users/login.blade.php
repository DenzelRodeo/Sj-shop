@extends('layouts.website-layout')

@section('content')
    <style>
        /* Design spécifique pour cette page */
        body {
            background-color: #f8f9fa;
        }

        .card-login {
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .btn-login {
            background: linear-gradient(to right, #0d6efd, #0b5ed7);
            border: none;
            padding: 0.8rem;
            font-weight: bold;
            transition: transform 0.2s;
        }

        .btn-login:hover {
            transform: translateY(-2px);
        }

        .input-group-text {
            background-color: transparent;
            border-right: none;
        }

        .form-control {
            border-left: none;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #dee2e6;
        }
    </style>

    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card card-login p-4">

                    <div class="text-center mb-4">
                        <img src="https://thumbs.dreamstime.com/z/ic%C3%B4ne-solide-noire-pour-le-magasin-et-la-vente-au-d%C3%A9tail-logo-symbole-divers-147167501.jpg"
                            class="rounded-circle mb-3 shadow-sm" width="100" alt="Logo SJ">
                        <h3 class="fw-bold text-dark">Connexion</h3>
                        <p class="text-muted small">Heureux de vous revoir chez SJ ONLINE SHOP !</p>
                    </div>

                    @if (session('error'))
                        <div class="alert alert-danger border-0 small py-2">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('handleUserLogin') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label small fw-bold text-muted">Adresse Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><ion-icon name="mail-outline"></ion-icon></span>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="exemple@gmail.com" value="{{ old('email') }}" required>
                            </div>
                            @error('email')
                                <div class="text-danger x-small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">Mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text"><ion-icon name="lock-closed-outline"></ion-icon></span>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="••••••••"
                                    required>
                            </div>
                            @error('password')
                                <div class="text-danger x-small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember">
                                <label class="form-check-label small" for="remember">Se souvenir</label>
                            </div>
                            <a href="#" class="small text-decoration-none">Oublié ?</a>
                        </div>

                        <button type="submit" class="btn btn-primary btn-login w-100 mb-4 shadow-sm text-white">
                            Se connecter
                        </button>

                        <p class="text-center small text-muted">
                            Pas encore membre ?
                            <a href="{{ route('handleUserRegister') }}"
                                class="fw-bold text-primary text-decoration-none">Créer un compte</a>
                        </p>

                        <div class="text-center border-top pt-4">
                            <p class="x-small text-muted mb-3">Ou nous suivre sur</p>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="#" class="text-success fs-3"><ion-icon name="logo-whatsapp"></ion-icon></a>
                                <a href="#" class="text-primary fs-3"><ion-icon name="logo-facebook"></ion-icon></a>
                                <a href="#" class="text-info fs-3"><ion-icon name="logo-twitter"></ion-icon></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
