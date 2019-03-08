<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_group_id');
            $table->string('number');
            $table->string('name');
            $table->string('ROM');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration');
            $table->unsignedInteger('project_type_id');
            $table->unsignedInteger('office_id');
            $table->unsignedInteger('project_category_id');
            $table->text('description');
            $table->enum('timeline_type', ['1', '2']);
            $table->timestamps();

            $table->foreign('project_group_id')->references('id')->on('project_groups')->onDelete('cascade');
            $table->foreign('project_type_id')->references('id')->on('project_types')->onDelete('cascade');
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
            $table->foreign('project_category_id')->references('id')->on('project_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
