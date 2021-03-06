<?php

use Illuminate\Database\Seeder;

use App\UUID;

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
            	'uuid' => UUID::v4(),
                'username' => 'admin',
	            'hours' => '24',
                'password' => bcrypt('admin123'),
            ],
        ]);
    }
}
