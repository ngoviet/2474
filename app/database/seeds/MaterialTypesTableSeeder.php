<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MaterialTypesTableSeeder extends Seeder {

	public function run()
	{
        DB::table('materialTypes')->insert(array(
            array('id' => '1','name' => 'VNT918','description' => 'GSHT VNT918'),
            array('id' => '2','name' => 'VNT102','description' => 'GSHT VNT102'),
            array('id' => '3','name' => 'VNT918S','description' => 'GSHT VNT918S'),
            array('id' => '4','name' => 'FS7','description' => 'Phao dầu'),
            array('id' => '5','name' => 'FS8','description' => 'Phao dầu'),
            array('id' => '6','name' => 'Camera','description' => 'Camera'),
            array('id' => '11','name' => 'Phao dầu cũ','description' => 'Phao dầu'),
        ));
	}

}