<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoaPostingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_account', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('type');
            $table->integer('parent')->nullable();
            $table->timestamps();
        });
        Schema::create('coa', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_account_id');
            $table->integer('user_id');
            $table->integer('type');
            $table->string('code', 6)->unique();
            $table->string('name', 50);
            $table->integer('lod');
            $table->string('desc', 160);
            $table->string('vou', 6)->nullable()->unique();
            $table->timestamps();
        });
        Schema::create('period', function (Blueprint $table) {
            $table->string('begin', 6)->unique();
            $table->integer('status');
            $table->timestamps();
        });
        Schema::create('posting', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coa_id');
            $table->string('period_begin', 6);
            $table->float('balance', 10, 2); // max 1.000.000.000,00
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
        Schema::dropIfExists('group_account');
        Schema::dropIfExists('coa');
        Schema::dropIfExists('period');
        Schema::dropIfExists('posting');
    }
}
