@extends('layouts.base')

@section('content')
    <!-- job post company Start -->
    <div class="job-post-company pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Left Content -->
                <div class="col-xl-7 col-lg-8">
                    <!-- job single -->
                    <div class="single-job-items mb-50">
                        <div class="job-items">
                            <div class="company-img company-img-details">
                                <a href="#"><img src="assets/img/book/book.png" alt=""></a>
                            </div>
                            <div class="job-tittle">
                                <a href="#">
                                    <h4>Laravel for dummies</h4>
                                </a>
                                <ul>
                                    <li>Chain coder</li>
                                    <li>PHP, LARAVEL</li>
                                    <li>$35</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- job single End -->

                    <div class="job-post-details">
                        <div class="post-details1 mb-50">
                            <!-- Small Section Tittle -->
                            <div class="small-section-tittle">
                                <h4>Description</h4>
                            </div>
                            <p>A few months back I bought a license for Laravel Spark but never got around to using it. To
                                be honest I find the thought of using PHP a little hard since I have been working on
                                Django/Flask apps for so long but Laravel Spark framework does address a lot of my issues
                                with frameworks like Django and Flask. It is very opinionated and takes care of a lot of
                                bolier-plate tedium. Every time I try to work with Spark there is an issue with it, its very
                                buggy and the docs are way too sparse. The joys of a commercial project versus an open
                                source product!</p>
                        </div>
                    </div>
                </div>
                <!-- Right Content -->
                <div class="col-xl-4 col-lg-4">
                    <div class="post-details3  mb-50">
                        <!-- Small Section Tittle -->
                        <div class="small-section-tittle">
                            <h4>Aperçu du livre</h4>
                        </div>
                        <ul>
                            <li>Date de création : <span>12 Aug 2019</span></li>
                            <li>Auteur : <span>Chain coder</span></li>
                            <li>Editeur : <span>Dummies Lab</span></li>
                            <li>Catégorie : <span>Informatique</span></li>
                            <li>Prix : <span>$35</span></li>
                        </ul>
                        <div class="apply-btn2">
                            <a href="#" class="btn">Acheter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job post company End -->
@endsection
