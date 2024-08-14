<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_products', function (Blueprint $table) {
            $table->id();
            $table->string('receipt_no');

            $table->string('chemical_name');
            $table->string('supplier_name');
            $table->string('lot_no');
            $table->date('expiration_date');
            $table->date('received_on');
            $table->string('units');
            $table->decimal('amount_received', 10, 2); // Adjust precision as needed
            $table->decimal('amount_accepted', 10, 2); // Adjust precision as needed
            $table->string('received_by');
            $table->string('storage_location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_products');
    }
}
