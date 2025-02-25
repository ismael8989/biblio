@extends('layouts.base')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-between">
            <!-- Left Column -->
            <div class="col-lg-8">
                <!-- Book Header -->
                <div class="card mb-4">
                    <div class="card-body d-flex gap-4">
                        <img src="{{ asset('assets/img/book/' . $book->cover) }}" alt="" class="img-fluid"
                            style="width='50px'; height='50px'">
                        <div>
                            <h2 class="card-title">{{ $book->designation }}</h2>
                            <p class="text-muted mb-2">{{ $book->auteur }}</p>
                            <h4 class="text-primary">{{ number_format($book->prix, 2) }} DH</h4>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Description</h4>
                        <p class="card-text">{{ $book->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Aperçu du livre</h4>
                        <ul class="list-unstyled">
                            <li class="mb-2">Auteur : <span class="text-muted">{{ $book->auteur }}</span></li>
                            <li class="mb-2">Editeur : <span class="text-muted">{{ $book->editeur }}</span></li>
                            <li class="mb-2">Type : <span class="text-muted">{{ $book->type }}</span></li>
                            <li class="mb-2">Catégorie : <span class="text-muted">{{ $book->categorie }}</span></li>
                            <li class="mb-2">Prix : <span class="text-muted">{{ number_format($book->prix, 2) }} DH</span>
                            </li>
                        </ul>
                        <div class="d-grid gap-2">
                            <a href="{{ route('book.index') }}" class="btn btn-secondary w-100">Retour</a>
                            <a href="#" class="btn btn-primary w-100">Acheter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
