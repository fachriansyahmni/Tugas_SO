<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'name'    => 'Administrator',
			'username' => 'admin',
			'password'    => '',
		];

		// Simple Queries
		$this->db->query("INSERT INTO users (name, username,password) VALUES(:name:, :username:, :password:)", $data);

		// Using Query Builder
		$this->db->table('users')->insert($data);
	}
}
