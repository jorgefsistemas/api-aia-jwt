<?php

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use SoftDeletes;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('marca')->required();
            $table->string('modelo')->required();
            $table->integer('anio')->required();
            $table->integer('precio')->required();
            $table->integer('kilometraje')->required();
            $table->string('color');
            $table->string('email')->required();
            $table->string('telefono')->required();
            $table->string('fotografia');
            $table->string('ruta')->required();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autos');
    }
};
