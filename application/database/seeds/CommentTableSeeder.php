<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{

    const TABLENAME = 'comments';
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
            'user_id'   =>  1,
            'comment'   =>  'シードで追加されたコメントです．',
            'type'      =>  1,
            'edit_user' =>  1,
            'status'    =>  1,
            'visible'   =>  1,
            'created_at'=>new DateTime('2019/05/11 00:00:00'),
            'updated_at'=>new DateTime('2019/05/11 00:00:00'),
            'deleted_at'=>  null,
        ]);

        DB::table($this::TABLENAME)->insert([
            'id'        =>  2,
            'user_id'   =>  2,
            'comment'   =>  'シードで他ユーザから追加されたコメントです．',
            'type'      =>  1,
            'edit_user' =>  2,
            'status'    =>  1,
            'visible'   =>  1,
            'created_at'=>new DateTime('2019/06/11 00:00:00'),
            'updated_at'=>new DateTime('2019/06/11 00:00:00'),
            'deleted_at'=>  null,
        ]);
    }
}
