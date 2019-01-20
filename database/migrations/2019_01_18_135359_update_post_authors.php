<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePostAuthors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_authors',function(Blueprint $table){
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('post_id');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_authors',function(Blueprint $table){
            $table->dropForeign('post_authors_post_id_foreign');
            $table->dropForeign('post_authors_author_id_foreign');
        
        });
    }
}
