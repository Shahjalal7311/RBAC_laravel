<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		App\Admin::create([
				'name'=>'admin',
				'username'=>'admin',
				'email'=>'root@gmail.com',
				'role'=>'2',
				'status'=>'1',
				'password'=>bcrypt(123456)
		]);
		$this->call(UserMenusSeeder::class);
		$this->call(UserMenuActionsSeeder::class);
		$this->call(UserRolesSeeder::class);
		echo "User Menu Sucessfully Added";
	}
}
