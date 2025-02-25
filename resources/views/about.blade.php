@extends('layouts.base')

@section('content')
    <div class="container py-5">
        <div class="row align-items-center">
            <!-- Text Content -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                <span class="text-primary fw-bold">Ce que nous faisons</span>
                <h2 class="display-5 my-3">36 personnes talentueuses travaillent pour vous rendre heureux</h2>
                <p class="lead mb-4">Mollit anim laborum duis au dolor in voluptate velit ess cillum dolore eu lore dsu
                    quality mollit anim laborumuis au dolor in voluptate velit cillum.</p>
                <p class="mb-4">Mollit anim laborum.Duis aute irufg dhjkolohr in re voluptate velit esscillumlore eu quife
                    nrulla parihatur. Excghcepteur signjnt occa cupidatat non inulpadeserunt mollit aboru. temnthp
                    incididbnt ut labore mollit anim laborum suis aute.</p>
                <a href="{{ route('contact') }}" class="btn btn-primary">Contacter nous</a>
            </div>

            <!-- Image Section -->
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="assets/img/service/support-img.jpg" alt="Support Team" class="img-fluid rounded">
                    <div class="position-absolute top-50 start-50 translate-middle text-center bg-white p-4 rounded shadow">
                        <p class="text-muted mb-0">Depuis</p>
                        <span class="h3">1994</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
