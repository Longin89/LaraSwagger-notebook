<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('fio');
            $table->string('phone');
            $table->string('email');
            $table->string('company')->nullable();
            $table->date('birthday')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->index(['id']);

        });
    }

    public function down()
    {
        Schema::dropIfExists('notes');
    }
};
