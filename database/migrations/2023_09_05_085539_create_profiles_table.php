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
        Schema::create('profiles', function (Blueprint $table) {
            //table columns
            $table->id();
            //link the user to the profile so that we hve a user with a unique profile or a foreign key
            $table->unsignedBigInteger('user_id');
            $table->string('title')->nullable();
            $table->text("description")->nullable();
            $table->string("url")->nullable();
            $table->string("image")->nullable();
            $table->timestamps();
            //for better searching, we can add an index
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
