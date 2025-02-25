<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('user:add', function () {
    // demander à l'utilisateur de saisir les informations de l'utilisateur
    $nom = $this->ask('Quel est le nom d\'utilisateur ??');
    $prenom = $this->ask('Quelle est le prénom de l\'utilisateur ??');
    $email = $this->ask('Quelle est l\'adresse électronique de l\'utilisateur ??');
    $password = $this->secret('Quel est le mot de passe de l\'utilisateur ??');
    $tel = $this->ask('Quel est le numéro de téléphone de l\'utilisateur ??');
    $role = $this->choice('Sélectionner le rôle de l\'utilisateur', ['admin', 'user'], 1);

    // créer un nouvel utilisateur
    $user = new \App\Models\User();
    $user->nom = $nom;
    $user->prenom = $prenom;
    $user->email = $email;
    $user->password = Hash::make($password);
    $user->tel = $tel;
    $user->role = $role;
    $user->save();

    // afficher un message de confirmation
    $this->info('L\'utilisateur a été créé avec succès !');
    $this->line('ID=' . $user->id);
})->purpose('Créer un nouvel utilisateur de manière interactive');

Artisan::command('user:delete', function () {
    // demander l'ID de l'utilisateur à supprimer
    $id = $this->ask('Quel est l\'ID de l\'utilisateur à supprimer ?');

    // rechercher l'utilisateur
    $user = \App\Models\User::find($id);

    if (!$user) {
        $this->error('Utilisateur non trouvé !');
        return;
    }

    // confirmation
    if ($this->confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
        $user->delete();
        $this->info('L\'utilisateur a été supprimé avec succès !');
    } else {
        $this->info('Opération annulée.');
    }
})->purpose('Supprimer un utilisateur par son ID');

Artisan::command('user:admin', function () {
    // demander l'ID de l'utilisateur
    $id = $this->ask('Quel est l\'ID de l\'utilisateur à promouvoir administrateur ?');

    // rechercher l'utilisateur
    $user = \App\Models\User::find($id);

    if (!$user) {
        $this->error('Utilisateur non trouvé !');
        return;
    }

    // confirmation
    if ($this->confirm('Êtes-vous sûr de vouloir promouvoir cet utilisateur en administrateur ?')) {
        $user->role = 'admin';
        $user->save();
        $this->info('L\'utilisateur a été promu administrateur avec succès !');
    } else {
        $this->info('Opération annulée.');
    }
})->purpose('Promouvoir un utilisateur en administrateur');

Artisan::command('user:removeadmin', function () {
    // demander l'ID de l'utilisateur
    $id = $this->ask('Quel est l\'ID de l\'administrateur à rétrograder ?');

    // rechercher l'utilisateur
    $user = \App\Models\User::find($id);

    if (!$user) {
        $this->error('Utilisateur non trouvé !');
        return;
    }

    if ($user->role !== 'admin') {
        $this->error('Cet utilisateur n\'est pas un administrateur !');
        return;
    }

    // confirmation
    if ($this->confirm('Êtes-vous sûr de vouloir rétrograder cet administrateur en utilisateur normal ?')) {
        $user->role = 'user';
        $user->save();
        $this->info('L\'administrateur a été rétrogradé en utilisateur avec succès !');
    } else {
        $this->info('Opération annulée.');
    }
})->purpose('Rétrograder un administrateur en utilisateur normal');
