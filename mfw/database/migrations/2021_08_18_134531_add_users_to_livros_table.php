<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersToLivrosTable extends Migration
{
    public function up()
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->string('user_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('livros', function (Blueprint $table) {
            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade');
        });
    }
}
