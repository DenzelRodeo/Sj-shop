@extends('layouts.vendor-dashboard-layout');

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4 fw-bold">SJ Shop <span class="text-primary">Business</span></h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Vue d'ensemble des ventes</li>
        </ol>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="small text-white-50">Chiffre d'Affaire</div>
                                <div class="fs-4 fw-bold">1,250,000 FCFA</div>
                            </div>
                            <i class="fas fa-wallet fa-2x opacity-50"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="small text-white stretched-link" href="#">Voir détails</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="small text-white-50">Commandes Reçues</div>
                                <div class="fs-4 fw-bold">48</div>
                            </div>
                            <i class="fas fa-shopping-cart fa-2x opacity-50"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="small text-white stretched-link" href="#">Gérer les commandes</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="small text-white-50">Produits en Ligne</div>
                                <div class="fs-4 fw-bold">12</div>
                            </div>
                            <i class="fas fa-box fa-2x opacity-50"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="small text-white stretched-link" href="#">Voir inventaire</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="small text-white-50">Nouveaux Messages</div>
                                <div class="fs-4 fw-bold">5</div>
                            </div>
                            <i class="fas fa-envelope fa-2x opacity-50"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="small text-white stretched-link" href="#">Lire messages</a>
                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-white fw-bold">
                        <i class="fas fa-chart-area me-1 text-primary"></i>
                        Performance des Ventes (7 derniers jours)
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-white fw-bold">
                        <i class="fas fa-list me-1 text-primary"></i>
                        Dernières Commandes
                    </div>
                    <div class="card-body">
                        <table class="table table-hover small">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Client</th>
                                    <th>Statut</th>
                                    <th>Montant</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#SJ-982</td>
                                    <td>Jean Dupont</td>
                                    <td><span class="badge bg-success">Livré</span></td>
                                    <td>15,000 FCFA</td>
                                </tr>
                                <tr>
                                    <td>#SJ-983</td>
                                    <td>Marie Sissoko</td>
                                    <td><span class="badge bg-warning text-dark">En attente</span></td>
                                    <td>45,000 FCFA</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
