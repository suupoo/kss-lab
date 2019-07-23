<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    const TABLENAME = 'settings';
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
            'config_id' =>  1,
            'value'     => 'public',
            'edit_user' =>  1,
            'enable'    =>  1,
            'created_at'=>new DateTime('2019/07/13 00:00:00'),
            'updated_at'=>new DateTime('2019/07/13 00:00:00'),
            'deleted_at'=>  null,
        ]);

        DB::table($this::TABLENAME)->insert([
            'id'        =>  2,
            'user_id'   =>  2,
            'config_id' =>  1,
            'value'     => 'private',
            'edit_user' =>  1,
            'enable'    =>  1,
            'created_at'=>new DateTime('2019/07/13 00:00:00'),
            'updated_at'=>new DateTime('2019/07/13 00:00:00'),
            'deleted_at'=>  null,
        ]);

        DB::table($this::TABLENAME)->insert([
            'id'        =>  3,
            'user_id'   =>  1,
            'config_id' =>  2,
            'value'     => 'age',
            'edit_user' =>  1,
            'enable'    =>  1,
            'created_at'=>new DateTime('2019/07/13 00:00:00'),
            'updated_at'=>new DateTime('2019/07/13 00:00:00'),
            'deleted_at'=>  null,
        ]);
    }
}
