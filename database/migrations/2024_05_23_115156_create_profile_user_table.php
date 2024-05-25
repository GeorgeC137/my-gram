<?php

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profile_user', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Profile::class, 'profile_id');
            $table->foreignIdFor(User::class, 'user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_user');
    }
};
