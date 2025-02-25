<?php

namespace App\Listeners;

use App\Events\BookUpdated;
use App\Models\Operation;
use Illuminate\Support\Facades\Auth;

class LogBookUpdated
{
    /**
     * Handle the event.
     */
    public function handle(BookUpdated $event)
    {
        // Créer une opération sans la colonne 'timestamps'
        Operation::create([
            'type' => 'update',
            'table' => 'books',
            'user' => Auth::id(), // ID de l'utilisateur
        ]);
    }
}
