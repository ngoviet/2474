<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataThuphi extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        // Tạo bảng thành phố
        Schema::create('cities', function(Blueprint $table)
        {
//            $table->integer('id')->unsigned()->unique();
	        $table->increments('id');
            $table->string('name')->unique();
            $table->char('code')->unique();
        });

        // Tạo bảng chức danh
        Schema::create('positions', function(Blueprint $table)
        {
            $table->integer('id')->unsigned()->unique();
//            $table->increments('id');
            $table->string('name');
        });

        // Tạo bảng Đại lý
        Schema::create('agencies', function(Blueprint $table)
        {
//            $table->integer('id')->unsigned()->unique();
            $table->increments('id');
            $table->integer('city_id')->unsigned();
            $table->string('name');
            $table->string('address');
            $table->string('license_number');
            $table->date('date_create');
            $table->string('phone');
            $table->string('fax');
            $table->string('email');
            $table->string('tax');
            $table->string('bank_number');
            $table->string('bank_name');

            $table->foreign('city_id')->references('id')->on('cities');
        });

        // Nhân viên đại lý
        Schema::create('staffs', function(Blueprint $table){
//            $table->integer('id')->unsigned()->unique();
	        $table->increments('id');
            $table->integer('agency_id')->unsigned();
            $table->integer('position_id')->unsigned();
            $table->string('name');
            $table->boolean('sex');
            $table->date('birthday');
            $table->string('phone');
            $table->string('email');

            $table->foreign('agency_id')->references('id')->on('agencies');
            $table->foreign('position_id')->references('id')->on('positions');
        });

        // Tạo bảng Khách hàng
        Schema::create('customers', function(Blueprint $table)
        {
//            $table->integer('id')->unsigned()->unique();
	        $table->increments('id');
	        $table->integer('city_id')->unsigned();
            $table->integer('agency_id')->unsigned();
            $table->string('account');
            $table->string('name');
            $table->string('address');
            $table->string('license_number');
            $table->string('license_date_create');
            $table->string('license_date_end');
            $table->string('license_address_create');
            $table->string('phone');
            $table->string('fax');
            $table->string('email');
            $table->string('tax');
            $table->string('bank_number');
            $table->string('bank_name');
            $table->boolean('is_active');
            $table->date('create_at');

            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('agency_id')->references('id')->on('agencies');
        });

        // Tạo bảng Người liên hệ
        Schema::create('contacts', function (Blueprint $table)
        {
//            $table->integer('id')->unsigned()->unique();
	        $table->increments('id');
	        $table->integer('customer_id')->unsigned();
            $table->string('name');
            $table->boolean('sex');
            $table->date('birthday');
            $table->string('address');
            $table->string('phone');
            $table->string('fax');
            $table->string('job');
            $table->string('email');
            $table->boolean('is_manager');

            $table->foreign('customer_id')->references('id')->on('customers');
        });

        // Tạo bảng Loại hợp đồng
        Schema::create('contractTypes', function (Blueprint $table){
//            $table->integer('id')->unsigned()->unique();
	        $table->increments('id');
	        $table->string('name');
        });

        // Tạo bảng Loại vật tư
        Schema::create('materialTypes', function(Blueprint $table){
//            $table->integer('id')->unsigned()->unique();
	        $table->increments('id');
            $table->string('name');
            $table->string('description');
        });

        // Tạo bảng Hợp đồng
        Schema::create('contracts', function(Blueprint $table){
//            $table->integer('id')->unsigned()->unique();
	        $table->increments('id');
	        $table->string('code')->unique();
            $table->string('code_appendix')->unique();
            $table->integer('contractType_id')->unsigned();
            $table->integer('staff_sell_id')->unsigned();
            $table->integer('staff_input_id')->unsigned();
            $table->date('date_sign');
            $table->date('date_create');

            $table->foreign('contractType_id')->references('id')->on('contractTypes');
            $table->foreign('staff_sell_id')->references('id')->on('staffs');
            $table->foreign('staff_input_id')->references('id')->on('staffs');
        });

        // Tạo bảng Chi tiết hợp đồng MBTB
        Schema::create('contractMaterials', function(Blueprint $table){
//            $table->integer('id')->unsigned()->unique();
	        $table->increments('id');
	        $table->string('contract_code');
            $table->string('contract_code_appendix');
            $table->date('date_create');
            $table->integer('materialType_id')->unsigned();
            $table->integer('quantity');
            $table->decimal('unit_price',10,2);
            // Đơn giá khuyển mại hoặc chiếu khấu
            $table->decimal('unit_price_sp', 10, 2);
            // Hình thức giảm trừ: 0 - không, 1 - khuyến mại, 2 - chiết khấu
            $table->integer('reduction_type');
            $table->decimal('vat', 4, 2);
            // Hình thức thanh toán
            $table->string('paymentFormality');
            $table->integer('staff_input_id')->unsigned();
            $table->integer('staff_accept_id')->unsigned();
            $table->date('date_accept');
            $table->integer('agency_id')->unsigned();
            $table->integer('remain_quantity');

            $table->foreign('contract_code')->references('code')->on('contracts');
            $table->foreign('contract_code_appendix')->references('code_appendix')->on('contracts');
            $table->foreign('materialType_id')->references('id')->on('materialTypes');
            $table->foreign('staff_input_id')->references('id')->on('staffs');
            $table->foreign('staff_accept_id')->references('id')->on('staffs');
            $table->foreign('agency_id')->references('id')->on('agencies');
        });

        // Tạo bảng Gói dịch vụ
        Schema::create('servicePackages', function(Blueprint $table){
//            $table->integer('id')->unsigned()->unique();
	        $table->increments('id');
	        $table->string('name');
            $table->string('description');
        });
        // Tạo bảng Chi tiết hợp đồng CCDV
        Schema::create('contractServices', function(Blueprint $table) {
//            $table->integer('id')->unsigned()->unique();
	        $table->increments('id');
            $table->string('contract_code');
            $table->string('contract_code_appendix');
            $table->date('date_create');
            $table->integer('servicePackage_id')->unsigned();
            $table->integer('duration');
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            // Đơn giá khuyển mại hoặc chiếu khấu
            $table->decimal('unit_price_sp', 10, 2);
            // Hình thức giảm trừ: 0 - không, 1 - khuyến mại, 2 - chiết khấu
            $table->integer('reduction_type');
            $table->decimal('vat', 4, 2);
            // Hình thức thanh toán
            $table->string('paymentFormality');
            $table->integer('staff_input_id')->unsigned();
            $table->integer('staff_accept_id')->unsigned();
            $table->date('date_accept');
            $table->integer('agency_id')->unsigned();
            $table->integer('remain_quantity');

            $table->foreign('contract_code')->references('code')->on('contracts');
            $table->foreign('contract_code_appendix')->references('code_appendix')->on('contracts');
            $table->foreign('servicePackage_id')->references('id')->on('servicePackages');
            $table->foreign('staff_input_id')->references('id')->on('staffs');
            $table->foreign('staff_accept_id')->references('id')->on('staffs');
            $table->foreign('agency_id')->references('id')->on('agencies');

        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('contracts', function (Blueprint $table){
            $table->dropForeign('contracts_contractType_id_foreign');
            $table->dropForeign('contracts_staff_sell_id_foreign');
            $table->dropForeign('contracts_staff_input_id_foreign');
        });

        Schema::table('contacts', function (Blueprint $table){
           $table->dropForeign('contacts_customer_id_foreign');
        });

        Schema::table('staffs', function (Blueprint $table){
            $table->dropForeign('staffs_agency_id_foreign');
            $table->dropForeign('staffs_position_id_foreign');
        });

        Schema::table('agencies', function (Blueprint $table){
            $table->dropForeign('agencies_city_id_foreign');
        });

        Schema::table('customers', function (Blueprint $table){
            $table->dropForeign('customers_city_id_foreign');
            $table->dropForeign('customers_agency_id_foreign');
        });

        Schema::drop('contractServices');
        Schema::drop('servicePackages');
        Schema::drop('contractMaterials');
        Schema::drop('contracts');
        Schema::drop('materialTypes');
        Schema::drop('contractTypes');
        Schema::drop('contacts');
        Schema::drop('staffs');
        Schema::drop('customers');
        Schema::drop('agencies');
        Schema::drop('positions');
		Schema::drop('cities');
	}

}
