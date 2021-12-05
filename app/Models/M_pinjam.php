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

	public function id_peminjaman(){

		$kode = $this->db->table('peminjaman')
		->select('RIGHT(id_peminjaman,3) as id_peminjaman', false)
		->orderBy('id_peminjaman', 'DESC')
		->limit(1)->get()->getRowArray();

		if($kode['id_peminjaman']==null){
			$no = 1;
		}else{
			$no = intval($kode['id_peminjaman']) + 1;
		}

		$tgl = 'PM';
		$batas = str_pad($no, 3, "0", STR_PAD_LEFT);
		$id_peminjaman = $tgl.$batas;
		return $id_peminjaman;
	}

	public function getDataPeminjaman(){
        //  $this->db->table('peminjaman')->select('*')  //->from('peminjaman')
		// ->join('anggota', 'peminjaman.id_a = anggota.id_a')
        // ->join('buku', 'peminjaman.id_b = buku.id_b')->get()->getRowArray();
        // return $this;
		// $this->db->table('peminjaman');
		// $this->db->select('*');
        // $this->db->join('anggota', 'peminjaman.id_anggota = anggota.id_anggota');
        // $this->db->join('buku', 'peminjaman.id_buku = buku.id_buku');
        // return $this->db->get()->result();

		$query = $this->db->table('peminjaman')->select('*')
		 ->join('anggota', 'peminjaman.id_a = anggota.id_a')
		 ->join('buku', 'peminjaman.id_b = buku.id_b')->get()->getResult();
		//$query = $builder->get()->result();
		return $query;
		
    }

	// public function jumlah_buku($id){

    //     $kode = $this->db->table('jumlah')->select('buku')->where('id_b', $id)->get()->getRowArray();
    //     return $kode;
    // }

	public function getDataById_p($id){
        $query = $this->db->table('peminjaman')->select('*')
		->join('anggota', 'peminjaman.id_a = anggota.id_a')
		->join('buku', 'peminjaman.id_b = buku.id_b')
        ->where('peminjaman.id_p',$id)->get()->getRow();
        return $query;
    }

	public function deletePm($id)
    {
        //$this->db->where('id_p', $id)->delete('peminjaman');
		$db      = \Config\Database::connect();
		$builder = $db->table('peminjaman');
		$builder->where('id_p', $id);
		$builder->delete();
    }
    
}