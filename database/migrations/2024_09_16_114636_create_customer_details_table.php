<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('customer_details', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('address')->nullable();
        $table->string('contact_number', 15)->nullable();
        $table->decimal('amount', 10, 2)->nullable();
        $table->date('date_of_purchase')->nullable();
        $table->date('renewal_date')->nullable();
        $table->string('day_of_purchase', 10)->nullable();
        $table->string('loan_number', 50)->nullable();
        $table->decimal('interest_percentage', 5, 2)->nullable();
        $table->decimal('gold_weight', 10, 2)->nullable();
        $table->decimal('silver_weight', 10, 2)->nullable();
        $table->integer('number_of_gold')->nullable();
        $table->integer('number_of_silver')->nullable();
        $table->decimal('gold', 10, 2)->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_details');
    }
};
