<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'	=> [
				'type'       	=> 'INT',
				'constraint' 	=> 10,
				'null'			=> FALSE
			],
			'nama'	=> [
				'type'			=> 'varchar',
				'constraint' 	=> 50,
				'null'			=> FALSE
			],
			'username'	=> [
				'type'			=> 'varchar',
				'constraint' 	=> 50,
				'null'			=> FALSE
			],
			'password'	=> [
				'type'			=> 'varchar',
				'constraint' 	=> 255,
				'null'			=> FALSE
			],
			'role_type'	=> [
				'type'       	=> 'INT',
				'constraint' 	=> 10,
				'default'        => 1, //1:admin,
				'null'			=> FALSE
			],
			'is_blocked'   => [
				'type'       	=> 'INT',
				'constraint' 	=> 2,
				'default' 		=> 0,
				'null'			=> FALSE
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
