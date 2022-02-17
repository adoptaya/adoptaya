<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('species')->nullable();
            $table->string('status');
            $table->string('location')->nullable();
            $table->mediumText('description')->nullable();
            $table->mediumText('descriptionabridged');
            $table->string('img')->nullable();
            $table->string('age');
            $table->string('owner');
            $table->string('contact');
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
        Schema::dropIfExists('pet');
    }
}
