     @extends('layouts.website-layout')

     @section('content')
         <div class="container mt-5">
             <div class="row">
                 <div class="col-md-8">
                     <div class="card shadow">
                         <div class="card-header bg-primary text-white">
                             <h4>Finaliser ma commande</h4>
                         </div>
                         <div class="card-body">
                             <form action="{{ route('checkout') }}" method="POST">
                                 @csrf
                                 <div class="mb-3">
                                     <label>Nom complet</label>
                                     <input type="text" name="name" class="form-control" required>
                                 </div>
                                 <div class="mb-3">
                                     <label>Téléphone (WhatsApp)</label>
                                     <input type="tel" name="phone" class="form-control" placeholder="6..." required>
                                 </div>
                                 <div class="mb-3">
                                     <label>Ville de livraison</label>
                                     <input type="text" name="city" class="form-control" required>
                                 </div>
                                 <button type="submit" class="btn btn-success w-100">Confirmer la commande</button>

                             </form>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-4">
                     <div class="card">
                         <div class="card-body">
                             <h6>Résumé</h6>
                             <hr>
                             <p>Total à payer : <strong>{{ number_format($total ?? 0, 0, ',', ' ') }} Fcfa</strong></p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     @endsection
