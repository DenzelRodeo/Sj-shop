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
 <div class="card shadow-sm">
     <div class="card-body">
         <table class="table table-hover align-middle">
             <thead class="table-light">
                 <tr>
                     <th>Produit</th>
                     <th>Prix</th>
                     <th>Quantité</th>
                     <th>Total</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody id="cart-table-body">
                 @if (session('cart'))
                     @foreach (session('cart') as $id => $details)
                         <tr id="row-{{ $id }}">
                             <td class="fw-bold">{{ $details['name'] }}</td>
                             <td>{{ number_format($details['price'], 0, ',', ' ') }} Fcfa</td>
                             <td>
                                 <span class="badge bg-info text-dark">{{ $details['quantity'] }}</span>
                             </td>
                             <td>{{ number_format($details['price'] * $details['quantity'], 0, ',', ' ') }} Fcfa
                             </td>
                             <td>
                                 <button class="btn btn-sm btn-outline-danger shadow-sm">
                                     <ion-icon name="trash-outline"></ion-icon>
                                 </button>
                             </td>
                         </tr>
                     @endforeach
                 @else
                     <tr>
                         <td colspan="5" class="text-center py-4 text-muted">Votre panier est vide</td>
                     </tr>
                 @endif
             </tbody>
         </table>
     </div>
 </div>
 <script>
     document.querySelectorAll('.btn-cart').forEach(button => {
         button.addEventListener('click', function(e) {
             e.preventDefault();

             // On récupère l'URL du formulaire parent
             let form = this.closest('form');
             let url = form.action;

             fetch(url, {
                     method: 'POST',
                     headers: {
                         'X-CSRF-TOKEN': '{{ csrf_token() }}',
                         'Accept': 'application/json'
                     }
                 })
                 .then(response => {
                     // Ici, on pourrait rafraîchir le tableau dynamiquement
                     // Pour l'instant, on affiche une simple alerte sans recharger
                     alert('Produit ajouté avec succès !');

                     // Optionnel : recharger juste la partie panier sans la page entière
                     // location.reload(); // Si vous voulez quand même voir le changement
                 });
         });
     });
 </script>

 <!-- Bootstrap core JS-->
 <script src="https://cdn.cinetpay.com/seamless/main.js"></script>
 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons.ems.js"></script>
 <script monodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
 <script src="{{ asset('js/main.js') }}"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
 <!-- Core theme JS-->
