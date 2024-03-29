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
        ///دا table عشان اعرف منه مين شاف الرساله دي ولا لا
        Schema::create('recipients', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('message_id')->constrained('messages')->cascadeOnDelete();
            $table->timestamp('read_at')->nullable();
            $table->softDeletes(); ////في حالة ان  مستخدم مش صاحب الرساله حذف الرساله من عنده هو
            $table->primary(['user_id','message_id']);  ////الuserID مع الmessageID هيكونو primary key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipients');
    }
};
