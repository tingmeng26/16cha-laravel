<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecord extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('records', function (Blueprint $table) {
      $table->engine = "InnoDB";
      $table->increments('id');
      $table->string('member_id')->comment('fk member id');
      $table->integer('day')->comment('第幾天');
      $table->integer('q1')->comment('q1 答案');
      $table->integer('q2')->comment('q2 答案');
      $table->integer('q3')->comment('q3 答案');
      $table->integer('q4')->comment('q4 答案');
      $table->integer('q5')->comment('q5 答案');
      $table->integer('q6')->comment('q6 答案');
      $table->integer('q7')->comment('q7 答案');
      $table->integer('q8')->comment('q8 答案');
      $table->text('experience')->comment('心得');
      $table->string('image')->comment('合照');
      $table->timestamps();
      $table->unique(['member_id','day']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('records');
  }
}
