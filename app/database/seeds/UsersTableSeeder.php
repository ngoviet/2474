<?php

class UsersTableSeeder extends Seeder {

  public function run()
  {

    DB::table('users')->delete();

    $users = array(
      array(
        'username' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('123456'),
        'confirmation_code' => md5(microtime().Config::get('app.key')),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
        ),
      array(
        'username' => 'test1',
        'email' => 'test1@gmail.com',
        'password' => Hash::make('123456'),
        'confirmation_code' => md5(microtime().Config::get('app.key')),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
        ),
      array(
        'username' => 'test2',
        'email' => 'test2@gmail.com',
        'password' => Hash::make('123456'),
        'confirmation_code' => md5(microtime().Config::get('app.key')),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
        )
      );

    DB::table('users')->insert($users);
    
  }
}