<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_requisition', function (Blueprint $table) {
            $table->increments('id');
            $table->text('custom_id')->nullable();
            $table->integer('staff_id')->unsigned()->nullable();
            $table->integer('project_id')->unsigned()->nullable();
            $table->integer('project_manager_id')->unsigned()->nullable();
            $table->text('description')->nullable();
            $table->double('ammount')->nullable();
            $table->double('paid')->nullable();
            $table->tinyInteger('status')->default('0')->nullable();
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
        Schema::dropIfExists('bill_tables');
    }
}
