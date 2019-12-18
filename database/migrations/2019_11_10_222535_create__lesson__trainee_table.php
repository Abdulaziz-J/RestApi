<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonTraineeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson__trainee', function (Blueprint $table) {
            //$table->bigIncrements('id');  // not need it
            $table->primary(['lesson_id','trainee_id']); //composite key
            $table->bigInteger('lesson_id')->unsigned();
            $table->bigInteger('trainee_id')->unsigned();
            $table->timestamps();

            $table->foreign('lesson_id')->references('id')->on('lessons')
            ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('trainee_id')->references('id')->on('trainees')
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
        Schema::dropIfExists('lesson__trainee');
    }
}
