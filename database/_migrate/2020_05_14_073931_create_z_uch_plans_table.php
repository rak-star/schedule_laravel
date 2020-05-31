<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZUchPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('z_uch_plan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('ymk_branches');
            $table->string('branch_name');
            $table->integer('stroka')->default(null);
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('ymk_groups');
            $table->string('group_name');
            $table->string('kod_predmet');
            $table->string('name_predmet');
            $table->string('kontrol1');
            $table->string('kontrol2');
            $table->string('kontrol3');
            $table->string('kontrol4');
            $table->string('kontrol5');
            $table->string('kontrol6');
            $table->string('kontrol7');
            $table->string('kontrol8');
            $table->string('kontrol9');
            $table->string('kontrol10');
            $table->string('samrab');
            $table->string('kursproekt')->default(null);
            $table->string('theory1')->default(null);
            $table->string('laborat1')->default(null);
            $table->string('theory2')->default(null);
            $table->string('laborat2')->default(null);
            $table->string('theory3')->default(null);
            $table->string('laborat3')->default(null);
            $table->string('theory4')->default(null);
            $table->string('laborat4')->default(null);
            $table->string('theory5')->default(null);
            $table->string('laborat5')->default(null);
            $table->string('theory6')->default(null);
            $table->string('laborat6')->default(null);
            $table->string('theory7')->default(null);
            $table->string('laborat7')->default(null);
            $table->string('theory8')->default(null);
            $table->string('laborat8')->default(null);
            $table->string('theory9')->default(null);
            $table->string('laborat9')->default(null);
            $table->string('theory10')->default(null);
            $table->string('laborat10')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('z_uch_plan');
    }
}
