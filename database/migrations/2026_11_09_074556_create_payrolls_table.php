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
    Schema::create('payrolls', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->integer('period_month');
        $table->year('period_year');
        $table->integer('base_salary');
        $table->integer('deduction_days')->default(0); // Jumlah hari potongan
        $table->integer('deduction_per_day')->default(40000); // Potongan Rp40.000 per hari
        $table->integer('total_deduction')->default(0);
        $table->integer('net_salary');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
