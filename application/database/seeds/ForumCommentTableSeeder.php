<?php

use Illuminate\Database\Seeder;

class ForumCommentTableSeeder extends Seeder
{
    const TABLENAME = 'forum_comment';
    const PRIMALY_KEY = 'id';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this::TABLENAME)->insert([
            'id'        =>  1,
            'forum_id'  =>  1,
            'comment_id'=>  1,
            'enable'    => true,
            'created_at'=>new DateTime('2019/05/11 00:00:00'),
            'updated_at'=>new DateTime('2019/05/11 00:00:00'),
            'deleted_at'=>  null,
        ]);

        DB::table($this::TABLENAME)->insert([
            'id'        =>  2,
            'forum_id'   => 1,
            'comment_id'=>  2,
            'enable'    => true,
            'created_at'=>new DateTime('2019/06/11 00:00:00'),
            'updated_at'=>new DateTime('2019/06/11 00:00:00'),
            'deleted_at'=>  null,
        ]);
    }
}
