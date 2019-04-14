<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLkwsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lkws', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lkw')->nullable();
            $table->decimal('frachtkosten', 8, 2)->nullable();
            $table->string('spedition')->nullable();
            $table->date('ankunft')->nullable();
            $table->string('kommentar')->nullable();
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
        Schema::dropIfExists('lkws');
    }
}
