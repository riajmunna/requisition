<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advance_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('requisition_id');
            $table->integer('site_id');
            $table->integer('customer_id');
            $table->double('amount');
            $table->text('description');
            $table->tinyInteger('status')->default(0)->comment('0 = pending ; 1 = approved');
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
        Schema::dropIfExists('advance_histories');
    }
};
