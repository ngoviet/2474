<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('permission_role')->delete();
		DB::table('roles')->delete();

		$adminRole = new Role;
		$adminRole->name = 'admin';
		$adminRole->save();

		$commentRole = new Role;
		$commentRole->name = 'comment';
		$commentRole->save();

		$user = User::where('username','=','admin')->first();
		$user->attachRole($adminRole);

		$user = User::where('username','=','test1')->first();
		$user->attachRole($commentRole);

		$user = User::where('username','=','test2')->first();
		$user->attachRole($commentRole);
	}

}