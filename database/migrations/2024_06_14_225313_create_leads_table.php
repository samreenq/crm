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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('annual_revenue',15,2)->nullable();
            $table->enum('source',['email','phone','contact_form','direct']);
            $table->enum('type',['new_business','existing_business']);
            $table->foreignId('contact_id')->nullable();
            $table->foreignId('organization_id')->nullable();
            $table->date('expected_close_date')->nullable();
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
        Schema::dropIfExists('leads');
    }
};
