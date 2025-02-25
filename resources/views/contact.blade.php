@extends('layouts.base')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="mb-4">Prenez contact avec nous</h2>

                <div class="card">
                    <div class="card-body">
                        <form method="post" id="contactForm">
                            <div class="mb-4">
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" name="message" style="height: 200px" placeholder="Votre message"></textarea>
                                    <label for="message">Votre Message</label>
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Votre nom">
                                        <label for="name">Votre Nom</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="name@example.com">
                                        <label for="email">Adresse Email</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" name="subject"
                                            placeholder="Sujet">
                                        <label for="subject">Sujet</label>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mt-4 mt-lg-0">
                    <div class="card-body">
                        <div class="d-flex mb-4">
                            <i class="bi bi-house-door fs-4 me-3"></i>
                            <div>
                                <h5>Ofppt Centre Mirleft</h5>
                                <p class="mb-0">Code Postal 85352</p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <i class="bi bi-phone fs-4 me-3"></i>
                            <div>
                                <h5>+212 615 15 15 15</h5>
                            </div>
                        </div>
                        <div class="d-flex">
                            <i class="bi bi-envelope fs-4 me-3"></i>
                            <div>
                                <h5>support@ofpptmail.com</h5>
                                <p class="mb-0">Envoyez-nous votre requête à tout moment !</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
