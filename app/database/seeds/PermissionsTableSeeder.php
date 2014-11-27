<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PermissionsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('permission_role')->delete();

		DB::table('permissions')->delete();

		$permissions = array(
			array( // 1
				'name' 			=> 'manage_blogs',
				'display_name'	=> 'manage infos'
			),
			array( // 2
				'name' 			=> 'manage_posts',
				'display_name'	=> 'manage posts'
			),
			array( // 3
				'name' 			=> 'manage_comments',
				'display_name'	=> 'manage comments'
			),
			array( // 4
				'name' 			=> 'manage_users',
				'display_name'	=> 'manage users'
			),
			array( // 5
				'name' 			=> 'manage_roles',
				'display_name'	=> 'manage roles'
			),
            array( // 6
                'name' 			=> 'manage_cities',
                'display_name'	=> 'manage cities'
            ),
			array( // 7
				'name' 			=> 'post_comment',
				'display_name'	=> 'post comment'
			),
			array( // 8
				'name'          => 'manage_customers',
				'display_name'  => 'manage customers'
			),
			array( // 9
				'name'          => 'manage_positions',
				'display_name'  => 'manage positions'
			),
			array( // 10
				'name'          => 'manage_agencies',
				'display_name'  => 'manage agencies'
			),
			array( // 11
				'name'          => 'manage_staffs',
				'display_name'  => 'manage staffs'
			),
			array( // 12
				'name'          => 'manage_contacts',
				'display_name'  => 'manage contacts'
			),
			array( // 13
				'name'          => 'manage_contracts',
				'display_name'  => 'manage contracts'
			),
			array( // 14
				'name'          => 'manage_contractTypes',
				'display_name'  => 'manage contractTypes'
			),
			array( // 15
				'name'          => 'manage_contractMaterials',
				'display_name'  => 'manage contractMaterials'
			),
			array( // 16
				'name'          => 'manage_contractServices',
				'display_name'  => 'manage contractServices'
			),
			array( // 17
				'name'          => 'manage_servicePackages',
				'display_name'  => 'manage servicePackages'
			)

		);

		DB::table('permissions')->insert($permissions);

		$role_id_admin = Role::where('name','=','admin')->first()->id;
		$role_id_comment = Role::where('name','=','comment')->first()->id;
		$permission_base = (int)DB::table('permissions')->first()->id - 1;

		$permissions = array(
			array(
				'role_id' 			=> $role_id_admin,
				'permission_id'	    => $permission_base + 1
			),
			array(
				'role_id' 			=> $role_id_admin,
				'permission_id'	    => $permission_base + 2
			),
			array(
				'role_id' 			=> $role_id_admin,
				'permission_id'	    => $permission_base + 3
			),
			array(
				'role_id' 			=> $role_id_admin,
				'permission_id'	    => $permission_base + 4
			),
			array(
				'role_id' 			=> $role_id_admin,
				'permission_id'	    => $permission_base + 5
			),
			array(
				'role_id' 			=> $role_id_admin,
				'permission_id'	    => $permission_base + 6
			),
            array(
                'role_id' 			=> $role_id_admin,
                'permission_id'	    => $permission_base + 7
            ),
			array(
				'role_id' 			=> $role_id_comment,
				'permission_id'	    => $permission_base + 7
			),
			array(
				'role_id'           => $role_id_admin,
				'permission_id'     => $permission_base + 8
			),
			array(
				'role_id'           => $role_id_admin,
				'permission_id'     => $permission_base + 9
			),
			array(
				'role_id'           => $role_id_admin,
				'permission_id'     => $permission_base + 10
			),
			array(
				'role_id'           => $role_id_admin,
				'permission_id'     => $permission_base + 11
			),
			array(
				'role_id'           => $role_id_admin,
				'permission_id'     => $permission_base + 12
			),
			array(
				'role_id'           => $role_id_admin,
				'permission_id'     => $permission_base + 13
			),
			array(
				'role_id'           => $role_id_admin,
				'permission_id'     => $permission_base + 14
			),
			array(
				'role_id'           => $role_id_admin,
				'permission_id'     => $permission_base + 15
			),
			array(
				'role_id'           => $role_id_admin,
				'permission_id'     => $permission_base + 16
			),
			array(
				'role_id'           => $role_id_admin,
				'permission_id'     => $permission_base + 17
			)
		);

		DB::table('permission_role')->insert($permissions);
	}

}