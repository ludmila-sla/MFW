<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDadosUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
         
            $table->string('redes')->nullable();
            $table->string('redes2')->nullable();
            $table->string('desc')->nullable();
            $table->string('fotoperfil')->nullable();
            $table->string('fotocapa')->nullable();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        
}
}