<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');



            //General
            $table->string('model');
            $table->string('brand');
            $table->string('announced_year')->nullable();
            $table->string('produced_year')->nullable();


            //Storage
            $table->unsignedInteger('storage')->nullable(); // 1, 2, 4, 8, 16, 32, 64, 128, 256, 512, 1024, 2048.
            $table->decimal('storage_version', 5, 2)->nullable(); // UFS:         2.1, 3.1, 4.1
            $table->unsignedInteger('ram')->nullable(); //just ram
            $table->string('ram_version')->nullable(); // ram version LPDDR: 4, 5...
            $table->boolean('is_support_micro_sd')->default(false);

            //Camera(back)
            $table->boolean('has_camera')->default(false);

            //first_camera
            $table->enum('first_camera', ['main', 'macro', 'depth', 'telephoto', 'telephoto-periscope', 'periscope', 'ultra-wide'])->nullable();
            $table->string('first_camera_sensor_model')->nullable();
            $table->decimal('first_camera_sensor_size', 5, 2)->nullable();
            $table->integer('first_camera_sensor_MP_value')->nullable();
            $table->enum('first_camera_has_eis_or_ois', ['none', 'both', 'OIS', 'EIS'])->default('none');
            $table->string('first_camera_video_recording')->nullable();
            $table->string('first_camera_optical_zoom')->nullable();
            $table->string('first_camera_special_feature')->nullable();
            $table->string('first_camera_special_sign')->nullable();




            //second_camera
            $table->boolean('has_second_camera')->default(false);
            $table->enum('second_camera', ['main', 'macro', 'depth', 'telephoto', 'telephoto-periscope', 'periscope', 'ultra-wide'])->nullable();
            $table->string('second_camera_sensor_model')->nullable();
            $table->decimal('second_camera_sensor_size', 5, 2)->nullable();
            $table->integer('second_camera_sensor_MP_value')->nullable();
            $table->enum('second_camera_has_eis_or_ois', ['none', 'both', 'OIS', 'EIS'])->default('none');
            $table->string('second_camera_video_recording')->nullable();
            $table->string('second_camera_optical_zoom')->nullable();
            $table->string('second_camera_special_feature')->nullable();
            $table->string('second_camera_special_sign')->nullable();



            //third_camera
            $table->boolean('has_third_camera')->default(false);
            $table->enum('third_camera', ['main', 'macro', 'depth', 'telephoto', 'telephoto-periscope', 'periscope', 'ultra-wide'])->nullable();
            $table->string('third_camera_sensor_model')->nullable();
            $table->decimal('third_camera_sensor_size', 5, 2)->nullable();
            $table->integer('third_camera_sensor_MP_value')->nullable();
            $table->enum('third_camera_has_eis_or_ois', ['none', 'both', 'OIS', 'EIS'])->default('none');
            $table->string('third_camera_video_recording')->nullable();
            $table->string('third_camera_optical_zoom')->nullable();
            $table->string('third_camera_special_feature')->nullable();
            $table->string('third_camera_special_sign')->nullable();




            //fourth_camera
            $table->boolean('has_fourth_camera')->default(false);
            $table->enum('fourth_camera', ['main', 'macro', 'depth', 'telephoto', 'telephoto-periscope', 'periscope', 'ultra-wide'])->nullable();
            $table->string('fourth_camera_sensor_model')->nullable();
            $table->decimal('fourth_camera_sensor_size', 5, 2)->nullable();
            $table->integer('fourth_camera_sensor_MP_value')->nullable();
            $table->enum('fourth_camera_has_eis_or_ois', ['none', 'both', 'OIS', 'EIS'])->default('none');
            $table->string('fourth_camera_video_recording')->nullable();
            $table->string('fourth_camera_optical_zoom')->nullable();
            $table->string('fourth_camera_special_feature')->nullable();
            $table->string('fourth_camera_special_sign')->nullable();




            //fifth_camera
            $table->boolean('has_fifth_camera')->default(false);
            $table->enum('fifth_camera', ['main', 'macro', 'depth', 'telephoto', 'telephoto-periscope', 'periscope', 'ultra-wide'])->nullable();
            $table->string('fifth_camera_sensor_model')->nullable();
            $table->decimal('fifth_camera_sensor_size', 5, 2)->nullable();
            $table->integer('fifth_camera_sensor_MP_value')->nullable();
            $table->enum('fifth_camera_has_eis_or_ois', ['none', 'both', 'OIS', 'EIS'])->default('none');
            $table->string('fifth_camera_video_recording')->nullable();
            $table->string('fifth_camera_optical_zoom')->nullable();
            $table->string('fifth_camera_special_feature')->nullable();
            $table->string('fifth_camera_special_sign')->nullable();





            //Camera(front)

            //first camera
            $table->boolean('has_front_camera')->default(false);
            $table->enum('first_front_camera', ['main', 'macro', 'depth', 'telephoto', 'ultra-wide'])->nullable();
            $table->string('first_front_camera_sensor_model')->nullable();
            $table->decimal('first_front_camera_sensor_size', 5, 2)->nullable();
            $table->integer('first_front_camera_sensor_MP_value')->nullable();
            $table->enum('first_front_has_eis_or_ois', ['none', 'both', 'OIS', 'EIS'])->default('none');
            $table->string('first_video_recording')->nullable();
            $table->string('first_optical_zoom')->nullable();
            $table->string('first_special_feature')->nullable();


            //second camera
            $table->boolean('has_second_front_camera')->default(false);
            $table->enum('second_front_camera', ['main', 'macro', 'depth', 'telephoto', 'ultra-wide'])->nullable();
            $table->string('second_front_camera_sensor_model')->nullable();
            $table->decimal('second_front_camera_sensor_size', 5, 2)->nullable();
            $table->integer('second_front_camera_sensor_MP_value')->nullable();
            $table->enum('second_front_has_eis_or_ois', ['none', 'both', 'OIS', 'EIS'])->default('none');
            $table->string('second_video_recording')->nullable();
            $table->string('second_optical_zoom')->nullable();
            $table->string('second_special_feature')->nullable();



            //Sound system
            $table->boolean('has_speaker')->default(false);
            $table->enum('speaker_type', ['mono', 'stereo', 'unidentified'])->default('mono');
            $table->string('special_sign')->nullable();
            $table->boolean('loudspeaker')->default(false);


            //Carging/battery
            $table->enum('charging_socket_type', ['type-c', 'micro', 'lightning'])->default('type-c');
            $table->integer('charging_speed')->nullable();
            $table->boolean('has_wireless')->default(false);
            $table->integer('wireless_charging_speed')->nullable();
            $table->boolean('has_reverse_wired')->default(false);
            $table->integer('reverse_charging_speed')->nullable();
            $table->boolean('has_reverse_wireless')->default(false);
            $table->integer('reverse_wireless_charging_speed')->nullable();
            $table->integer('charging_time_full')->nullable(); // ...minutes
            $table->float('usb_charging_version')->nullable(); // USB: 2.1, 3.1...
            $table->integer('battery_capacity')->nullable(); // e.g., 5000





            //display
            $table->enum('screen_type', [
                'amoled',
                'ips-lcd',
                'oled',
                'super-amoled',
                'dynamic-amoled'
            ])->default('amoled');
            $table->string('screen_resolution')->nullable();
            $table->integer('screen_refresh_rate')->nullable();
            $table->string('has_special_feature')->nullable();
            $table->integer('max_brightness')->nullable();
            $table->string('screen_to_body_ratio')->nullable();
            $table->string('screen_size')->nullable();
            $table->string('screen_protection')->nullable();






            // Body
            $table->string('dimensions')->nullable();      // e.g., "161.4 x 73.3 x 7.9 mm"
            $table->string('weight')->nullable();          // e.g., "178 g"
            $table->float('thickness')->nullable();          // 
            $table->string('build_material')->nullable();  // e.g., "Glass front, Gorilla Glass 5 back"
            $table->string('sim_type')->nullable();        // e.g., "Dual SIM (Nano-SIM, dual stand-by)"
            $table->integer('protection_rating')->nullable(); // e.g. IP: 53, 54, 68, 69...



            // Secondary Display (For Folds, Flips, and Back Displays)
            $table->boolean('has_secondary_display')->default(false);
            $table->enum('second_screen_type', [
                'amoled',
                'ips-lcd',
                'oled',
                'super-amoled',
                'dynamic-amoled',
                'e-ink'
            ])->nullable();
            $table->string('second_screen_resolution')->nullable();
            $table->integer('second_screen_refresh_rate')->nullable();
            $table->string('second_screen_size')->nullable(); // e.g., "6.2 inches" or "1.1 inches" for back displays
            $table->integer('second_max_brightness')->nullable();
            $table->enum('second_screen_location', ['front', 'back', 'inside'])->nullable();
            // 'inside' for the main fold screen, 'front' for the cover screen, 'back' for Xiaomi-style small screens


            // Chips
            $table->string('CPU_model')->nullable();
            $table->string('GPU_model')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
