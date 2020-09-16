<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('applicationid')->nullable();
            $table->integer('image_id')->index()->unsigned()->nullable();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
            $table->string('surname');
            $table->string('othernames');
            $table->integer('age');
            $table->boolean('health_issues')->default('0');
            $table->string('health_details')->nullable();
            $table->string('nationality');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->string('vital_state');
            $table->string('school_name');
            $table->string('school_class');
            $table->string('height');
            $table->string('bust')->nullable();
            $table->string('waist')->nullable();
            $table->string('hips')->nullable();

            $table->string('question1');
            $table->string('question2');
            $table->string('question3');
            $table->string('question4');
            $table->string('question5');

            $table->string('parent_surname');
            $table->string('parent_othernames');
            $table->string('parent_mobile');
            $table->string('parent_email');
            $table->string('parent_address')->nullable();

            $table->string('payment_details');

            $table->boolean('paid')->default('0');

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
        Schema::dropIfExists('applications');
    }
}
