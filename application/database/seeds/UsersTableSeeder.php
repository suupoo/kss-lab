<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    const TABLENAME = 'users';
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
            'public_id' =>  'develop001',
            'public_id_changed'
                        =>  true,
            'name'      =>  'テストユーザ',
            'country_cd'=>  '81',
            'phone_number'
                        =>  env('SMS_FROM'),
            'email'     =>  env('TEST_USER1_MAIL','test1@kss.lab'),
            'password'  =>  '$2y$10$u3SVvoMdIXNR5j7VNZluEuTC1tbYrE/Rxyv.DJ9MSpCQpo.OCl6Em',
            'created_at'=>new DateTime('2019/05/11 00:00:00'),
            'updated_at'=>new DateTime('2019/05/11 00:00:00'),
        ]);

        DB::table($this::TABLENAME)->insert([
            'id'        =>  2,
            'public_id' =>  'develop002',
            'public_id_changed'
                        =>  true,
            'name'      =>  'テストユーザ2',
            'country_cd'=>  '81',
            'phone_number'
                        =>  null,
            'email'     =>  env('TEST_USER2_MAIL','test2@kss.lab'),
            'password'  =>  '$2y$10$JPj5ATn1OPKmWS.8lmWPjOLDyGlqKkrYA/GBmOCtVKVnoA91PbG6W',
            'created_at'=>new DateTime('2019/06/11 00:00:00'),
            'updated_at'=>new DateTime('2019/06/11 00:00:00'),
        ]);
    }
}
