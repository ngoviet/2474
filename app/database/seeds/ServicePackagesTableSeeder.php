<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ServicePackagesTableSeeder extends Seeder {

	public function run()
	{
        DB::table('servicePackages')->insert(array(
        array('id' => '1', 'name' => 'Basic', 'description' => 'Gói dịch vụ định vị cho các thiết bị không hợp chuẩn'),
        array('id' => '2', 'name' => 'Fuel', 'description' => 'Gói dịch vụ báo cáo tiêu thụ nhiên liệu'),
        array('id' => '3', 'name' => 'Camera', 'description' => 'Gói dịch vụ báo cáo camera'),
        array('id' => '4', 'name' => 'Standard', 'description' => 'Gói dịch vụ định vị cho các thiết bị hợp chuẩn'),
        array('id' => '6', 'name' => 'Sim', 'description' => 'Gói dịch vụ Sim')

        ));
	}

}