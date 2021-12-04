<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengembalian extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_pengembalian' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'id_p' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'id_a' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'id_b' => [
				'type' => 'INT',
				'constraint' => 11,
			],
			'tgl_pinjam'=> [
				'type' => 'DATE',
			],
			'tgl_kembali' => [
				'type' => 'DATE',
			],
			'tgl_kembalikan' => [
				'type' => 'DATE',
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
	$this->forge->addKey('id_pengembalian', true);
	$this->forge->createTable('Pengembalian');
	}

	public function down()
	{
		$this->forge->dropTable('Pengembalian');
	}
}