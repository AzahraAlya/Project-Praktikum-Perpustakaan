<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pinjam extends Model
{

    protected $table                = 'peminjaman';
	protected $primaryKey           = 'id_p';
	protected $allowedFields        = ['id_peminjaman','id_a','id_b','tgl_pinjam','tgl_kembali','created_at', 'updated_at'];
	protected $useTimestamps        = true;


    public function getPinjam($id=false){
		if($id == false){
			return $this->findAll();
		}

		return $this->where(['id_p'=> $id]) -> first();
	}
    
}