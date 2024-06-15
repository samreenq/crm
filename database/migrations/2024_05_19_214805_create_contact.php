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
        Schema::create('contacts', function (Blueprint $table) {
            //
            $table->id();
            $table->string('name',100)->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('organization_id')->nullable();
            $table->enum('gender',['male','female'])->default('male');
            $table->date('date_of_birth')->nullable();
            $table->text('address')->nullable();
            $table->int('country_id')->nullable();
            $table->int('city_id')->nullable();
            $table->int('state_id')->nullable();
            $table->string('zipcode',100)->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);

            // indexes
            $table->index('user_id');
            $table->index('organization_id');
            $table->index('city_id');
            $table->index('state_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
