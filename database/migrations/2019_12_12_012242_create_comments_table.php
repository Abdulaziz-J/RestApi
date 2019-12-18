<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');
            $table->timestamps();
            $table->bigInteger('user_id')->unsigned();
            
           // $table->bigInteger('trainee_id')->unsigned();
           // $table->bigInteger('trainer_id')->unsigned();
            $table->bigInteger('lesson_id')->unsigned();

            $table->string('iamge_name')->nullable();

            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');

          //  $table->foreign('trainer_id')->references('id')->on('trainers')
         //   ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('lesson_id')->references('id')->on('lessons')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
