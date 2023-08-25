<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->boolean('active')->default(1);
            $table->boolean('code_tea_win')->default(0);
            $table->string('code_tea_win_discription')->nullable();
            $table->string('code_tea_win_date_delivery')->nullable();
            $table->boolean('code_main_win')->default(0);
            $table->string('code_main_win_discription')->nullable();
            $table->string('code_main_win_date_delivery')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codes');
    }
};
