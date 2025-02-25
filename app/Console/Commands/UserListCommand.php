<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UserListCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Liste de tous les utilisateurs disponibles';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = \App\Models\User::all(['id', 'nom', 'prenom', 'email', 'created_at']);
        $headers = ['ID', 'Nom', 'Prénom', 'Email', 'Date création'];
        $this->table($headers, $users);
        return 0;
    }
}
