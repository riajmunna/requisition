<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvanceApprovalTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advance_approval_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('advance_id')->unsigned()->nullable();
            $table->integer('approval_boss_id')->unsigned()->nullable();
            $table->integer('priority')->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->integer('status')->default('0');
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->datetime('created_at')->nullable();
            $table->datetime('updated_at')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advance_approval_tables');
    }
}
