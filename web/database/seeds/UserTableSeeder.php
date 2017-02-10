<?php

use Illuminate\Database\Seeder;

use app\UUID;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            	'uuid' => UUID::v4();
	            'username' => 'admin';
	            'password' => bcrypt('admin12345');
            ],
        ]);
    }
}
