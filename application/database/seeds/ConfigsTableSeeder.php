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
            'values'=>'eyJpdiI6ImMweUNpZEl4RGNTRzZ1M0dGdk9oUXc9PSIsInZhbHVlIjoiRVFXOG1pUHZhWUlWeGhlXC9OV1dGQnM0SzA0UmxXS1wvS3RlVHVDeWhyUDRab2hBazl4b0U2Zkk0RmhpWklTditmIiwibWFjIjoiMzEyZTI3MDM0NjlmNWVlYjU5YmQ1MjBhZThiOWE5NjRhMjQ0Yjg4MzIxOTdkMDQxZjE0MWYwOGQxZWM5MzA3MiJ9',
            'defaultValues'=>'eyJpdiI6InZSdkJxeEk4RXpoMVhaUXFxQ3R4Tmc9PSIsInZhbHVlIjoiYzR4RllSVngzTjd6NE1XamR3bHVvUT09IiwibWFjIjoiZWQxOTc2MmU1NzEzM2ZiYjg4OTA5Y2I0YTBlM2Y2YWVkM2ZjZjhiNDc1OWU5NTFkMTFiNGM5ZTc2MjI3Y2U0ZSJ9',
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
            'values'    => '',
            'defaultValues'=>'',
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
