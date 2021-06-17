<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RiwayatSewa extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'IdRiwayatSewa'	=> [
				'type'          => "varchar",
				'constraint'    => "6",
				'null'			=> FALSE
			],
			'TanggalPembayaran'	=> [
				'type'			=> 'DATE',
				'null'			=> TRUE
			],
			'TanggalSewa'	=> [
				'type'       	=> 'DATE',
				'null'			=> FALSE
			],
			'TanggalAkhirSewa'	=> [
				'type'			=> 'DATE',
				'null'			=> FALSE
			],
			'GrandTotal'	=> [
				'type'       	=> 'INT',
				'constraint' 	=> 10,
				'null'			=> FALSE
			],
			'status_sewa'   => [
				'type'       	=> 'INT',
				'constraint' 	=> 2,
				'default' 		=> 1,
				'null'			=> FALSE
			],
			'IdSewa'		=> [
				'type'			=> 'VARCHAR',
				'constraint' 	=> '6',
				'null'			=> FALSE
			]
		]);
		$this->forge->addKey('IdRiwayatSewa', true);
		$this->forge->addForeignKey('IdSewa', 'sewa', 'IdSewa', 'CASCADE', 'CASCADE');
		$this->forge->createTable('riwayat_sewa');
	}

	public function down()
	{
		$this->forge->dropTable('riwayat_sewa');
	}
}
