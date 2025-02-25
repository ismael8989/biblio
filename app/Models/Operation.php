<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $table = 'operations'; // Nom de la table

    protected $fillable = [
        'type',       // Type d'opération (create, update, delete)
        'table',      // Table concernée (ex: books)
        'user',       // ID de l'utilisateur responsable
        'timestamps'  // Date et heure de l'opération
    ];

    /**
     * Relation avec l'utilisateur (si nécessaire)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user');
    }
}
