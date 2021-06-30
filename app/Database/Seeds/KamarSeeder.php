<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KamarSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'NoKamar'    => 'A1',
			'Lantai' => 1,
			'Fasilitas'    => "",
			'Harga'    => 500000,
		];

		// Using Query Builder
		$this->db->table('kamar')->insert($data);
	}
}
