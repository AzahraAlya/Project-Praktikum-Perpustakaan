<?php

namespace App\Models;

use CodeIgniter\Model;

class M_buku extends Model
{

    protected $table                = 'buku';
	protected $primaryKey           = 'id';
	protected $allowedFields        = ['kode_buku','judul_buku','penulis','penerbit','thn_terbit','created_at','updated_at'];
	protected $useTimestamps        = true;

    public function getBuku($id=false){
		if($id == false){
			return $this->findAll();
		}

		return $this->where(['id'=> $id]) -> first();
	}
    
}