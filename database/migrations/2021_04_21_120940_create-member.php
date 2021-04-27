<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMember extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('members', function (Blueprint $table) {
      $table->engine = "InnoDB";
      $table->string('id')->primary()->comment('fbid');
      $table->string('name')->comment('姓名');
      $table->string('picture')->comment('大頭照');
      $table->string('email')->comment('email');
      $table->integer('is_public')->default(1)->comment('是否啟用');
      $table->integer('day')->default(0)->comment('第幾天 若=0表示沒執行過  若為=6表示前5天已執行完畢，接下來的紀錄為第6天  若為99表示16天均已完成');
      $table->integer('is_continuous')->default(1)->comment('是否連續完成遊戲');
      $table->integer('is_qualified')->default(0)->comment('是否符合抽獎資格');
      $table->timestamp('form_at')->comment('表單填寫時間')->nullable();
      $table->date('record_at')->comment('最近一次打卡日期 YYYY-mm-dd')->nullable();
      $table->timestamp('login_at')->comment('最後登入時間')->nullable();
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
    Schema::dropIfExists('members');
  }
}
