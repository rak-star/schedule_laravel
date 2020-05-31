<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYmkTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ymk_teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->string('branch_name');
            $table->unsignedBigInteger('group_id');
            $table->string('group_name');
            $table->string('name');
            $table->string('fullname');
            $table->string('short_name');
            $table->unsignedBigInteger('kabinet_id');
            $table->string('kabinet_name');
            $table->string('k_m')->nullable();
            $table->string('number_phone')->nullable();
            $table->string('email')->nullable();
            $table->boolean('status')->default(true);
            $table->foreign('branch_id')->references('id')->on('ymk_branches');
            $table->foreign('group_id')->references('id')->on('ymk_groups');
            $table->foreign('kabinet_id')->references('id')->on('ymk_kabinets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ymk_teachers');
    }
}
