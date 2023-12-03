<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seed_type_id');
            $table->string('name');
            $table->string('water_requirement')->nullable();
            $table->text('description')->nullable();
            $table->text('seed_specification')->nullable();
            $table->text('seed_care')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('seed_type_id')->references('id')->on('seed_types')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seeds');
    }
}
