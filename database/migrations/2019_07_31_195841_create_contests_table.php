<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name_one');
            $table->string('last_name_one');
            $table->string('first_name_two');
            $table->string('last_name_two');
            $table->string('email')->unique();
            $table->string('phone_no');
            $table->string('whatsApp_no');
            $table->date('anniversary_date');
            $table->string('couple_type');
            $table->string('state_of_res');
            $table->string('anniversary_month');
            $table->integer('contest_year')->nullable();
            $table->string('couple_picture');
            $table->integer('contest_fee');
            $table->string('receipt')->nullable();
            $table->string('reference')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('contests');
    }
}
