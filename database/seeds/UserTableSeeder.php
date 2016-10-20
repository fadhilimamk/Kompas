<?php

class UserTableSeeder extends Seeder
{

  public function run()
  {
      DB::table('users')->delete();
      User::create(array(
          'name'     => 'Fadhil Imam Kurnia',
          'username' => 'fadhilimamk',
          'email'    => 'fadhil@arc.itb.ac.id',
          'password' => Hash::make('rahasia'),
      ));
  }

}
