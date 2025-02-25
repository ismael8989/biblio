@extends('layouts.base')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="mb-4">Se connecter</h2>

                @if (session('message'))
                    <div class="alert alert-info">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <form method="post" id="login" onsubmit="return validateForm()">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="name@example.com" required>
                                        <label for="email">Adresse Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Mot de passe" required>
                                        <label for="password">Mot de passe</label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Se connecter</button>
                        </form>
                        <script>
                            function validateForm() {
                                var email = document.getElementById("email").value;
                                var password = document.getElementById("password").value;

                                if (email.trim() === "" || password.trim() === "") {
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
