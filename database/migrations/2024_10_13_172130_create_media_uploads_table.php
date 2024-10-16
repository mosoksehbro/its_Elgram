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
        
        
        Schema::create('media_uploads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // untuk menghubungkan dengan pengguna
            $table->string('file_path'); // menyimpan path file yang diupload
            $table->string('file_type'); // untuk tipe file (image atau video)
            $table->text('caption')->nullable(); // caption yang diisi pengguna
            $table->timestamps();
            
            // Foreign key constraint untuk id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_uploads');
    }
};
