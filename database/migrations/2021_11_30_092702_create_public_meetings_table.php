<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicMeetingsTable extends Migration
{
    public function up()
    {
        Schema::create('public_meetings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->dateTime('start_at');
            $table->dateTime('end_at');

            $table->foreignId('chairman_id')->nullable()->constrained('users');
            $table->foreignId('wt_leader_id')->nullable()->constrained('users');
            $table->foreignId('wt_reader_id')->nullable()->constrained('users');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('public_meetings');
    }
}
