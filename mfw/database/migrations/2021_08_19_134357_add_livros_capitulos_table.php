<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLivrosCapitulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('capitulos', function (Blueprint $table) {
            $table->foreignId('livro_id')->constrained();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {Schema::table('capitulos', function (Blueprint $table) {
        $table->foreignId('livro_id')
        ->constrained()
        ->onDelete('cascade');
    });
    }
}
