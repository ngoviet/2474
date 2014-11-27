<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class StaffsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('staffs')->insert(array(
            array('id' => '1','agency_id' => '2','position_id' => '', 'name' => 'Nguyễn Đức Dũng', 'sex' => '1','birthday' => '','phone' => '','email' => ''),
            array('id' => '2','agency_id' => '2','position_id' => '0', 'name' => 'Nguyễn Hải Anh', 'sex' => '1','birthday' => '01/12/1980','phone' => '0915694343','email' => ''),
            array('id' => '3','agency_id' => '2','position_id' => '10', 'name' => 'Trịnh Quang Công', 'sex' => '1','birthday' => '','phone' => '0913243277','email' => ''),
            array('id' => '4','agency_id' => '2','position_id' => '10', 'name' => 'Trần Văn Phúc', 'sex' => '1','birthday' => '','phone' => '0912228895','email' => ''),
            array('id' => '5','agency_id' => '2','position_id' => '8', 'name' => 'Đỗ Thị Thủy', 'sex' => '0','birthday' => '','phone' => '0912998720','email' => ''),
            array('id' => '6','agency_id' => '2','position_id' => '1', 'name' => 'Nguyễn Thị  Thanh Thúy', 'sex' => '0','birthday' => '','phone' => '0912303909','email' => ''),
            array('id' => '7','agency_id' => '2','position_id' => '6', 'name' => 'Nguyễn Thị Phương Thảo', 'sex' => '0','birthday' => '','phone' => '3855908','email' => ''),
            array('id' => '8','agency_id' => '2','position_id' => '2', 'name' => 'Vũ Thị Hồng Minh', 'sex' => '0','birthday' => '13/02/1985','phone' => '0915693769','email' => 'vthminh@hptel.com.vn'),
            array('id' => '9','agency_id' => '2','position_id' => '1', 'name' => 'Bùi Minh Yến', 'sex' => '0','birthday' => '','phone' => '','email' => ''),
            array('id' => '10','agency_id' => '2','position_id' => '8', 'name' => 'Nguyễn Thị Hồng Lý', 'sex' => '0','birthday' => '','phone' => '0915692988','email' => ''),
            array('id' => '11','agency_id' => '2','position_id' => '1', 'name' => 'Vũ Văn Sự', 'sex' => '1','birthday' => '','phone' => '0913578289','email' => ''),
            array('id' => '12','agency_id' => '2','position_id' => '1', 'name' => 'Nguyễn Hoàng Bắc', 'sex' => '1','birthday' => '','phone' => '0914577668','email' => ''),
            array('id' => '13','agency_id' => '2','position_id' => '1', 'name' => 'Nguyễn Thị Hằng', 'sex' => '0','birthday' => '','phone' => '0919210886','email' => ''),
            array('id' => '14','agency_id' => '2','position_id' => '1', 'name' => 'Nguyễn Thị Thanh Vân', 'sex' => '0','birthday' => '','phone' => '0913241973','email' => ''),
            array('id' => '15','agency_id' => '2','position_id' => '1', 'name' => 'Nguyễn Huy Hiệp', 'sex' => '1','birthday' => '','phone' => '0313601717','email' => ''),
            array('id' => '16','agency_id' => '2','position_id' => '1', 'name' => 'Nguyễn Đức Tuân', 'sex' => '1','birthday' => '','phone' => '','email' => ''),
            array('id' => '17','agency_id' => '2','position_id' => '1', 'name' => 'Phạm Đức Việt', 'sex' => '1','birthday' => '','phone' => '','email' => ''),

        ));
	}

}