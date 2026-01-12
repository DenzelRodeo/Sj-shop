@extends('layouts.website-layout')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card border-0 shadow-sm rounded-4 p-4">
                    <div class="text-center mb-4">
                        <div class="avatar-circle mb-3 mx-auto">
                            <span class="fs-1 fw-bold text-white">{{ substr($user->name, 0, 1) }}</span>
                        </div>
                        <h4 class="fw-bold">{{ $user->name }}</h4>
                        <p class="text-muted">{{ $user->email }}</p>
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist">
                        <button class="nav-link active d-flex align-items-center gap-3 py-3 mb-2 rounded-3"
                            data-bs-toggle="pill" data-bs-target="#profile">
                            <ion-icon name="person-outline"></ion-icon> Mon Profil
                        </button>
                        <button class="nav-link d-flex align-items-center gap-3 py-3 rounded-3" data-bs-toggle="pill"
                            data-bs-target="#orders">
                            <ion-icon name="bag-handle-outline"></ion-icon> Mes Commandes
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="profile">
                        <div class="card border-0 shadow-sm rounded-4 p-4">
                            <h5 class="fw-bold mb-4">Informations Personnelles</h5>
                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Nom complet</label>
                                        <input type="text" class="form-control rounded-3" value="{{ $user->name }}"
                                            name="name">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control rounded-3" value="{{ $user->email }}"
                                            disabled>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <button class="btn btn-primary px-4 py-2 rounded-pill">Mettre à jour</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="orders">
                        <div class="card border-0 shadow-sm rounded-4 p-4">
                            <h5 class="fw-bold mb-4">Historique des commandes</h5>
                            @if ($orders->count() > 0)
                                <div class="table-responsive">
                                    <table class="table align-middle">
                                        <thead>
                                            <tr>
                                                <th>N° Commande</th>
                                                <th>Date</th>
                                                <th>Statut</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td class="fw-bold">#{{ $order->id }}</td>
                                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                                    <td>
                                                        <span
                                                            class="badge bg-{{ $order->status == 'livré' ? 'success' : 'warning' }} rounded-pill">
                                                            {{ ucfirst($order->status) }}
                                                        </span>
                                                    </td>
                                                    <td>{{ number_format($order->total, 0, ',', ' ') }} FCFA</td>
                                                    <td>
                                                        <a href="#"
                                                            class="btn btn-sm btn-outline-primary rounded-pill">Détails</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <ion-icon name="cart-outline" style="font-size: 4rem; opacity: 0.2;"></ion-icon>
                                    <p class="text-muted mt-3">Vous n'avez pas encore passé de commande.</p>
                                    <a href="{{ route('user.shop') }}" class="btn btn-primary rounded-pill mt-2">Explorer
                                        la
                                        boutique</a>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <style>
        .avatar-circle {
            width: 80px;
            height: 80px;
            background: var(--bs-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-pills .nav-link {
            color: #555;
            border: 1px solid transparent;
            transition: all 0.3s ease;
        }

        .nav-pills .nav-link.active {
            background-color: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            border-color: #0d6efd;
        }

        .table thead th {
            border-bottom: none;
            color: #777;
            font-weight: 500;
        }
    </style>
@endsection
