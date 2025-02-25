<?php

namespace App\Listeners;

use App\Events\BookCreated;
use Illuminate\Support\Facades\Auth;
use App\Models\Operation;

class LogBookCreated
{
    /**
     * Handle the event.
     */
    public function handle(BookCreated $event)
    {
        // Créer une opération sans la colonne 'timestamps'
        Operation::create([
            'type' => 'create',
            'table' => 'books',
            'user' => Auth::id(), // ID de l'utilisateur
        ]);
    }
}
