<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('title');
                $table->string('image');
                $table->boolean('status');
                $table->string('slug');
                $table->string('description');
                $table->timestamps();
        });
    }

};
