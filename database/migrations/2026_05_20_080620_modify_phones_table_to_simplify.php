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
        Schema::table('phones', function (Blueprint $table) {
            // Drop all old unnecessary columns
            $table->dropColumn([
                'announced_year',
                'produced_year',
                'storage',
                'storage_version',
                'ram',
                'ram_version',
                'is_support_micro_sd',
                'has_camera',
                'first_camera_sensor_MP_value',
                'first_camera',
                'screen_type',
                'battery_capacity',
                'charging_speed',
                'brand', // keep brand_id instead
            ]);

            // Add the new simplified columns
            $table->integer('camera_count')->default(0);
            $table->json('camera_mp_values')->nullable(); // Stores [50, 12, 5]
            $table->integer('screen_refresh_rate')->nullable();
            $table->string('processor')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('simplify', function (Blueprint $table) {
            //
        });
    }
};
