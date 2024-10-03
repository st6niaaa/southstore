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
        Schema::create('business', function (Blueprint $table) {
            $table->id();
            $table->longtext('corporate_reason')->nullable();
            $table->longtext('name');
            $table->longtext('cnpj');
            $table->longtext('legal_nature')->nullable();
            $table->longtext('opening_date')->nullable();
            $table->longtext('CNAE')->nullable();
            $table->longtext('social_capital')->nullable();
            $table->longtext('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business');
    }
};
