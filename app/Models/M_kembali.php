<?php

namespace App\Models;

use CodeIgniter\Model;

class M_kembali extends Model
{

    protected $table                = 'pengembalian';
	protected $primaryKey           = 'id_pengembalian';
	protected $allowedFields        = ['id_a','id_b','tgl_pinjam','tgl_kembali','tgl_dikembalikan','created_at', 'updated_at'];
	protected $useTimestamps        = true;


    public function getKembali($id=false){
		if($id == false){
			return $this->findAll();
		}

		return $this->where(['id_pengembalian'=> $id]) -> first();
	}

    public function getDataKembali(){

		$query = $this->db->table('pengembalian')->select('*')
		 ->join('anggota', 'pengembalian.id_a = anggota.id_a')
		 ->join('buku', 'pengembalian.id_b = buku.id_b')->get()->getResult();
		return $query;
		
    }

	
    
}