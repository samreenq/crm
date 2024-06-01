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
        Schema::create('organizatin', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('type',['corporation','business','technology','healthcare','education','retailer','service_provider'])->default('corporation');
            $table->string('email')->unique();
            $table->string('phone',50)->unique()->nullable();
            $table->text('address')->nullable();
            $table->text('profile_link')->nullable();
            $table->integer('no_of_employees')->nullable();
            $table->decimal('annual_revenue',15,2)->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizatin');
    }
};
