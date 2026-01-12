@extends('layouts.vendor-dashboard-layout');

@section('content')
    <style>
        .input-group-text {
            color: #0e1c36;
            border-right: none;
        }

        .form-control:focus {
            border-color: #0e1c36;
            box-shadow: 0 0 0 0.25rem rgba(14, 28, 54, 0.1);
        }

        textarea {
            resize: none;
        }
    </style>
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between mt-4 mb-4">
            <div>
                <h1 class="fw-bold" style="color: #0e1c36;">Ajouter un Article</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('vendors.dashboard') }}"
                                class="text-decoration-none text-muted">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('articles.index') }}"
                                class="text-decoration-none text-muted">Mes Articles</a></li>
                        <li class="breadcrumb-item active text-primary">Nouveau produit</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary btn-sm shadow-sm px-3">
                <i class="fas fa-arrow-left me-2"></i>Retour à la liste
            </a>
        </div>

        <div class="card border-0 shadow-sm mb-5">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="mb-0 fw-bold" style="color: #0e1c36;"><i class="fas fa-edit me-2 text-primary"></i>Informations
                    sur le produit</h5>
            </div>
            <div class="card-body px-lg-5 py-4">
                <form action="{{ route('articles.handleCreate') }}" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-lg-4 mb-4 text-center">
                            <label class="form-label d-block text-start fw-bold mb-3">Image du produit</label>
                            <div class="border rounded-3 p-4 bg-light position-relative"
                                style="border-style: dashed !important; border-width: 2px !important; border-color: #dee2e6 !important;">
                                <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                <input type="file" name="image" class="form-control form-control-sm"
                                    accept=".jpg,.jpeg,.png">
                                <small class="text-muted d-block mt-2">JPG, PNG (Max. 2Mo)</small>
                            </div>
                            @error('image')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-lg-8">
                            <div class="mb-4">
                                <label class="form-label fw-bold">Nom de l'article</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i
                                            class="fas fa-tag text-muted"></i></span>
                                    <input type="text" name="name"
                                        class="form-control border-start-0 @error('name') is-invalid @enderror"
                                        placeholder="Ex: iPhone 14 Pro Max" value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Prix de vente (FCFA)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i
                                            class="fas fa-coins text-muted"></i></span>
                                    <input type="number" name="price"
                                        class="form-control border-start-0 @error('price') is-invalid @enderror"
                                        placeholder="250000" value="{{ old('price') }}">
                                    <span class="input-group-text bg-light fw-bold">FCFA</span>
                                </div>
                                @error('price')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold">Description complète</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5"
                                    placeholder="Décrivez les caractéristiques de votre produit...">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="my-4 opacity-25">

                    <div class="d-flex justify-content-end gap-2">
                        <button type="reset" class="btn btn-light px-4">Annuler</button>
                        <button type="submit" class="btn btn-primary px-5 shadow-sm"
                            style="background-color: #0e1c36; border: none;">
                            <i class="fas fa-check-circle me-2"></i>Publier cet article
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
