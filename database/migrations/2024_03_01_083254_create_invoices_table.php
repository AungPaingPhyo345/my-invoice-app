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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('phone');
            $table->string('address');
            $table->decimal('user_defined_discount', 10, 2);
            $table->decimal('total_amount', 10, 2); 
            $table->date('due_date');
            $table->enum('status', ['draft', 'sent', 'paid', 'overdue']); // Use enum for better data integrity
            $table->string('invoice_number')->unique();
            $table->string('payment_method')->nullable();
            $table->string('image')->nullable(); // Use nullable for optional uploads
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
