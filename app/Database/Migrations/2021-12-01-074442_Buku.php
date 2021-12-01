<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Buku extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_b' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'kode_buku' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
			],
			'judul_buku' => [
				'type' => 'VARCHAR',
				'constraint' => 50,
			],
			'penulis'=> [
				'type' => 'VARCHAR',
				'constraint' => 10,
			],
			'penerbit' => [
				'type' => 'VARCHAR',
				'constraint' => 100
			],
			'thn_terbit' => [
				'type' => 'VARCHAR',
				'constraint' => 15
			],
			'created_at' =>[
				'type' => 'DATETIME',
				'null' => true
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true
			]
		
	]);
	$this->forge->addKey('id_b', true);
	$this->forge->createTable('Buku');
	}

	public function down()
	{
		$this->forge->dropTable('Buku');
	}
}