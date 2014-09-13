<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration {
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('token')->default('');
                $table->timestamps();
            }
        );
    }

    public function down()
    {
        Schema::drop('stores');
    }
}
