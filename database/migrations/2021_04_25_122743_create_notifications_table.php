<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->timestamps();
            $table->increments('id');
            $table->integer('type');
            $table->integer('notification_for');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('text')->nullable();
            $table->text('meta')->nullable();
            $table->timestamp('read_at')->nullable();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
