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
    Schema::create('events', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description');
        $table->string('category'); // es: Creative, Sports, etc.
        $table->string('image');    // url o path
        $table->string('organizer');
        $table->integer('vibe_score')->default(0); // da 0 a 100
        $table->string('address');
        $table->timestamp('time');
        $table->timestamps();
    });
}
};
