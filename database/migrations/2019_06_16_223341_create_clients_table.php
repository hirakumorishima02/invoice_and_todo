<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('client_name'); //クライアント名
            $table->string('personnel'); //担当者
            $table->string('client_tel_number'); //TEL
            $table->text('client_address'); //住所
            $table->decimal('sales_tax_rate'); //消費税率
            $table->decimal('withholding_tax_rate'); //源泉徴収税率
            $table->integer('tax_category'); //税区分
            $table->integer('fraction'); //端数処理
            $table->timestamps();
            
            $table
            ->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }
    public function invoiceToClients() {
        return $this->hasMany('App\Invoice', 'client_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
