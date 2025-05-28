<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('interactions', function (Blueprint $table) {
            $table->id();
            $table->string('session_id');
            $table->string('event'); // e.g., "party_selected", "download_clicked"
            $table->json('details')->nullable(); // optional context: { partyId: 3, view: "comparison" }
            $table->timestamp('event_time')->useCurrent();
        });
    }

    public function down(): void {
        Schema::dropIfExists('interactions');
    }
};