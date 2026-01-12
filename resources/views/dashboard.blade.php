 @extends('layouts.website-layout')
 @section('content')
     <div class="container py-5">
         <div class="d-flex justify-content-between align-items-center mb-4">
             <div>
                 <h2 class="fw-bold mb-0">Ma Boutique</h2>
                 <p class="text-muted">Gérez vos produits et suivez vos ventes</p>
             </div>
             <a href="{{ route('products.create') }}" class="btn btn-primary rounded-pill px-4">
                 <i class="fas fa-plus me-2"></i> Ajouter un produit
             </a>
         </div>

         <div class="row g-4 mb-5">
             <div class="col-md-4">
                 <div class="card border-0 shadow-sm rounded-4 p-3 bg-primary text-white">
                     <div class="d-flex align-items-center">
                         <div class="fs-1 me-3"><i class="fas fa-box"></i></div>
                         <div>
                             <h6 class="mb-0">Mes Produits</h6>
                             <h3 class="fw-bold mb-0">{{ $totalProducts }}</h3>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
             <div class="table-responsive">
                 <table class="table table-hover align-middle mb-0">
                     <thead class="bg-light">
                         <tr>
                             <th class="ps-4">Produit</th>
                             <th>Prix</th>
                             <th>Stock</th>
                             <th>Statut</th>
                             <th class="text-end pe-4">Actions</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($products as $product)
                             <tr>
                                 <td class="ps-4">
                                     <div class="d-flex align-items-center">
                                         <img src="{{ asset('storage/' . $product->image) }}" class="rounded-3 me-3"
                                             style="width: 45px; height: 45px; object-fit: cover;">
                                         <span class="fw-semibold">{{ $product->name }}</span>
                                     </div>
                                 </td>
                                 <td>{{ number_format($product->price, 0, ',', ' ') }} FCFA</td>
                                 <td>{{ $product->stock ?? 'N/A' }}</td>
                                 <td>
                                     <span
                                         class="badge {{ $product->stock > 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }} rounded-pill px-3">
                                         {{ $product->stock > 0 ? 'En vente' : 'Rupture' }}
                                     </span>
                                 </td>
                                 <td class="text-end pe-4">
                                     <a href="{{ route('products.edit', $product->id) }}"
                                         class="btn btn-sm btn-light rounded-circle"><i class="fas fa-edit"></i></a>
                                     <button class="btn btn-sm btn-light text-danger rounded-circle"><i
                                             class="fas fa-trash"></i></a>
                                 </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 @endsection
