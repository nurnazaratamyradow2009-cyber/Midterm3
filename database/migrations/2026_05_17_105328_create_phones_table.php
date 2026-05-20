<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');

            // General & Identity
            $table->string('model');
            $table->string('brand');
            $table->string('processor')->nullable();

            // Display
            $table->integer('screen_refresh_rate')->nullable();

            // Camera Counts
            $table->unsignedInteger('back_camera_count')->default(0);
            $table->unsignedInteger('front_camera_count')->default(0);

            // Back Cameras
            $table->integer('first_camera_mp')->nullable();
            $table->integer('second_camera_mp')->nullable();
            $table->integer('third_camera_mp')->nullable();
            $table->integer('fourth_camera_mp')->nullable();
            $table->integer('fifth_camera_mp')->nullable();

            // Front Cameras
            $table->integer('first_front_camera_mp')->nullable();
            $table->integer('second_front_camera_mp')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};