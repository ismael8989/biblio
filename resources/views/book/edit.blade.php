@extends('layouts.base')

@section('content')
    <div class="container mb-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Modifier</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('book.update', $book->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="designation">Designation</label>
                                        <input id="designation" type="text"
                                            class="form-control @error('designation') is-invalid @enderror"
                                            name="designation" value="{{ old('designation', $book->designation) }}" required
                                            autocomplete="designation">
                                        @error('designation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="auteur">Auteur</label>
                                        <input id="auteur" type="text"
                                            class="form-control @error('auteur') is-invalid @enderror" name="auteur"
                                            value="{{ old('auteur', $book->auteur) }}" required autocomplete="auteur">
                                        @error('auteur')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="description">Description</label>
                                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description', $book->description) }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="type">Type</label>
                                        <select id="type" class="form-control @error('type') is-invalid @enderror"
                                            name="type" value="{{ old('type', $book->type) }}" required
                                            autocomplete="type">
                                            <option value="">Sélectionnez un type</option>
                                            <option value="Roman">Roman</option>
                                            <option value="Livre">Livre</option>
                                            <option value="Magazine">Magazine</option>
                                            <option value="Journal">Journal</option>
                                            <option value="Bande dessinée">Bande dessinée</option>
                                            <option value="Manuel scolaire">Manuel scolaire</option>
                                        </select>
                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="categorie">Categorie</label>
                                        <select id="categorie" class="form-control @error('categorie') is-invalid @enderror"
                                            name="categorie" value="{{ old('categorie', $book->categorie) }}" required
                                            autocomplete="categorie">
                                            <option value="">Sélectionnez une catégorie</option>
                                            <option value="Documentaires">Documentaires</option>
                                            <option value="Poésie">Poésie</option>
                                            <option value="Mangas">Mangas</option>
                                            <option value="Journaux">Journaux</option>
                                            <option value="Magazines">Magazines</option>
                                            <option value="Albums">Albums</option>
                                            <option value="Technologie">Technologie</option>
                                        </select>
                                        @error('categorie')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="editeur">Editeur</label>
                                        <input id="editeur" type="text"
                                            class="form-control @error('editeur') is-invalid @enderror" name="editeur"
                                            value="{{ old('editeur', $book->editeur) }}" required autocomplete="editeur">
                                        @error('editeur')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="langue">Langue</label>
                                        <select id="langue" class="form-control @error('langue') is-invalid @enderror"
                                            name="langue" value="{{ old('langue', $book->langue) }}" required
                                            autocomplete="langue">
                                            <option value="">Sélectionnez une langue</option>
                                            <option value="Français">Français</option>
                                            <option value="Anglais">Anglais</option>
                                            <option value="Espagnol">Espagnol</option>
                                            <option value="Allemand">Allemand</option>
                                            <option value="Italien">Italien</option>
                                            <option value="Arabe">Arabe</option>
                                        </select>
                                        @error('langue')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="prix">Prix</label>
                                        <input id="prix" type="number" step="0.01"
                                            class="form-control @error('prix') is-invalid @enderror" name="prix"
                                            value="{{ old('prix', $book->prix) }}" required autocomplete="prix">
                                        @error('prix')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="cover">Cover</label>
                                        <input id="cover" type="file" accept="image/*"
                                            class="form-control @error('cover') is-invalid @enderror" name="cover"
                                            value="{{ old('cover', $book->cover) }}" autocomplete="cover">
                                        @error('cover')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 text-center mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        Update Book
                                    </button>
                                    <a href="{{ route('book.index') }}" class="btn btn-secondary">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
