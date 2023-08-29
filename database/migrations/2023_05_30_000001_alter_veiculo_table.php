<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('veiculos', function (Blueprint $table) {
      $table->string('marca', 100)->default("Sem Marca")->change();
      $table->string('modelo', 100)->default("Sem Modelo")->change();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    //  Schema::dropIfExists('veiculos');
  }
};
