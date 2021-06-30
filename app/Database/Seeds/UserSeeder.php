<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'nama'    => 'Administrator',
			'username' => 'admin',
			'password'    => password_hash('admin', PASSWORD_BCRYPT),
		];

		// Using Query Builder
		$this->db->table('users')->insert($data);
	}
}
