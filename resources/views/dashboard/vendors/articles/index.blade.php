@extends('layouts.vendor-dashboard-layout');


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}

        </div>
    @endif
    <style>
        /* Badges modernes avec fond clair */
        .bg-success-soft {
            background-color: #e1f6eb !important;
            color: #198754 !important;
            border: 1px solid #c3e6cb;
        }

        .bg-danger-soft {
            background-color: #fbeae9 !important;
            color: #dc3545 !important;
            border: 1px solid #f5c6cb;
        }

        /* Alignement et survol du tableau */
        .table td {
            padding: 1rem 0.75rem;
        }

        .table-hover tbody tr:hover {
            background-color: #fcfcfd;
        }

        /* Style des boutons d'action */
        .btn-light {
            background: #fff;
            transition: all 0.2s;
        }

        .btn-light:hover {
            background: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between mt-4 mb-4">
            <div>
                <h1 class="fw-bold" style="color: #0e1c36;">Gestion du Catalogue</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('vendors.dashboard') }}"
                                class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active">Mes Articles</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('articles.create') }}" class="btn btn-primary shadow-sm"
                style="background-color: #0e1c36; border: none;">
                <i class="fas fa-plus me-2"></i>Ajouter un nouvel article
            </a>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-0 d-flex align-items-center justify-content-between">
                <h5 class="mb-0 fw-bold" style="color: #0e1c36;"><i class="fas fa-boxes me-2 text-primary"></i>Inventaire
                    des produits</h5>
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-hover align-middle">
                    <thead>
                        <tr class="text-uppercase small fw-bold" style="background-color: #f8f9fa;">
                            <th class="border-0">Produit</th>
                            <th class="border-0">Détails</th>
                            <th class="border-0 text-center">Prix</th>
                            <th class="border-0 text-center">Disponibilité</th>
                            <th class="border-0 text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td style="width: 80px;">
                                    @if ($article->image)
                                        <div class="rounded-circle shadow-sm border"
                                            style="background-image:url('{{ asset('storage/' . $article->image->path) }}'); 
                                                width: 50px; height: 50px; background-position: center; background-size: cover;">
                                        </div>
                                    @else
                                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center border"
                                            style="width: 50px; height: 50px;">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    <div class="fw-bold text-dark">{{ $article->name }}</div>
                                    <small class="text-muted">ID:
                                        #SJ-{{ str_pad($article->id, 4, '0', STR_PAD_LEFT) }}</small>
                                </td>

                                <td class="text-center fw-bold text-primary">
                                    {{ number_format($article->price, 0, ',', ' ') }} <small>FCFA</small>
                                </td>

                                <td class="text-center">
                                    @if ($article->active)
                                        <span class="badge rounded-pill bg-success-soft text-success px-3">
                                            <i class="fas fa-check-circle me-1"></i>En stock
                                        </span>
                                    @else
                                        <span class="badge rounded-pill bg-danger-soft text-danger px-3">
                                            <i class="fas fa-times-circle me-1"></i>Rupture
                                        </span>
                                    @endif
                                </td>

                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="#" class="btn btn-sm btn-light border" title="Modifier">
                                            <i class="fas fa-edit text-primary"></i>
                                        </a>

                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                                            onsubmit="return confirm('Supprimer cet article définitivement ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light border" title="Supprimer">
                                                <i class="fas fa-trash-alt text-danger"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
