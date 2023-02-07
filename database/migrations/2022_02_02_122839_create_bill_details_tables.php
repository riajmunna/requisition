<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillDetailsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_requisition_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bill_id')->unsigned()->nullable();
            $table->integer('item_id')->unsigned()->nullable();
            $table->string('quantity')->nullable();
            $table->text('description')->nullable();
            $table->double('item_cost')->nullable();
            $table->double('total_cost')->nullable();
            $table->double('paid')->nullable();
            $table->tinyInteger('status')->default('1')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_details_tables');
    }
}
