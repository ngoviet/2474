<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ContractServicesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('contractServices')->insert(array(

        ));
	}

}