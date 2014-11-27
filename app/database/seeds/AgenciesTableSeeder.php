<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AgenciesTableSeeder extends Seeder {

	public function run()
	{
//        DB::table('staffs')->delete();
//		DB::table('agencies')->delete();

        DB::table('agencies')->insert(array(
           array(
               'id' => '0',
               'city_id' => '28',
               'name' => 'VNPT HẢI PHÒNG',
               'address' => 'Số 5 Nguyễn Tri Phương - Hồng Bàng - Hải Phòng',
               'license_number' => '',
               'date_create' => '06/12/2007',
               'phone' => '031800126',
               'fax' => '',
               'email' => 'cskh.hpg@vnpt.vn',
               'tax' => '',
               'bank_number' => '',
               'bank_name' => ''
           ),
            array(
                'id' => '2',
                'city_id' => '28',
                'name' => 'Trung tâm Tin học',
                'address' => '343 Đà Nẵng - Ngô Quyền - Hải Phòng',
                'license_number' => '216000112',
                'date_create' => '26/12/2007',
                'phone' => '0313523999',
                'fax' => '0313523888',
                'email' => 'vienthonghp@vnpt.com.vn',
                'tax' => '200287977',
                'bank_number' => '2001018007180',
                'bank_name' => 'Ngân hàng Thương mại cổ phần Hàng Hải Việt Nam - Chi nhánh Hải Phòng'
            )
        ));
	}

}