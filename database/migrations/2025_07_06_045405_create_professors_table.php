<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('اسم الأستاذ');
            $table->string('status')->default('active')->comment('حالة الأستاذ (نشط/غير نشط)');
            $table->string('image')->nullable()->comment('صورة الأستاذ');
            $table->string('country')->nullable()->comment('دولة الأستاذ');
            $table->string('phone')->nullable()->comment('رقم هاتف الأستاذ');
            $table->text('address')->nullable()->comment('عنوان الأستاذ');
            $table->text('notes')->nullable()->comment('ملاحظات حول الأستاذ');
            $table->string('email')->unique()->comment('البريد الإلكتروني للأستاذ');
            $table->string('password')->comment('كلمة مرور الأستاذ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professors');
    }
};
