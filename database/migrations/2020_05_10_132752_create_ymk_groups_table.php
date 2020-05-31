<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYmkGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ymk_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->string('branch_name');
            $table->integer('kurs');
            $table->string('name');
            $table->string('short_name');
            $table->string('uch_plan');
            $table->string('kod_group');
            $table->string('name_group');
            $table->integer('display_order');
            $table->boolean('status')->default(true);
            $table->foreign('branch_id')->references('id')->on('ymk_branches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ymk_groups');
    }
}
