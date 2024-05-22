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
        Schema::create('paid_users', function (Blueprint $table) {
            $table->id('paid_id');
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('plan_id')->unsigned()->index()->nullable();
            $table->foreign('plan_id')->references('plan_id')->on('plans')->onDelete('cascade');
            $table->bigInteger('s_plan_id')->unsigned()->index()->nullable();
            $table->foreign('s_plan_id')->references('s_plan_id')->on('sub_plans')->onDelete('cascade');
            $table->longtext('sub_id');
            $table->longtext('customer_id');
            $table->date("subscribed_date");
            $table->bigInteger('invoice_id')->unsigned()->index()->nullable();
            $table->foreign('invoice_id')->references('invoice_id')->on('invoices')->onDelete('cascade');
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
        Schema::dropIfExists('paid_users');
    }
};
