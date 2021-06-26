<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sewa extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'IdSewa'		=> [
				'type'           => 'VARCHAR',
				'constraint'     => '6',
				'null'			 => FALSE
			],
			'TanggalPembayaran'	=> [
				'type'			=> 'DATE',
				'null'			=> TRUE
			],
			'TanggalSewa'   => [
				'type'       	=> 'DATE',
				'null' 			=> FALSE
			],
			'TanggalAkhirSewa'       => [
				'type'       	=> 'DATE',
				'null' 			=> FALSE
			],
			'GrandTotal'    => [
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
			'IdPenyewa'		=> [
				'type'       	=> 'VARCHAR',
				'constraint' 	=> '6',
				'null' 			=> FALSE
			],
			'NoKamar'		=> [
				'type'       	=> 'VARCHAR',
				'constraint' 	=> '2',
				'null' 			=> FALSE
			],
			'is_deleted'   => [
				'type'       	=> 'INT',
				'constraint' 	=> 2,
				'default' 		=> 0,
				'null'			=> FALSE
			],
		]);
		$this->forge->addKey('IdSewa', true);
		$this->forge->addForeignKey('IdPenyewa', 'penyewa', 'IdPenyewa', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('NoKamar', 'kamar', 'NoKamar', 'CASCADE', 'CASCADE');
		$this->forge->createTable('sewa');
	}

	public function down()
	{
		$this->forge->dropTable('sewa');
	}
}
