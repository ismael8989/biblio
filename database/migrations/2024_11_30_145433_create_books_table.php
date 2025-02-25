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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('designation')->require();
            $table->text('description')->nullable('Pas de description');
            $table->string('type')->default('Texte');
            $table->string('langue')->default('Francais');
            $table->string('editeur')->default('Anonyme');
            $table->string('categorie')->default('Nouveau');
            $table->double('prix')->default('0');
            $table->string('auteur')->default('Anonyme');
            $table->string('cover')->default('no_cover.png');
            $table->timestamps();
        });
  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
