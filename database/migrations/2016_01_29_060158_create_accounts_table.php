<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 50);
            $table->string('password', 60);
            $table->unsignedInteger('game_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->softDeletes();
            $table->index('username');
            $table->index('game_id');
            $table->index('user_id');
            $table->unique(['username', 'game_id']);
            $table->unique(['user_id', 'game_id']);

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('game_id')->references('id')->on('games')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accounts');
    }
}
