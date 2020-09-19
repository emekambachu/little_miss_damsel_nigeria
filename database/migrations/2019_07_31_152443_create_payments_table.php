<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('contestant_id')->index()->unsigned()->nullable();
            $table->string('email');
            $table->string('accname');
            $table->string('accnum')->nullable();
            $table->string('bank')->nullable();
            $table->integer('amount');
            $table->integer('votes');
            $table->string('payment_method');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('payments');
    }
}
