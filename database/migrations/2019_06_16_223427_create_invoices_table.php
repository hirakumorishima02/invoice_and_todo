<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->decimal('subtotal'); //小計
            $table->decimal('withholding_tax'); //源泉徴収額
            $table->decimal('tax_amount'); //税額
            $table->decimal('sum_price'); //合計
            $table->string('billing_name'); //請求宛先名称
            $table->string('invoice_title'); //請求書のタイトル
            $table->text('billing_address'); //請求先住所
            $table->text('invoice_message'); //メッセージ
            $table->date('payment_day'); //お支払い期限
            $table->date('billing_day'); //請求日
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
