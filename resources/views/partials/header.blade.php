<div class="header-area header-transparrent">
    <div class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href={{ route('index') }}>Bibliothèque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href={{ route('index') }}>Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href={{ route('book.index') }}>Livres</a></li>
                    <li class="nav-item"><a class="nav-link" href={{ route('about') }}>À propos</a></li>
                    <li class="nav-item"><a class="nav-link" href={{ route('contact') }}>Contact</a></li>
                </ul>
                @if (session('username'))
                    <a href="{{ route('profile') }}" class="btn btn-outline-secondary ms-2">Mon Compte</a>
                    <a href="{{ route('logout') }}" class="btn btn-outline-primary ms-2">Se déconnecter</a>
                @else
                    <a href={{ route('signup') }} class="btn btn-outline-primary ms-2">S'inscrire</a>
                    <a href={{ route('login') }} class="btn btn-primary ms-2">Se connecter</a>
                @endif
            </div>
        </div>
    </div>
</div>
