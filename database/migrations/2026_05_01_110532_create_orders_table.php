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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('client_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('restaurant_table_id')->constrained('restaurant_tables')->onDelete('cascade');
            $table->decimal('total_price', 8, 2);
            $table->enum('status', ['Pending', 'In Progress', 'Completed', 'Cancelled'])->default('Pending');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
