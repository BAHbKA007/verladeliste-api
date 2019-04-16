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
            $table->unsignedBigInteger('artikel_id')->nullable();
            $table->unsignedBigInteger('gebinde_id')->nullable();
            $table->decimal('paletten', 8, 2)->nullable();
            $table->integer('menge')->nullable();
            $table->unsignedBigInteger('lieferant_id')->nullable();
            $table->decimal('preis', 8, 2)->nullable();
            $table->unsignedBigInteger('entladung_id')->nullable();
            $table->date('ankunft');
            $table->date('verladung');
            $table->unsignedBigInteger('lkw_id')->nullable();
            $table->string('we_nr')->nullable()->default('');
            $table->string('ls_nr')->nullable()->default('');
            $table->timestamps();

            $table->foreign('lkw_id')
                    ->references('id')->on('lkws')
                    ->onDelete('SET NULL');

            $table->foreign('lieferant_id')
                    ->references('id')->on('lieferants')
                    ->onDelete('SET NULL');

            $table->foreign('gebinde_id')
                    ->references('id')->on('gebindes')
                    ->onDelete('SET NULL'); 
                    
            $table->foreign('artikel_id')
                    ->references('id')->on('artikels')
                    ->onDelete('SET NULL'); 

            $table->foreign('entladung_id')
                    ->references('id')->on('entladungs')
                    ->onDelete('SET NULL'); 
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
