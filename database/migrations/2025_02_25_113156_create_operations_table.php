<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('operations', function (Blueprint $table) {
        $table->id();
        $table->string('type');       // Type d'opération (create, update, delete)
        $table->string('table');      // Table concernée (ex: books)
        $table->unsignedBigInteger('user')->nullable(); // ID de l'utilisateur
        $table->timestamps();         // Colonnes created_at et updated_at
    });
}



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operations');
    }
};
