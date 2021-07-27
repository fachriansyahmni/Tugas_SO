<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DBSeeder extends Seeder
{
	public function run()
	{
		$this->call('UserSeeder');
		$this->call('KamarSeeder');
	}
}
