     @extends('layouts.website-layout')

     @section('content')
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

         <header class="position-relative d-flex align-items-center"
             style="background: url('https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?q=80&w=2070&auto=format&fit=crop') center/cover no-repeat; 
               min-height: 300px; 
               width: 100%; overflow: hidden;">

             <div class="position-absolute top-0 start-0 w-100 h-100"
                 style="background: linear-gradient(90deg, rgba(14, 28, 54, 0.9) 0%, rgba(14, 28, 54, 0.4) 100%); z-index: 1;">
             </div>

             <div class="container position-relative px-4" style="z-index: 2;">
                 <div class="text-center text-md-start text-white">

                     <div class="animate__animated animate__fadeInUp">
                         <h1 class="display-5 fw-bold mb-2" style="letter-spacing: -1px;">
                             Votre Marché <span class="text-primary">En Ligne</span>
                         </h1>

                         <p class="lead mb-4 text-white-50" style="font-size: 1rem; max-width: 500px;">
                             Achetez et vendez en toute confiance. <br>
                             La plateforme fiable et sécurisée.
                         </p>

                         <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-md-start">
                             <a href="#"
                                 class="btn btn-primary px-4 py-2 fw-bold rounded-pill shadow-sm">
                                 Explorer
                             </a>
                             <a href="{{ route('vendors.handleLogin') }}"
                                 class="btn btn-outline-light px-4 py-2 fw-bold rounded-pill">
                                 Vendre
                             </a>
                         </div>
                     </div>

                 </div>
             </div>
         </header>
         <section class="py-5" class="text-center">
             @if (session('success'))
                 <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>Succès !</strong> {{ session('success') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>
             @endif
             <div class="container px-4 px-lg-5 mt-5">
                 <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                     @foreach ($articles as $article)
                         <div class="col mb-5">
                             <div class="card h-100 shadow-sm border-0 product-card"
                                 style="border-radius: 15px; overflow: hidden;">

                                 <div class="position-absolute top-0 end-0 m-3">
                                     <span class="badge {{ $article->active ? 'bg-success' : 'bg-danger' }} shadow-sm">
                                         {{ $article->active ? 'Disponible' : 'Rupture' }}
                                     </span>
                                 </div>

                                 <div class="img-container" style="height: 200px; overflow: hidden;">
                                     @php $imagePath = $article->image ? asset('storage/' . $article->image->path) : 'https://ui-avatars.com/api/?background=0d6efd&color=fff&name=' . urlencode($article->name); @endphp
                                     <div style="background-image: url('{{ $imagePath }}'); background-size: cover; background-position: center; height: 100%; transition: transform 0.5s;"
                                         class="product-img"></div>
                                 </div>

                                 <div class="card-body p-4">
                                     <div class="text-center">
                                         <p class="text-muted small mb-1 text-uppercase">{{ $article->vendor_name }}</p>
                                         <h5 class="fw-bolder mb-2 text-capitalize">{{ $article->name }}</h5>

                                         <div class="d-flex justify-content-center small text-warning mb-2">
                                             @for ($i = 0; $i < 5; $i++)
                                                 <i class="bi-star-fill"></i>
                                             @endfor
                                         </div>

                                         <div class="mb-3">
                                             <span
                                                 class="text-muted text-decoration-line-through me-2 small">{{ number_format($article->price * 1.2, 0, ',', ' ') }}
                                                 F</span>
                                             <span
                                                 class="fw-bold text-success fs-5">{{ number_format($article->price, 0, ',', ' ') }}
                                                 Fcfa</span>
                                         </div>
                                     </div>

                                     <div class="d-flex justify-content-around border-top pt-3">

                                         <a href="#"
                                             onclick="event.preventDefault(); document.getElementById('add-to-cart-{{ $article->id }}').submit();"
                                             class="btn btn-link text-primary p-0">
                                             <ion-icon name="bag-add-outline" class="fs-4"></ion-icon>
                                         </a>

                                     </div>

                                     <form id="add-to-cart-{{ $article->id }}"
                                         action="{{ route('cart.add', $article->id) }}" method="POST" class="d-none">
                                         @csrf
                                     </form>
                                 </div>

                                 @auth
                                     <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                         <div class="text-center">
                                             <button class="btn btn-primary w-100 fw-bold" style="border-radius: 10px;"
                                                 onclick="checkout()">
                                                 Payer ici
                                             </button>
                                         </div>
                                     </div>
                                 @endauth
                             </div>
                         </div>
                     @endforeach
                 </div>
             </div>
             <div class="py-4 bg-white border-top border-bottom overflow-hidden">
                 <div class="container mb-3">
                     <h6 class="text-center text-uppercase fw-bold text-muted small mb-4">Ils nous font confiance</h6>
                 </div>

                 <div class="logos-track">
                     <div class="logo-item"><ion-icon name="globe-outline" class="fs-1 text-primary"></ion-icon>
                         <span>Camtel</span>
                     </div>
                     <div class="logo-item"><ion-icon name="mail-open-outline" class="fs-1 text-warning"></ion-icon>
                         <span>Campost</span>
                     </div>
                     <div class="logo-item"><ion-icon name="card-outline" class="fs-1 text-danger"></ion-icon> <span>UBA
                             Cameroon</span></div>
                     <div class="logo-item"><ion-icon name="rocket-outline" class="fs-1 text-info"></ion-icon> <span>Digital
                             Renter</span></div>
                     <div class="logo-item"><ion-icon name="briefcase-outline" class="fs-1 text-secondary"></ion-icon>
                         <span>Kiro'o Games</span>
                     </div>
                     <div class="logo-item"><ion-icon name="phone-portrait-outline" class="fs-1 text-success"></ion-icon>
                         <span>Matrix Telecom</span>
                     </div>

                     <div class="logo-item"><ion-icon name="globe-outline" class="fs-1 text-primary"></ion-icon>
                         <span>Camtel</span>
                     </div>
                     <div class="logo-item"><ion-icon name="mail-open-outline" class="fs-1 text-warning"></ion-icon>
                         <span>Campost</span>
                     </div>
                     <div class="logo-item"><ion-icon name="card-outline" class="fs-1 text-danger"></ion-icon> <span>UBA
                             Cameroon</span></div>
                     <div class="logo-item"><ion-icon name="rocket-outline" class="fs-1 text-info"></ion-icon>
                         <span>Digital
                             Renter</span>
                     </div>
                     <div class="logo-item"><ion-icon name="briefcase-outline" class="fs-1 text-secondary"></ion-icon>
                         <span>Kiro'o Games</span>
                     </div>
                     <div class="logo-item"><ion-icon name="phone-portrait-outline" class="fs-1 text-success"></ion-icon>
                         <span>Matrix Telecom</span>
                     </div>
                 </div>
             </div>
             </div>
             <style>
                 /* Container principal */
                 .logos-slider {
                     width: 100%;
                     overflow: hidden;
                     white-space: nowrap;
                     position: relative;
                     padding: 10px 0;
                 }

                 /* Le rail qui bouge */
                 .logos-track {
                     display: flex;
                     width: calc(250px * 12);
                     /* Largeur d'un item * nombre total d'items */
                     animation: scroll 30s linear infinite;
                 }

                 /* Style de chaque logo */
                 .logo-item {
                     display: flex;
                     align-items: center;
                     justify-content: center;
                     width: 250px;
                     gap: 15px;
                     color: #6c757d;
                     font-weight: bold;
                     font-size: 1.1rem;
                     transition: 0.3s;
                 }

                 .logo-item:hover {
                     color: #000;
                     transform: scale(1.05);
                 }

                 /* L'animation keyframe */
                 @keyframes scroll {
                     0% {
                         transform: translateX(0);
                     }

                     100% {
                         transform: translateX(calc(-250px * 6));
                     }

                     /* On recule de la moitié pour l'effet infini */
                 }

                 /* Pause au survol pour que le client puisse regarder */
                 .logos-slider:hover .logos-track {
                     animation-play-state: paused;
                 }
             </style>
         </section>
     @endsection
