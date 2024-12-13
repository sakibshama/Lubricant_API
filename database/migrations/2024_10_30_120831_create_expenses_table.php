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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expense_category_id')->constrained('expense_categories')->onDelete('cascade'); // Foreign key referencing expense_categories table
            $table->string('description')->nullable(); // Optional description of the expense
            $table->string('expenser_name'); // Name of the person making the expense
            $table->decimal('amount', 10, 2); // Expense amount
            $table->foreignId('payment_type_id')->constrained('payment_types')->onDelete('cascade'); // Foreign key referencing payment_types table
            $table->boolean('status')->default(1); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
