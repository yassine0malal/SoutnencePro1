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
        Schema::create('profiles', function (Blueprint $table) {

                $table->id();
                $table->string('FirstName');
                $table->string('LastName');
                $table->string('Username')->unique();
                $table->string('Phone'); // Changement en string
                $table->string('email')->unique();
                $table->string('password')->nullable();
                // $table->string('google_id')->nullable();
                $table->timestamps(); // Ajout de timestamps
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
