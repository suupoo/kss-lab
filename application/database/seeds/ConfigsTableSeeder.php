<?php

use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{
    const TABLENAME = 'configs';
    const PRIMALY_KEY = 'id';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this::TABLENAME)->insert([
            'id'        => 1,
            'function_cd'
                        => 1,
            'attribute_cd'
                        => 1,
            'detail_cd' => 1,
            'name'      => 'common:account:isPublic',
            'displayText'
                        => 'アカウント情報の公開/非公開',
            'description'
                        => 'アカウントの公開状態を設定が可能です。',
            'multiValue'=> false,
            'edit_user' =>  1,
            'enable'    =>  1,
            'created_at'=>new DateTime('2019/07/13 00:00:00'),
            'updated_at'=>new DateTime('2019/07/13 00:00:00'),
            'deleted_at'=>  null,
        ]);

        DB::table($this::TABLENAME)->insert([
            'id'        => 2,
            'function_cd'
                        => 2,
            'attribute_cd'
                        => 1,
            'detail_cd' => 1,
            'name'      => 'forum:search:default-condition',
            'displayText'
                        => 'デフォルトの検索条件',
            'description'
                        => 'いつも使う検索条件を設定することが可能です。',
            'multiValue'=> false,
            'edit_user' =>  1,
            'enable'    =>  1,
            'created_at'=>new DateTime('2019/07/13 00:00:00'),
            'updated_at'=>new DateTime('2019/07/13 00:00:00'),
            'deleted_at'=>  null,
        ]);
    }
}
