<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Acceuil Boutique - Dark Market</title>
    <link rel="stylesheet" href="css/styles.css">

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/ionicons@7.1.0/dist/css/ionicons.min.css">
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    @include('layouts.includes.header');
    <!-- Header-->


    @yield('content')




    <!-- Footer-->
    @include('layouts.includes.footer')
    <!-- Bootstrap core JS-->
    <script src="https://cdn.cinetpay.com/seamless/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons.ems.js"></script>
    <script monodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="cartModalLabel text-dark">🛒 Votre Panier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    @if (session('cart') && count(session('cart')) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Produit</th>
                                        <th>Prix</th>
                                        <th>Qté</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $totalGeneral = 0; @endphp
                                    @foreach (session('cart') as $id => $details)
                                        @php $totalGeneral += $details['price'] * $details['quantity']; @endphp
                                        <tr>
                                            <td class="fw-bold">{{ $details['name'] }}</td>
                                            <td>{{ number_format($details['price'], 0, ',', ' ') }} Fcfa</td>
                                            <td><span class="badge bg-secondary">{{ $details['quantity'] }}</span></td>
                                            <td class="text-end">
                                                {{ number_format($details['price'] * $details['quantity'], 0, ',', ' ') }}
                                                Fcfa</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-end mt-3">
                            <h5>Total : <span class="text-primary">{{ number_format($totalGeneral, 0, ',', ' ') }}
                                    Fcfa</span></h5>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <ion-icon name="basket-outline" style="font-size: 50px; color: #ccc;"></ion-icon>
                            <p class="mt-2">Votre panier est encore vide.</p>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Continuer mes
                        achats</button>
                    @if (session('cart'))
                        <a href="{{ route('checkout') }}" class="btn btn-success px-4 shadow-sm">
                            Commander maintenant
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>
