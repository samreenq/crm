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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('invoice_id');
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('plan_id')->unsigned()->index()->nullable();
            $table->foreign('plan_id')->references('plan_id')->on('plans')->onDelete('cascade');
            $table->bigInteger('s_plan_id')->unsigned()->index()->nullable();
            $table->foreign('s_plan_id')->references('s_plan_id')->on('sub_plans')->onDelete('cascade');
            $table->string("invoice_plan");
            $table->string("invoice_package");
            $table->integer("invoice_amount");
            $table->string("invoice_currency");
            $table->longText("invoice_desc");
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
        Schema::dropIfExists('invoices');
    }
};
