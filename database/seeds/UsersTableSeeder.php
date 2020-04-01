<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//$faker = Faker\Factory::create();
		/*DB::table('users')->insert([
			'name' => Str::random(10),
			'email' => Str::random(10).'@gmail.com',
			'password' => bcrypt('secret'),
		]);*/

		/*
		for ($i=0; $i < 3; $i++) { 
			User::create([
				'name' => str_random(8),
				'email' => str_random(12).'@mail.com',
				'password' => bcrypt('123456')
			]);
		}
		*/

		User::create([
				'name' => "admin",
				'email' => 'admin@admin.com',
				'password' => bcrypt('admin@admin.com')
			]);
	}
}
