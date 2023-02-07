<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillApprovalTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_approval_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bill_id')->unsigned()->nullable();
            $table->integer('approval_boss_id')->unsigned()->nullable();
            $table->integer('priority')->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->integer('status')->default('0');
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->datetime('created_at')->nullable();
            $table->datetime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_approval_tables');
    }
}
