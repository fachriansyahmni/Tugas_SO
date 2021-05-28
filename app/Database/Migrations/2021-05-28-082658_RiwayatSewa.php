<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RiwayatSewa extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'IdRiwayatSewa'          => [
				'type'           => "varchar",
				'constraint'     => "6",
			],
			'Keterangan'       => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null' => true,
			],
			'TanggalAksi'       => [
				'type'       => 'datetime',
			],
			'TanggalSewa'       => [
				'type'       => 'datetime',
			],
			'TanggalAkhirSewa'       => [
				'type'       => 'datetime',
			],
			'GrandTotal'       => [
				'type'       => 'INT',
				'constraint' => 10,
				'default' => 0,
			],
		]);
		$this->forge->addKey('IdRiwayatSewa', true);
		$this->forge->createTable('riwayat_sewa');
	}

	public function down()
	{
		$this->forge->dropTable('riwayat_sewa');
	}
}
