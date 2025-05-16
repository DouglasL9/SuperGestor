<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivocontato_id');
        });

        DB::statement('update site_contatos set motivocontato_id = motivo_contato');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivocontato_id')->references('id')->on('motivocontatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivocontato_id_foreign');
        });

        DB::statement('update site_contatos set motivo_contato = motivocontato_id');

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivocontato_id');
        });
    }
};
