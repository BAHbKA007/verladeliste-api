<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('produkt');
            $table->string('gebinde')->nullable();
            $table->decimal('paletten', 8, 2)->nullable();
            $table->integer('menge')->nullable();
            $table->string('lieferant');
            $table->decimal('preis', 8, 2)->nullable();
            $table->string('entladung');
            $table->date('ankunft');
            $table->date('verladung');
            $table->integer('lkw')->nullable();
            $table->string('we_nr')->nullable()->default('');
            $table->string('ls_nr')->nullable()->default('');
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
        Schema::dropIfExists('wes');
    }
}
