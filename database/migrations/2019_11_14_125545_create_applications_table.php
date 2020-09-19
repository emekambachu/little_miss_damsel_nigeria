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
        Schema::create('applications', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('application_id')->nullable();
            $table->string('image')->nullable();
            $table->string('surname');
            $table->string('other_names');
            $table->integer('age');
            $table->boolean('health_issues')->default('0');
            $table->string('health_details')->nullable();
            $table->string('country');
            $table->string('state');
            $table->string('city')->nullable();
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
            $table->string('parent_other_names');
            $table->string('parent_mobile');
            $table->string('parent_email');
            $table->string('parent_address')->nullable();

            $table->string('payment_details');

            $table->boolean('paid')->default('0');

            $table->timestamps();
            $table->softDeletes(); // Deleted at
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
