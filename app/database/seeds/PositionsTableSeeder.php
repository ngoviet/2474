<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PositionsTableSeeder extends Seeder {

	public function run()
	{


        DB::table('positions')->insert(array(
            array('id' => '0', 'name' => 'Giám đốc'),
            array('id' => '1', 'name' => 'Kinh doanh bán hàng'),
            array('id' => '2', 'name' => 'Kế toán'),
            array('id' => '3', 'name' => 'Quản lý kho'),
            array('id' => '4', 'name' => 'Điều hành lắp đặt'),
            array('id' => '5', 'name' => 'Quản lý nhân sự'),
            array('id' => '6', 'name' => 'Quản lý nghiệp vụ'),
            array('id' => '8', 'name' => 'Chăm sóc Khách hàng'),
            array('id' => '9', 'name' => 'Nhân viên lắp đặt'),
            array('id' => '10', 'name' => 'Phó Giám đốc'),
            array('id' => '11', 'name' => 'CTHĐQT kiêm GĐ'),
            array('id' => '12', 'name' => 'Chủ xe'),
            array('id' => '13', 'name' => 'Phó Giám đốc'),
            array('id' => '14', 'name' => 'Tổng Giám đốc'),
            array('id' => '15', 'name' => 'Chủ tịch công ty')
//	        array('id' => '16', 'name' => 'Giám đốc')
        ));
	}

}