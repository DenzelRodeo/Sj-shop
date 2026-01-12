<footer class="py-5 bg-dark text-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <h5 class="text-uppercase fw-bold mb-4 text-primary">Sj-Shop.com</h5>
                <p class="text-muted small">
                    Votre boutique de référence pour les meilleures caméras et accessoires technologiques au Cameroun.
                    Qualité et rapidité de livraison garanties.
                </p>
                <div class="d-flex gap-3 fs-4">
                    <a href="#" class="text-white hover-primary"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="#" class="text-white hover-primary"><ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="#" class="text-white hover-primary"><ion-icon name="logo-whatsapp"></ion-icon></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <h6 class="text-uppercase fw-bold mb-4">Navigation</h6>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a href="/" class="text-muted text-decoration-none hover-link">Accueil</a>
                    </li>
                    <li class="mb-2"><a href="/boutique"
                            class="text-muted text-decoration-none hover-link">Boutique</a></li>
                    <li class="mb-2"><a href="{{ route('contact') }}"
                            class="text-muted text-decoration-none hover-link">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h6 class="text-uppercase fw-bold mb-4">Assistance</h6>
                <ul class="list-unstyled mb-0">
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none hover-link">Conditions
                            d'utilisation</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none hover-link">Politique de
                            confidentialité</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none hover-link">FAQ</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 text-md-end">
                <h6 class="text-uppercase fw-bold mb-4">Paiements acceptés</h6>
                <div class="d-flex justify-content-md-end gap-2">
                    <img src="{{ asset('Storage/cloud_files/articles/mtn.png') }}"
                        class="img-fluid rounded border border-secondary p-1 bg-white"
                        style="width: 60px; height: 40px; object-fit: contain;" alt="MTN">
                    <img src="{{ asset('Storage/cloud_files/articles/orange.png') }}"
                        class="img-fluid rounded border border-secondary p-1 bg-white"
                        style="width: 60px; height: 40px; object-fit: contain;" alt="Orange">
                </div>
            </div>
        </div>

        <hr class="my-5 border-secondary">

        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <p class="small text-muted mb-0">
                    &copy; 2023-2026 <strong>Sj-Shop.com</strong>. Tous droits réservés.
                </p>
            </div>
        </div>
    </div>
</footer>
<style>
    footer {
        background-color: #1a1d20 !important;
        /* Un noir plus profond */
    }

    .hover-primary:hover {
        color: #0d6efd !important;
        /* Couleur bleue Bootstrap au survol */
        transition: 0.3s;
    }

    .hover-link:hover {
        color: white !important;
        padding-left: 5px;
        transition: 0.3s;
    }

    .text-primary {
        color: #0d6efd !important;
    }

    /* Style des logos de paiement */
    footer img {
        filter: grayscale(20%);
        transition: 0.3s;
    }

    footer img:hover {
        filter: grayscale(0%);
        transform: scale(1.1);
    }
</style>
