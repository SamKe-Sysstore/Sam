<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website', function (Blueprint $table) {
			$table->increments('id');    // �۰ʻ��W�۷�� UNSIGNED INTEGER�]�D��^���
			$table->string('title');     // �۷�� VARCHAR ���
			$table->string('subtitle');
			$table->string('footer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website');
    }
}
