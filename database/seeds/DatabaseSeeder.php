<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Treinamento\User;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call('UserTableSeeder');
		$this->call('CategoryTableSeeder');
        $this->call('ProductTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        // User::create([
        //     'name' => 'Wandry',
        //     'password' => bcrypt('123456'),
        //     'email' => 'wandryf@gmail.com'
        // ]);

        factory('Treinamento\User')->create([
            'name' => 'Wandry',
            'password' => Hash::make(123456),
            'email' => 'wandryf@gmail.com'
        ]);

    }

}
