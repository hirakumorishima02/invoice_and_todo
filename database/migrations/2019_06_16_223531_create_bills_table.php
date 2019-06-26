<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('invoice_id')->unsigned();
            $table->string('billing_item'); //請求項目名称
            $table->string('unit'); //単位
            $table->integer('quantity'); //数量
            $table->decimal('bill_unit_price'); //単価
            $table->timestamps();
            
            $table
            ->foreign('invoice_id')
            ->references('id')
            ->on('invoices')
            ->onDelete('cascade');
        });
    }
    public function invoice() {
        return $this->belongsTo('App\Invoice','invoice_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
