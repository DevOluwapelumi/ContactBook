<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_table', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('full_name');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->text('address')->nullable();
            $table->string('password');
            $table->string('user_profile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_table');
    }
}
