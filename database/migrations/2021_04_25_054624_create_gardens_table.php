<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGardensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gardens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('garden_type_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('garden_care')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('garden_type_id')->references('id')->on('garden_types')
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
        Schema::dropIfExists('gardens');
    }
}
