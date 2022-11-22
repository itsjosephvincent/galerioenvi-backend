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
        Schema::create('trainees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('training_certification_id')->unsigned();
            $table->string('name');
            $table->string('certificate_no');
            $table->date('training_date_from');
            $table->date('training_date_to');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('trainees', function (Blueprint $table) {
            $table->foreign('training_certification_id')->references('id')->on('training_certifications')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainees');
    }
};
