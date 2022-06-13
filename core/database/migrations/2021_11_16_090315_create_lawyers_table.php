<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLawyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyers', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("fullname");
            $table->string("email");
            $table->string("password");
            $table->string("phone");
            $table->text("address");
            $table->string("image");
            $table->integer("finished_cases");
            $table->float("rating");
            $table->text("api_token")->unique()->nullable()->default(null);
            $table->integer("otp");
            $table->string("resettime");
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
        Schema::dropIfExists('lawyers');
    }
}
