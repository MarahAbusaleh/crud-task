<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');

            $table->unsignedBigInteger('company_id');

            $table->foreign('company_id')
                ->on('companies')
                ->references('id')
                ->onDelete('CASCADE');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
