@extends('layouts.vendor-dashboard-layout');
<style>
    /* Style spécifique au profil */
    .form-label {
        color: #495057;
        margin-bottom: 0.5rem;
    }

    .form-control:focus,
    .form-select:focus {
        background-color: #fff !important;
        border: 1px solid #0e1c36 !important;
        box-shadow: none;
    }

    .img-thumbnail {
        padding: 0.25rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }

    /* Badge de statut vérifié */
    .bg-success {
        background-color: #198754 !important;
    }
</style>

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between mt-4 mb-4">
            <div>
                <h1 class="fw-bold" style="color: #0e1c36;">Mon Profil Vendeur</h1>
                <p class="text-muted">Gérez vos informations personnelles et les paramètres de votre boutique.</p>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-xl-4 col-lg-5 mb-4">
                <div class="card border-0 shadow-sm text-center p-4">
                    <div class="card-body">
                        <form action="{{ route('profile.updatePhoto') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card border-0 shadow-sm text-center p-4">
                                <div class="card-body">
                                    <div class="position-relative d-inline-block mb-3">
                                        <img id="avatar-preview"
                                            src="{{ auth('vendor')->user()->avatar ? asset('storage/' . auth('vendor')->user()->avatar) : 'https://ui-avatars.com/api/?name=' . auth('vendor')->user()->name . '&background=0e1c36&color=fff' }}"
                                            class="rounded-circle img-thumbnail shadow-sm"
                                            style="width: 130px; height: 130px; object-fit: cover;">

                                        <label for="avatar-input"
                                            class="position-absolute bottom-0 end-0 bg-primary text-white rounded-circle d-flex align-items-center justify-content-center shadow"
                                            style="width: 35px; height: 35px; cursor: pointer; border: 3px solid #fff;">
                                            <i class="fas fa-camera fa-sm"></i>
                                        </label>
                                        <input type="file" id="avatar-input" name="avatar" class="d-none"
                                            accept="image/*" onchange="previewImage(this)">
                                    </div>

                                    <h5 class="fw-bold mb-0">{{ auth('vendor')->user()->name }}</h5>
                                    <p class="text-muted small">Format accepté : JPG, PNG</p>
                                    <p class="text-muted small mb-3">Membre depuis
                                        {{ auth('vendor')->user()->created_at->format('M Y') }}</p>

                                    <div id="save-photo-btn" class="d-none animate__animated animate__fadeIn">
                                        <button type="submit" class="btn btn-sm btn-success px-4 rounded-pill">
                                            Confirmer le changement
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <script>
                            function previewImage(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        document.getElementById('avatar-preview').src = e.target.result;
                                        // Affiche le bouton de confirmation
                                        document.getElementById('save-photo-btn').classList.remove('d-none');
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                        </script>
                        <div class="d-flex justify-content-around border-top border-bottom py-3 mb-3">
                            <div>
                                <h6 class="fw-bold mb-0">14</h6>
                                <small class="text-muted">Articles</small>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">4.8/5</h6>
                                <small class="text-muted">Note</small>
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">128</h6>
                                <small class="text-muted">Ventes</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-lg-7">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white py-3">
                        <h5 class="mb-0 fw-bold" style="color: #0e1c36;">
                            <i class="fas fa-user-edit me-2 text-primary"></i>Informations Générales
                        </h5>
                    </div>
                    <div class="card-body px-lg-4">
                        <form action="{{ route('vendors.profile.update') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                {{-- CHAMP NOM : Ajout de name="name" --}}
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Nom Complet / Boutique</label>
                                    <input type="text" name="name" class="form-control bg-light border-0"
                                        value="{{ old('name', $vendor->name) }}"> {{-- old() permet de garder la saisie en cas d'erreur --}}
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Adresse Email</label>
                                    <input type="email" class="form-control bg-light border-0"
                                        value="{{ $vendor->email }}" readonly>
                                    <small class="text-muted" style="font-size: 0.7rem;">L'email ne peut pas être
                                        modifié.</small>
                                </div>

                                {{-- CHAMP TELEPHONE : Correction de la classe et du nom --}}
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Numéro de Téléphone</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0 bg-light">+237</span>
                                        <input type="text" name="phone" class="form-control bg-light border-0"
                                            placeholder="6xx xxx xxx" value="{{ old('phone', $vendor->phone) }}">
                                    </div>
                                    @error('phone')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Localisation</label>
                                    <select name="location" class="form-select bg-light border-0">
                                        <option value="Douala" {{ $vendor->location == 'Douala' ? 'selected' : '' }}>Douala
                                        </option>
                                        <option value="Yaoundé" {{ $vendor->location == 'Yaoundé' ? 'selected' : '' }}>
                                            Yaoundé</option>
                                        <option value="Bafoussam" {{ $vendor->location == 'Bafoussam' ? 'selected' : '' }}>
                                            Bafoussam</option>
                                    </select>
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-primary px-4 shadow-sm"
                                        style="background-color: #0e1c36; border: none;">
                                        Enregistrer les modifications
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-danger">
                    <i class="fas fa-lock me-2"></i>Sécurité du compte
                </h5>
            </div>
            <div class="card-body px-lg-4">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1 fw-bold">Mot de passe</h6>
                        <p class="text-muted small mb-0">Dernière modification il y a 3 mois.</p>
                    </div>
                    <button class="btn btn-outline-danger btn-sm px-3">Mettre à jour</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
