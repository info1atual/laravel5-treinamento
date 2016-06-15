<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'name' => 'Wandry',
            'password' => bcrypt('123456'),
            'email' => 'wandryf@gmail.com',
            'active' => 1,
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'Wandry 2',
            'password' => bcrypt('123456'),
            'email' => 'teste@gmail.com',
            'active' => 1,
        ]);

        factory('CodeCommerce\User', 3)->create();

    }

}
