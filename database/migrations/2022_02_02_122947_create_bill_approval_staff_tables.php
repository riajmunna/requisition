<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillApprovalStaffTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approval_boss_bill_requisition', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->unsigned()->nullable();
            $table->integer('approval_staff_id')->unsigned()->nullable();
            $table->integer('priority')->nullable();
            $table->tinyInteger('is_common_approval')->default('0')->nullable();
            $table->tinyInteger('status')->default('1')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_approval_staff_tables');
    }
}
