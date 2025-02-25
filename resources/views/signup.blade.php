@extends('layouts.base')

@section('content')
    <div class="container py-5">
        @if (session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4">Créer un compte</h2>

                <div class="card">
                    <div class="card-body">
                        <form method="post" id="signup" onsubmit="return validateForm()">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('nom') is-invalid @enderror"
                                            id="nom" name="nom" placeholder="Votre Nom" required>
                                        <label for="nom">Votre Nom</label>
                                        @error('nom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('prenom') is-invalid @enderror"
                                            id="prenom" name="prenom" placeholder="Votre prénom" required>
                                        <label for="prenom">Votre prénom</label>
                                        @error('prenom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" placeholder="name@example.com" required>
                                        <label for="email">Adresse Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control @error('tel') is-invalid @enderror"
                                            id="tel" name="tel" placeholder="Téléphone">
                                        <label for="tel">Numéro de téléphone</label>
                                        @error('tel')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="Mot de passe" required>
                                        <label for="password">Mot de passe</label>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">S'inscrire</button>
                            </div>
                        </form>

                        <script>
                            function validateForm() {
                                var nom = document.getElementById("nom").value;
                                var prenom = document.getElementById("prenom").value;
                                var email = document.getElementById("email").value;
                                var tel = document.getElementById("tel").value;
                                var password = document.getElementById("password").value;

                                if (nom == "" || prenom == "" || email == "" || tel == "" || password == "") {
                                    alert("Tous les champs doivent être remplis");
                                    return false;
                                }
                                return true;
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
