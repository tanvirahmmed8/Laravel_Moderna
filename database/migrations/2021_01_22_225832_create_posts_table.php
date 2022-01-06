<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('tittle');
            $table->string('slug');
            $table->string('post_image');
            $table->string('post_video');
            $table->longText('post_body')->default('Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi,
             id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper 
             laoreet perfecto ad qui, est rebum nulla argumentum ei.');
            $table->string('status')->default(1); 
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
