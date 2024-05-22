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
        Schema::create('meetings_detail', function (Blueprint $table) {
            $table->id("md_id");
            $table->bigInteger('m_id')->unsigned()->index()->nullable();
            $table->foreign('m_id')->references('m_id')->on('meetings')->onDelete('cascade');
            $table->date("date");
            $table->string("timing");
            $table->integer("user_approval");
            $table->integer("admin_approval");
            $table->longText("message");
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
        Schema::dropIfExists('meetings_detail');
    }
};
