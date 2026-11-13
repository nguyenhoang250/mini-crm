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
        Schema::create('khach_hang', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('email')->nullable()->index();
            $table->string('so_dien_thoai', 20)->nullable()->index();
            $table->string('dia_chi', 500)->nullable();
            $table->text('ghi_chu')->nullable();
            $table->foreignId('nhan_vien_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('khach_hang');
    }
};
