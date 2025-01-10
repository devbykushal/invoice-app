<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->decimal('payment_amount', 10, 2); // Amount paid in the transaction
            $table->timestamp('payment_date')->nullable(); // Payment date
            $table->enum('payment_method', ['cash', 'credit_card', 'bank_transfer', 'paypal', 'stripe'])->nullable(); // Optional payment method (Cash, Credit Card, etc.)
            $table->text('remarks')->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
