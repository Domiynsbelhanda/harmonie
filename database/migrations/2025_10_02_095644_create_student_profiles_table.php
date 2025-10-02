<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('postnom');
            $table->string('prenom');
            $table->enum('sexe', ['M', 'F']);
            $table->date('date_naissance');
            $table->string('lieu_naissance')->nullable();
            $table->string('nationalite')->nullable();

            // 🔹 Informations académiques
            $table->string('matricule')->nullable()->unique();
            $table->foreignId('classe_id')->nullable()->constrained('classes')->nullOnDelete();
            $table->string('academic_year')->nullable();
            $table->enum('statut', ['inscrit', 'en_attente', 'exclu'])->default('inscrit');

            // 🔹 Informations de contact
            $table->string('adresse')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();


            // 🔹 Informations parent/tuteur
            $table->string('nom_pere')->nullable();
            $table->string('tel_pere')->nullable();
            $table->string('nom_mere')->nullable();
            $table->string('tel_mere')->nullable();
            $table->string('tuteur')->nullable();


            // 🔹 Autres infos utiles
            $table->string('photo')->nullable();
            $table->text('observations')->nullable();


            // 🔹 Relation avec user
            $table->foreignId('user_id')->nullable()->unique()->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
