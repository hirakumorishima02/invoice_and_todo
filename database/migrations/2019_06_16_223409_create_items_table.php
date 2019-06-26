<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->integer('invoice_id')->unsigned()->nullable();
            $table->string('item_name'); //案件名
            $table->date('delivery_date'); //納期
            $table->decimal('unit_price'); //単価
            $table->integer('states'); //ステータス
            $table->text('memo'); //メモ
            $table->timestamps();
            
            $table
            ->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            
            $table
            ->foreign('client_id')
            ->references('id')
            ->on('clients')
            ->onDelete('cascade');            
            
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
        Schema::dropIfExists('items');
    }
}
