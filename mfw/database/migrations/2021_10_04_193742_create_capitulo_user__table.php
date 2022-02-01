<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapituloUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capitulo_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('capitulo_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->boolean('like');
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
        Schema::dropIfExists('capitulo_user');
    }
}
