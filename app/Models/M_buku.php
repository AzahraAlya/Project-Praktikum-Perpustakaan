<?php

namespace App\Models;

use CodeIgniter\Model;

class M_buku extends Model
{

    protected $table                = 'buku';
	protected $primaryKey           = 'id_b';
	protected $allowedFields        = ['kode_buku','judul_buku','penulis','penerbit','thn_terbit','created_at','updated_at'];
	protected $useTimestamps        = true;



	public function kode_buku(){
		$kode = $this->db->table('buku')
		->select('RIGHT(kode_buku,3) as kode_buku', false)
		->orderBy('kode_buku', 'DESC')
		->limit(1)->get()->getRowArray();

		if($kode['kode_buku']==null){
			$no = 1;
		}else{
			$no = intval($kode['kode_buku']) + 1;
		}

		$tgl = 'BK';
		$batas = str_pad($no, 3, "0", STR_PAD_LEFT);
		$kode_buku = $tgl.$batas;
		return $kode_buku;
	}

    public function getBuku($id=false){
		if($id == false){
			return $this->findAll();
		}

		return $this->where(['id_b'=> $id]) -> first();
	}
    
}