<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tenant_type_id');
            $table->date('start_date');
            $table->string('domain_id');
            $table->string('status');
            $table->timestamps();

            $table->foreign('tenant_type_id')->references('id')->on('tenant_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenant_details');
    }
}
