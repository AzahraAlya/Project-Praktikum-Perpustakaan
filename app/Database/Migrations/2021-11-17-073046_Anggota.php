<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Anggota extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_anggota' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
			],
			'jenis_kelamin'=> [
				'type' => 'VARCHAR',
				'constraint' => 10,
			],
			'alamat' => [
				'type' => 'VARCHAR',
				'constraint' => 100
			],
			'no_hp' => [
				'type' => 'VARCHAR',
				'constraint' => 15
			]
		
	]);
	$this->forge->addKey('id_anggota', true);
	$this->forge->createTable('Anggota');
	}

	public function down()
	{
		$this->forge->dropTable('Anggota');
	}
}