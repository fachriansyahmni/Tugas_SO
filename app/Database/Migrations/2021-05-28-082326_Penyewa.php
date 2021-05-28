<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penyewa extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idPenyewa'          => [
				'type'           => "varchar",
				'constraint'     => "4",
			],
			'NamaPenyewa'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			],
			'NoTelp'       => [
				'type'       => 'VARCHAR',
				'constraint' => '15',
				'default' => 0,
			],
			'Alamat'       => [
				'type'       => 'Text',
				'null' => true,
			],
		]);
		$this->forge->addKey('idPenyewa', true);
		$this->forge->createTable('penyewa');
	}

	public function down()
	{
		$this->forge->dropTable('penyewa');
	}
}
