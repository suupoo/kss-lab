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
            'public_id' =>  'admin',
            'public_id_changed'
                        =>  true,
            'name'      =>  '管理者',
            'adminRole' =>  config('Admin.const.ROLE.ALL'),
            'country_cd'=>  '81',
            'phone_number'
                        =>  null,
            'email'     =>  env('TEST_ADMIN_MAIL','admin@kss.lab'),
            'password'  =>  '$2y$10$4kyHU7ZR.kqqQitIXab9COU7gEhrJllqERyrj88G2r6O3/pvZ1.nu',
            'created_at'=>new DateTime('2019/06/11 00:00:00'),
            'updated_at'=>new DateTime('2019/06/11 00:00:00'),
        ]);

        DB::table($this::TABLENAME)->insert([
            'id'        =>  2,
            'public_id' =>  'develop001',
            'public_id_changed'
                        =>  true,
            'name'      =>  'テストユーザ',
            'adminRole' =>  config('Admin.const.ROLE.NONE'),
            'country_cd'=>  '81',
            'phone_number'
                        =>  env('SMS_FROM'),
            'email'     =>  env('TEST_USER1_MAIL','test1@kss.lab'),
            'password'  =>  '$2y$10$ArlpFXQZTENmnbiKgqbPde9JhNZP//jcKyOL3K3QfpSSb38jpQLEK',
            'created_at'=>new DateTime('2019/05/11 00:00:00'),
            'updated_at'=>new DateTime('2019/05/11 00:00:00'),
        ]);

        DB::table($this::TABLENAME)->insert([
            'id'        =>  3,
            'public_id' =>  'develop002',
            'public_id_changed'
                        =>  true,
            'name'      =>  'テストユーザ2',
            'adminRole' =>  config('Admin.const.ROLE.NONE'),
            'country_cd'=>  '81',
            'phone_number'
                        =>  null,
            'email'     =>  env('TEST_USER2_MAIL','test2@kss.lab'),
            'password'  =>  '$2y$10$n8YisKhWSvrFTl4Fb3ly9unQOrzQdW6pKXVCF6ZFvZZ4xYIq8cSty',
            'created_at'=>new DateTime('2019/06/11 00:00:00'),
            'updated_at'=>new DateTime('2019/06/11 00:00:00'),
        ]);
    }
}
