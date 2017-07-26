<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("create view postthreads as select p.id, p.user_id, p.replyee_id, p.post_content, p.created_at, p.updated_at, u.name as poster_name from posts p left join users u on p.user_id=u.id where p.thread_id=0");

        DB::statement("create view postreplies as select p.id, p.user_id, p.thread_id, p.replyee_id, p.post_content, p.created_at, p.updated_at, u.name as poster_name, r.name as replyee_name from posts p left join users u on p.user_id=u.id left join users r on p.replyee_id=r.id where p.thread_id>0");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS postthreads');
        DB::statement('DROP VIEW IF EXISTS postreplies');
    }
}
