<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLockersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lockers', function (Blueprint $table) {
          Schema::enableForeignKeyConstraints();
            $table->bigIncrements('id');
            $table->string('type');
            $table->integer('number');
            $table->timestamps();
            $table->bigInteger('trainer_id')->unsigned(); //foreign key to trainer model
            $table->foreign('trainer_id')->references('id')->on('trainers')
            ->onDelete('cascade')->onUpdate('cascade'); // referential integrity constraint
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lockers');

    }
}
