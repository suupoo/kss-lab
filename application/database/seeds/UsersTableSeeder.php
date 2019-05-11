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
            'name'      =>  'テストユーザ',
            'email'     =>  'test@kss.lab',
            'password'  =>  '$2y$10$u3SVvoMdIXNR5j7VNZluEuTC1tbYrE/Rxyv.DJ9MSpCQpo.OCl6Em',
            'created_at'=>new DateTime('2019/05/11 00:00:00'),
            'updated_at'=>new DateTime('2019/05/11 00:00:00'),
        ]);
    }
}
