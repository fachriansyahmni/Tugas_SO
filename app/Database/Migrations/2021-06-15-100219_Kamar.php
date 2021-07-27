<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kamar extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'NoKamar'	=> [
				'type'          => "varchar",
				'constraint'    => '2',
				'null'			=> FALSE
			],
			'Lantai'	=> [
				'type'       	=> 'VARCHAR',
				'constraint' 	=> '2',
				'null' 			=> FALSE,
			],
			'Fasilitas'	=> [
				'type'       	=> 'text',
				'null' 			=> TRUE,
			],
			'Harga'     => [
				'type'       	=> 'FLOAT',
				'constraint' 	=> 8,
				'null'			=> FALSE
			],
			'status_kamar'       => [
				'type'       	=> 'INT',
				'constraint' 	=> 1,
				'default' 		=> 0,
				'null'			=> FALSE
			],
		]);
		$this->forge->addKey('NoKamar', true);
		$this->forge->createTable('kamar');
	}

	public function down()
	{
		$this->forge->dropTable('kamar');
	}
}
