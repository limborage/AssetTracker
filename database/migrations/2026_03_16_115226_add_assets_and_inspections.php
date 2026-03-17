<?php

use App\Models\Asset;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Enums\AssetStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('serial_number')->unique();
            $table->enum('status', array_column(AssetStatus::cases(), 'value'));
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable(true);
        });

        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Asset::class)->constrained();
            $table->string('inspector_name');
            $table->boolean('passed');
            $table->text('notes');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('assets');
        Schema::drop('inspections');
    }
};
