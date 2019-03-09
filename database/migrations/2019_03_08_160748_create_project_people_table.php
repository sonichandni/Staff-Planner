<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_peoples', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('staff_id');
            $table->unsignedInteger('project_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->float('allocation',8,2);
            $table->unsignedInteger('staff_role_id');
            $table->integer('assignment_duration');
            $table->char('confirmed',1);
            $table->date('next_available');
            $table->enum('resume_submited',['0','1']);
            $table->string('experience_id');
            $table->timestamps();

            $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('staff_role_id')->references('id')->on('staff_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_people');
    }
}
