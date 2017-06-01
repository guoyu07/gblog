<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email', 20)->unique();
            $table->string('mobile', 11)->nullable()->unique();
            $table->string('home_url', 50)->nullable()->index();
            $table->string('avatar', 200)->nullable()->index();
            $table->string('work_type', 100)->nullable()->index();
            $table->string('password', 200);

            $table->integer('github_id')->nullable()->index();
            $table->string('wechat_openid')->nullable()->index();
            $table->string('wechat_unionid')->nullable()->index();
            $table->string('weibo_id')->nullable()->index();
            $table->string('register_source')->nullable()->index();
            $table->string('company')->nullable();
            
            $table->timestamp('last_actived_at')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
