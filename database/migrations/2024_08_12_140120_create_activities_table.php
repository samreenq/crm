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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type',['notes','call','email','meeting'])->default('notes');
            $table->string('subject');
            $table->text('description')->nullable();
            $table->date('date_time')->nullable();
            $table->foreignId('contact_id')->nullable();
            $table->foreignId('organization_id')->nullable();
            $table->enum('priority',['low','medium','high'])->default('low');
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

             // indexes
             $table->index('contact_id');
             $table->index('organization_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
};
