@extends('layouts.website-layout')

@section('content')
    <style>
        /* Design cohérent avec la page de login */
        body {
            background-color: #f8f9fa;
        }

        .card-register {
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .btn-register {
            background: linear-gradient(to right, #0e1c36, #2a3b5c);
            border: none;
            padding: 0.8rem;
            font-weight: bold;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(14, 28, 54, 0.3);
            color: white;
        }

        .input-group-text {
            background-color: #f8f9fa;
            border-right: none;
            color: #6c757d;
        }

        .form-control {
            border-left: none;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            background-color: #fff;
            box-shadow: none;
            border-color: #0e1c36;
        }
    </style>

    <div class="container mt-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card card-register p-4">

                    <div class="text-center mb-4">
                        <img src="https://thumbs.dreamstime.com/z/ic%C3%B4ne-solide-noire-pour-le-magasin-et-la-vente-au-d%C3%A9tail-logo-symbole-divers-147167501.jpg"
                            class="rounded-circle mb-3 shadow-sm img-thumbnail" width="100" alt="SJ Logo">
                        <h3 class="fw-bold text-dark" style="font-family: 'Inter', sans-serif;">Inscription</h3>
                        <p class="text-muted small">Rejoignez la communauté SJ ONLINE SHOP</p>
                    </div>

                    <form method="POST" action="{{ route('handleUserRegister') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">Nom & Prénom</label>
                            <div class="input-group">
                                <span class="input-group-text"><ion-icon name="person-outline"></ion-icon></span>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Ex: Jean Dupont"
                                    value="{{ old('name') }}" required>
                            </div>
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold text-muted">Adresse Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><ion-icon name="mail-outline"></ion-icon></span>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="jean.dupont@gmail.com" value="{{ old('email') }}" required>
                            </div>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold text-muted">Mot de passe</label>
                            <div class="input-group">
                                <span class="input-group-text"><ion-icon name="lock-closed-outline"></ion-icon></span>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="••••••••"
                                    required>
                            </div>
                            <div class="form-text x-small text-muted">Minimum 8 caractères conseillés.</div>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-register w-100 mb-4 shadow-sm">
                            Créer mon compte
                        </button>

                        <p class="text-center small text-muted">
                            Déjà inscrit ?
                            <a href="{{ route('user.login') }}" class="fw-bold text-primary text-decoration-none">Se
                                connecter</a>
                        </p>

                        <div class="text-center border-top pt-4">
                            <div class="d-flex justify-content-center gap-4">
                                <a href="#" class="text-success fs-2"><ion-icon name="logo-whatsapp"></ion-icon></a>
                                <a href="#" class="text-primary fs-2"><ion-icon name="logo-facebook"></ion-icon></a>
                                <a href="#" class="text-info fs-2"><ion-icon name="logo-twitter"></ion-icon></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
