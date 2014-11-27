<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		
		$this->call('UsersTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('PermissionsTableSeeder');
		$this->call('PostsTableSeeder');
		$this->call('CommentsTableSeeder');
        $this->call('CitiesTableSeeder');
        $this->call('PositionsTableSeeder');
        $this->call('AgenciesTableSeeder');
        $this->call('CustomersTableSeeder');
        $this->call('StaffsTableSeeder');
//        $this->call('ContactsTableSeeder');
//        $this->call('MaterialTypesTableSeeder');
//        $this->call('ContractMaterialsTableSeeder');
//        $this->call('ServicePackagesTableSeeder');
//        $this->call('ContractServicesTableSeeder');
	}

}
