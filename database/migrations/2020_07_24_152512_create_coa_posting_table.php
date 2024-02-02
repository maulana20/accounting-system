<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoaPostingTable extends Migration
{
    public function up()
    {
        Schema::create('group_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->integer('type');
            $table->integer('parent')->nullable();
            $table->timestamps();
        });
        Schema::create('coas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_account_id');
            $table->integer('user_id');
            $table->integer('type');
            $table->string('code', 6)->unique();
            $table->string('name', 50);
            $table->integer('lod');
            $table->string('desc', 255);
            $table->string('vou', 6)->nullable()->unique();
            $table->timestamps();
        });
        Schema::create('periods', function (Blueprint $table) {
            $table->string('begin', 6)->unique();
            $table->integer('status');
            $table->timestamps();
        });
        Schema::create('postings', function (Blueprint $table) {
            $table->integer('coa_id');
            $table->string('period_begin', 6);
            $table->float('balance', 10, 2); // max 9.999.999.999,99
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('group_accounts');
        Schema::dropIfExists('coas');
        Schema::dropIfExists('periods');
        Schema::dropIfExists('postings');
    }
}
