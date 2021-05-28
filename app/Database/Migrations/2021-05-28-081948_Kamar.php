<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kamar extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'NoKamar'          => [
				'type'           => "varchar",
				'constraint'     => "2",
			],
			'Lantai'       => [
				'type'       => 'VARCHAR',
				'constraint' => '2',
				'null' => true,
			],
			'Harga'       => [
				'type'       => 'INT',
				'constraint' => 5,
				'default' => 0,
			],
			'status_kamar'       => [
				'type'       => 'INT',
				'constraint' => 2,
				'default' => 0,
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
