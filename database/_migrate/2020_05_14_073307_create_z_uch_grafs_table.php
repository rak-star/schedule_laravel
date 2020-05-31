<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZUchGrafsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('z_uch_graf', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id')->references('id')->on('ymk_branches');
            $table->string('branch_name');
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('ymk_groups');
            $table->string('group_name');
            $table->integer('kurs');
            $table->string('1');
            $table->string('2');
            $table->string('3');
            $table->string('4');
            $table->string('5');
            $table->string('6');
            $table->string('7');
            $table->string('8');
            $table->string('9');
            $table->string('10');
            $table->string('11');
            $table->string('12');
            $table->string('13');
            $table->string('14');
            $table->string('15');
            $table->string('16');
            $table->string('17');
            $table->string('18');
            $table->string('19');
            $table->string('20');
            $table->string('21');
            $table->string('22');
            $table->string('23');
            $table->string('24');
            $table->string('25');
            $table->string('26');
            $table->string('27');
            $table->string('28');
            $table->string('29');
            $table->string('30');
            $table->string('31');
            $table->string('32');
            $table->string('33');
            $table->string('34');
            $table->string('35');
            $table->string('36');
            $table->string('37');
            $table->string('38');
            $table->string('39');
            $table->string('40');
            $table->string('41');
            $table->string('42');
            $table->string('43');
            $table->string('44');
            $table->string('45');
            $table->string('46');
            $table->string('47');
            $table->string('48');
            $table->string('49');
            $table->string('50');
            $table->string('51');
            $table->string('52');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('z_uch_graf');
    }
}
