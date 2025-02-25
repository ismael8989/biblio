@extends('layouts.base')
@section('content')
    <div class="container mt-4 mb-4">
        <h3 class="mb-4">Ajouter un livre</h3>
        <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="designation" class="form-label">Designation</label>
                        <input type="text" class="form-control" id="designation" name="designation"
                            value="{{ old('designation') }}" placeholder="Designation">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description"
                            value="{{ old('description') }}" placeholder="Description">
                    </div>
                    <div class="mb-3">
                        <label for="auteur" class="form-label">Auteur</label>
                        <input type="text" class="form-control" id="auteur" name="auteur" placeholder="Auteur"
                            value="{{ old('auteur') }}">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select" id="type" name="type">
                            <option value="Roman">Roman</option>
                            <option value="Nouvelle">Nouvelle</option>
                            <option value="Essai">Essai</option>
                            <option value="Biographie">Biographie</option>
                            <option value="Manuel scolaire">Manuel scolaire</option>
                            <option value="Livre de référence">Livre de référence</option>
                            <option value="Livre jeunesse">Livre jeunesse</option>
                            <option value="Bande dessinée">Bande dessinée</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="categorie" class="form-label">Categorie</label>
                        <select class="form-select" id="categorie" name="categorie">
                            <option value="Documentaires">Documentaires</option>
                            <option value="Poésie">Poésie</option>
                            <option value="Mangas">Mangas</option>
                            <option value="Journaux">Journaux</option>
                            <option value="Magazines">Magazines</option>
                            <option value="Albums">Albums</option>
                            <option value="Technologie">Technologie</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="editeur" class="form-label">Editeur</label>
                        <input type="text" class="form-control" id="editeur" name="editeur" placeholder="Editeur"
                            value="{{ old('editeur') }}">
                    </div>
                    <div class="mb-3">
                        <label for="langue" class="form-label">Langue</label>
                        <select class="form-select" id="langue" name="langue">
                            <option value="Français">Français</option>
                            <option value="Anglais">Anglais</option>
                            <option value="Espagnol">Espagnol</option>
                            <option value="Allemand">Allemand</option>
                            <option value="Italien">Italien</option>
                            <option value="Arabe">Arabe</option>
                            <option value="Portugais">Portugais</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="text" class="form-control" id="prix" name="prix" placeholder="Prix"
                            value="{{ old('prix') }}">
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Couverture</label>
                        <input type="file" class="form-control" id="cover" name="cover">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
