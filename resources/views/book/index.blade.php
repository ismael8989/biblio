@extends('layouts.base')

@section('content')
    <!-- Hero Section -->
    <div class="bg-dark text-white py-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1>Liste des livres</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container py-5">
        <div class="row">
            <!-- Filters Sidebar -->
            <div class="col-md-3">
                <form method="GET" action="{{ route('book.index') }}">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Filtrer les livres</h5>

                            <!-- Categories -->
                            <div class="mb-4">
                                <h6>Categories</h6>
                                <select class="form-select" id="categorie" name="categorie">
                                    <option value="Tous" {{ request('categorie') == 'Tous' ? 'selected' : '' }}>Tous</option>
                                    <option value="Documentaires" {{ request('categorie') == 'Documentaires' ? 'selected' : '' }}>Documentaires</option>
                                    <option value="Poésie" {{ request('categorie') == 'Poésie' ? 'selected' : '' }}>Poésie</option>
                                    <option value="Mangas" {{ request('categorie') == 'Mangas' ? 'selected' : '' }}>Mangas</option>
                                    <option value="Journaux" {{ request('categorie') == 'Journaux' ? 'selected' : '' }}>Journaux</option>
                                    <option value="Magazines" {{ request('categorie') == 'Magazines' ? 'selected' : '' }}>Magazines</option>
                                    <option value="Albums" {{ request('categorie') == 'Albums' ? 'selected' : '' }}>Albums</option>
                                    <option value="Technologie" {{ request('categorie') == 'Technologie' ? 'selected' : '' }}>Technologie</option>
                                </select>
                            </div>

                            <!-- Type -->
                            <div class="mb-4">
                                <h6>Type</h6>
                                @foreach(['Roman', 'Nouvelle', 'Essai', 'Biographie', 'Manuel_scolaire', 'Livre_de_reference', 'Livre_jeunesse', 'Bande_dessinee'] as $type)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="{{ $type }}" name="{{ $type }}" {{ request($type) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="{{ $type }}">{{ ucfirst(str_replace('_', ' ', $type)) }}</label>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Price Range -->
                            <div class="mb-4">
                                <h6>Filtrer par prix</h6>
                                <div class="d-flex gap-2">
                                    <input type="number" class="form-control" id="min-price" name="min_price" placeholder="Min" value="{{ request('min_price') }}" min="0">
                                    <input type="number" class="form-control" id="max-price" name="max_price" placeholder="Max" value="{{ request('max_price') }}" min="0">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Appliquer les filtres</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Book Listings -->
            <div class="col-md-9">
                <!-- Add Book Button -->
                <div class="d-flex justify-content-end mb-4">
                    <a href="{{ route('book.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Ajouter un livre
                    </a>
                </div>

                <!-- Sort Controls -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    {{-- <span>{{ $books->total() }} Livres trouvés</span> --}}
                    <span>{{ __($books->total() == 1 ? 'One book found' : $books->total().' books found') }}</span>
                    <select class="form-select w-auto" name="sort_by" onchange="this.form.submit()">
                        <option value="" disabled {{ !request('sort_by') ? 'selected' : '' }}>Trier par</option>
                        <option value="prix" {{ request('sort_by') == 'prix' ? 'selected' : '' }}>Prix</option>
                        <option value="titre" {{ request('sort_by') == 'titre' ? 'selected' : '' }}>Titre</option>
                        <option value="auteur" {{ request('sort_by') == 'auteur' ? 'selected' : '' }}>Auteur</option>
                    </select>
                </div>

                <!-- Book Cards -->
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach ($books as $book)
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{ asset('assets/img/book/' . $book->cover) }}" class="card-img-top" alt="Book cover">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $book->designation }}</h5>
                                    <p class="card-text">{{ $book->auteur }}</p>
                                    <div class="d-flex flex-column gap-2">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('book.show', $book->id) }}" class="btn btn-primary">Détails</a>
                                            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-secondary">Modifier</a>
                                            {{-- <form action="{{ route('book.destroy', $book->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?')">Supprimer</button>
                                            </form> --}}
                                            @if ($book->deleted_at)
                                            <form action="{{ route('book.restore', $book->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success">Restaurer</button>
                                            </form>
                            
                                            <form action="{{ route('book.forceDelete', $book->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprimer définitivement</button>
                                            </form>
                                        @else
                                            <form action="{{ route('book.destroy', $book->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-warning">Supprimer</button>
                                            </form>
                                        @endif
                                        </div>
                                        <span class="text-end fw-bold">{{ number_format($book->prix, 2) }} DH</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $books->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
