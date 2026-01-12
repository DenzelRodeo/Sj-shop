@extends('layouts.website-layout')

@section('content')
    <style>
        body {
            background-color: #f0f2f5;
        }

        .card-vendor-signup {
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header-gradient {
            background: linear-gradient(135deg, #0e1c36 0%, #2a3b5c 100%);
            padding: 3rem 2rem;
            color: white;
        }

        .input-group-custom {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 0.5rem 1rem;
            border: 1px solid #dee2e6;
            transition: all 0.3s;
        }

        .input-group-custom:focus-within {
            border-color: #0e1c36;
            background-color: #fff;
            box-shadow: 0 0 0 0.25rem rgba(14, 28, 54, 0.1);
        }

        .input-group-custom input {
            border: none;
            background: transparent;
            box-shadow: none !important;
        }

        .btn-vendor-submit {
            background-color: #0e1c36;
            color: white;
            padding: 1rem;
            border-radius: 10px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
        }

        .btn-vendor-submit:hover {
            background-color: #1a2e54;
            color: white;
            transform: translateY(-2px);
        }
    </style>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="card card-vendor-signup">
                    <div class="row g-0">
                        <div
                            class="col-md-5 header-gradient d-none d-md-flex flex-column justify-content-center text-center">
                            <div class="mb-4">
                                <ion-icon name="rocket-outline" style="font-size: 80px;"></ion-icon>
                            </div>
                            <h2 class="fw-bold">Prêt à vendre ?</h2>
                            <p class="px-3 opacity-75">Rejoignez des centaines de marchands et commencez à générer des
                                revenus dès aujourd'hui sur SJ ONLINE SHOP.</p>
                            <div class="mt-4">
                                <img src="https://thumbs.dreamstime.com/z/ic%C3%B4ne-solide-noire-pour-le-magasin-et-la-vente-au-d%C3%A9tail-logo-symbole-divers-147167501.jpg"
                                    class="rounded-circle shadow-lg img-thumbnail" width="120">
                            </div>
                        </div>

                        <div class="col-md-7 bg-white p-4 p-lg-5">
                            <div class="mb-4">
                                <h3 class="fw-bold text-dark">Devenir Vendeur</h3>
                                <p class="text-muted small">Créez votre compte marchand en quelques secondes.</p>
                            </div>

                            <form method="POST" action="{{ route('vendors.handleRegister') }}">
                                @csrf

                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-muted text-uppercase">Nom de la Boutique /
                                        Vendeur</label>
                                    <div class="input-group-custom d-flex align-items-center">
                                        <ion-icon name="storefront-outline" class="me-2 fs-5 text-muted"></ion-icon>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Ex: Boutique de Mode SJ" value="{{ old('name') }}" required>
                                    </div>
                                    @error('name')
                                        <div class="text-danger x-small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-muted text-uppercase">Email
                                        Professionnel</label>
                                    <div class="input-group-custom d-flex align-items-center">
                                        <ion-icon name="mail-outline" class="me-2 fs-5 text-muted"></ion-icon>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="contact@maboutique.com" value="{{ old('email') }}" required>
                                    </div>
                                    @error('email')
                                        <div class="text-danger x-small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="form-label small fw-bold text-muted text-uppercase">Mot de passe</label>
                                    <div class="input-group-custom d-flex align-items-center">
                                        <ion-icon name="lock-closed-outline" class="me-2 fs-5 text-muted"></ion-icon>
                                        <input type="password" name="password" class="form-control" placeholder="••••••••"
                                            required>
                                    </div>
                                    @error('password')
                                        <div class="text-danger x-small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-vendor-submit w-100 mb-4 shadow">
                                    Créer ma Boutique maintenant
                                </button>

                                <p class="text-center small">
                                    Déjà un compte marchand ? <a href="{{ route('vendors.handleLogin') }}"
                                        class="fw-bold text-primary">Se connecter</a>
                                </p>

                                <div class="d-flex justify-content-center gap-3 mt-4">
                                    <a href="#" class="text-success fs-2"><ion-icon
                                            name="logo-whatsapp"></ion-icon></a>
                                    <a href="#" class="text-primary fs-2"><ion-icon
                                            name="logo-facebook"></ion-icon></a>
                                    <a href="#" class="text-info fs-2"><ion-icon name="logo-twitter"></ion-icon></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
