<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceMetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_metrics', function (Blueprint $table) {
            $table->id();
            $table->integer('model_id');
            $table->integer('test_id');
            $table->integer('step_id');
            $table->text('value');
            $table->integer('start_time');
            $table->integer('end_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performance_metrics');
    }
}
