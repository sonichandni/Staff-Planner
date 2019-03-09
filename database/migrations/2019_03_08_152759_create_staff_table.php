<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('prefered_name');
            $table->string('email');
            $table->integer('phone_1');
            $table->string('phone_1_type');
            $table->integer('phone_2');
            $table->string('phone_2_type');
            $table->string('home_city');
            $table->string('home_state');
            $table->integer('home_zip');
            $table->char('certification',1);
            $table->char('trainning',1);
            $table->string('photo');
            $table->unsignedInteger('staff_role_id');
            $table->unsignedInteger('staff_group_id');
            $table->unsignedInteger('staff_status_id');
            $table->unsignedInteger('office_id');
            $table->date('employment_start_date');
            $table->timestamps();

            $table->foreign('staff_role_id')->references('id')->on('staff_roles')->onDelete('cascade');
            $table->foreign('staff_group_id')->references('id')->on('staff_groups')->onDelete('cascade');
            $table->foreign('staff_status_id')->references('id')->on('staff_statuses')->onDelete('cascade');
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
