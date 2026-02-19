<?php

use App\Models\User;
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
        Schema::create('study_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, "user_id")->constrained();
            $table->char('study_days_id', 100);
            $table->foreign('study_days_id')->references('study_days_id')->on('study_days')->onDelete('cascade');
            $table->string("title", 255);
            $table->text("description");
            $table->boolean("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_lists');
    }
};
