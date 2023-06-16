<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_user_role', function (Blueprint $table) {
            $table->id('id_user_role');
            $table->unsignedBigInteger('id_user')->index();
            $table->unsignedBigInteger('id_role')->index();
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('tbl_user')->onDelete('cascade');
            $table->foreign('id_role')->references('id_role')->on('tbl_role')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_user_role');
    }
};
