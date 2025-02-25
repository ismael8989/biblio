@extends('layouts.base')

@section('content')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="https://via.placeholder.com/150" alt="avatar" class="rounded-circle img-fluid"
                            style="width: 150px;">
                        <h5 class="my-3">{{ Auth::user()->nom }}</h5>
                        <p class="text-muted mb-1">Web Developer</p>
                        <p class="text-muted mb-4">San Francisco, CA</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nom et prénom</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->nom . ' ' . Auth::user()->prenom }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Membre depuis</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>
                        <a href="{{route('editp')}}" class="btn btn-primary">Modifier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
