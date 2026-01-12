@extends('layouts.website-layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                    <div class="row g-0">
                        @if (session('success'))
                            <div class="alert alert-success shadow-sm border-0">
                                <ion-icon name="checkmark-circle-outline" class="me-2"></ion-icon>
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger shadow-sm border-0">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-md-5 bg-primary p-5 text-white">
                            <h2 class="fw-bold mb-4">Contactez-nous</h2>
                            <p class="mb-5 opacity-75">Une question ? Un partenariat ? Notre équipe vous répond sous 24h.
                            </p>

                            <div class="d-flex mb-4">
                                <div class="fs-3 me-3"><ion-icon name="location-outline"></ion-icon></div>
                                <div>
                                    <h6 class="mb-0">Localisation</h6>
                                    <p class="small mb-0">Akwa, Douala - Cameroun</p>
                                </div>
                            </div>

                            <div class="d-flex mb-4">
                                <div class="fs-3 me-3"><ion-icon name="call-outline"></ion-icon></div>
                                <div>
                                    <h6 class="mb-0">Téléphone / WhatsApp</h6>
                                    <p class="small mb-0">+237 699 17 46 37</p>
                                </div>
                            </div>

                            <div class="d-flex mb-4">
                                <div class="fs-3 me-3"><ion-icon name="mail-outline"></ion-icon></div>
                                <div>
                                    <h6 class="mb-0">Email</h6>
                                    <p class="small mb-0">contact@sj-shop.com</p>
                                </div>
                            </div>

                            <div class="mt-5 pt-5 d-flex gap-3">
                                <a href="#" class="text-white fs-4"><ion-icon name="logo-facebook"></ion-icon></a>
                                <a href="#" class="text-white fs-4"><ion-icon name="logo-instagram"></ion-icon></a>
                                <a href="#" class="text-white fs-4"><ion-icon name="logo-twitter"></ion-icon></a>
                            </div>
                        </div>

                        <div class="col-md-7 p-5 bg-white">
                            <form action="#" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Prénom & Nom</label>
                                        <input type="text" class="form-control form-control-lg bg-light border-0"
                                            name="name" placeholder="Votre nom" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Email</label>
                                        <input type="email"
                                            class="form-control form-control-lg bg-light border-0"name="email"
                                            placeholder="votre@email.com" required>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <label class="form-label small fw-bold">Objet du message</label>
                                        <select class="form-select form-control-lg bg-light border-0" name="subject">
                                            <option selected>Question sur une commande</option>
                                            <option>SAV / Retour produit</option>
                                            <option>Devenir vendeur partenaire</option>
                                            <option>Autre</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <label class="form-label small fw-bold">Votre Message</label>
                                        <textarea class="form-control bg-light border-0" rows="5"
                                            placeholder="Comment pouvons-nous vous aider ?"name="message" required></textarea>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <button type="submit" class="btn btn-primary btn-lg w-100 shadow-sm"
                                            style="border-radius: 10px;">
                                            Envoyer le message <ion-icon name="send-outline" class="ms-2"></ion-icon>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-0 mt-5">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15919.141258607135!2d9.6896265!3d4.0441475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1061128be2e11e07%3A0xefef48c0819777!2sAkwa%2C%20Douala!5e0!3m2!1sfr!2scm!4v1700000000000!5m2!1sfr!2scm"
            width="100%" height="400" style="border:0; filter: grayscale(100%) invert(90%);" allowfullscreen=""
            loading="lazy"></iframe>
    </div>
@endsection
<style>
    .bg-primary {
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%) !important;
    }

    .form-control:focus,
    .form-select:focus {
        background-color: #fff !important;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
        border: 1px solid #0d6efd !important;
    }

    label.form-label {
        color: #495057;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    /* Animation au survol du bouton */
    .btn-primary:hover {
        transform: translateY(-2px);
        transition: all 0.3s;
    }
</style>
