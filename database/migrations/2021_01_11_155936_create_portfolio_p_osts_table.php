<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioPOstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_p_osts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categories_work_id')->constrained('categories_works')->
            onDelete('cascade');
            $table->string('tittle');
            $table->longText('description');
            $table->string('portfolio_img');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('portfolio_p_osts');
    }
}
