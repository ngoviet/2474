<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ContractsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('contracts')->insert(array(

        ));
	}

}