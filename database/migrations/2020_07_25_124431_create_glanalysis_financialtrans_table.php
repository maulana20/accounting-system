<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlanalysisFinancialtransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_trans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('period_begin', 6);
            $table->integer('type');
            $table->string('vou', 15);
            $table->timestamps();
        });
        Schema::create('gl_analyses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('financial_trans_id');
            $table->integer('coa_to');
            $table->integer('coa_from');
            $table->text('desc');
            $table->integer('position');
            $table->float('value', 10, 2);
            $table->timestamps();
        });
        Schema::create('general_cash_banks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('financial_trans_id');
            $table->integer('position');
            $table->timestamps();
        });
        Schema::create('inter_cash_banks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('financial_trans_out');
            $table->integer('financial_trans_in');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_trans');
        Schema::dropIfExists('gl_analyses');
        Schema::dropIfExists('general_cash_banks');
        Schema::dropIfExists('inter_cash_banks');
    }
}
