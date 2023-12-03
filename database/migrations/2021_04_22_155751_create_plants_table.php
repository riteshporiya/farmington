<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plant_type_id');
            $table->unsignedBigInteger('plant_use_id');
            $table->string('name');
            $table->string('size')->nullable();
            $table->string('water_requirement')->nullable();
            $table->string('color')->nullable();
            $table->text('description')->nullable();
            $table->text('plant_specification')->nullable();
            $table->text('plant_care')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('plant_type_id')->references('id')->on('plant_types')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('plant_use_id')->references('id')->on('plant_uses')
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
        Schema::dropIfExists('plants');
    }
}
