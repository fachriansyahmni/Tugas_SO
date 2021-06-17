<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penyewa extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'IdPenyewa'     => [
				'type'          => 'varchar',
				'constraint'    => '6',
				'null'			=> FALSE
			],
			'NamaPenyewa'	=> [
				'type'       	=> 'VARCHAR',
				'constraint' 	=> '100',
				'null' 			=> FALSE
			],
			'JenisKelamin'	=> [
				'type'       	=> 'ENUM("Laki-Laki","Perempuan")',
				'null' 			=> FALSE
			],
			'NoTelp'       => [
				'type'       	=> 'VARCHAR',
				'constraint' 	=> '15',
				'null'			=> FALSE
			],
			'Alamat'       => [
				'type'       	=> 'Text',
				'null' 			=> FALSE
			],
		]);
		$this->forge->addKey('IdPenyewa', true);
		$this->forge->createTable('penyewa');
	}

	public function down()
	{
		$this->forge->dropTable('penyewa');
	}
}
