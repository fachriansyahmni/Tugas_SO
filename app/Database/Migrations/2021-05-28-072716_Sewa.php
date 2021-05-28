<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sewa extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'idSewa'          => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'idPenyewa'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			],
			'idKamar'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			],
			'TanggalSewa'       => [
				'type'       => 'datetime',
				'null' => true,
			],
			'TanggalAkhirSewa'       => [
				'type'       => 'datetime',
				'null' => true,
			],
			'LamaSewa'       => [
				'type'       => 'INT',
				'constraint' => 5,
				'null' => true,
			],
			'GrandTotal'       => [
				'type'       => 'INT',
				'constraint' => 50,
				'default' => 0,
			],
		]);
		$this->forge->addKey('idSewa', true);
		$this->forge->createTable('sewa');
	}

	public function down()
	{
		$this->forge->dropTable('sewa');
	}
}
