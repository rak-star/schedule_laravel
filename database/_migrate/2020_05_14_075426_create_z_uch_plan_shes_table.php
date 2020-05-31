<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZUchPlanShesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('z_uch_plan_sh', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('ymk_branches');
            $table->string('branch_name');
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('ymk_groups');
            $table->string('group_name');
            $table->string('kod_plan');
            $table->string('program');
            $table->string('po_spec');
            $table->string('kod_spec');
            $table->string('name_spec');
            $table->string('qualification');
            $table->string('form_train');
            $table->string('development');
            $table->string('baza');
            $table->integer('year');
            $table->string('form_dir');
            $table->string('name_dir');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('z_uch_plan_she');
    }
}
