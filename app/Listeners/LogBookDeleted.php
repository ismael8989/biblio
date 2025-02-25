<?php

namespace App\Listeners;

use App\Events\BookDeleted;
use Illuminate\Support\Facades\Auth;
use App\Models\Operation;

class LogBookDeleted
{
    /**
     * Handle the event.
     */
    public function handle(BookDeleted $event)
    {
        // Créer une opération sans la colonne 'timestamps'
        Operation::create([
            'type' => 'delete',
            'table' => 'books',
            'user' => Auth::id(), // ID de l'utilisateur
        ]);
    }
}
