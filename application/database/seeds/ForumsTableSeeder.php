<?php

use Illuminate\Database\Seeder;

class ForumsTableSeeder extends Seeder
{
    const TABLENAME = 'forums';
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
            'title'     =>  'テストスレッド',
            'content'   =>  'テスト内容',
            'category_id'
                        =>  null,
            'created_at'=>new DateTime('2019/05/11 19:00:00'),
            'updated_at'=>new DateTime('2019/05/11 19:00:00'),
        ]);
    }
}
