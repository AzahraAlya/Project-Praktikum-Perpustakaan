<?php

namespace App\Models;

use CodeIgniter\Model;

class M_anggota extends Model
{

    protected $table                = 'anggota';
	protected $primaryKey           = 'id_a';
	protected $allowedFields        = ['id_anggota','nama','jenis_kelamin','alamat','no_hp','created_at', 'updated_at'];
	protected $useTimestamps        = true;



    public function id_anggota(){
		$kode = $this->db->table('anggota')
		->select('RIGHT(id_anggota,3) as id_anggota', false)
		->orderBy('id_anggota', 'DESC')
		->limit(1)->get()->getRowArray();

		if($kode['id_anggota']==null){
			$no = 1;
		}else{
			$no = intval($kode['id_anggota']) + 1;
		}

		$tgl = 'AB';
		$batas = str_pad($no, 3, "0", STR_PAD_LEFT);
		$id_anggota = $tgl.$batas;
		return $id_anggota;
	}
    // public function id_anggota(){

    //     $query = $this->db->table('anggota')
    //     ->select('RIGHT(anggota.id_anggota,3) as kode', FALSE)
    //     ->orderBy('id_anggota', 'DESC')
    //     ->limit(1)->get()->getRowArray();

    //     if($query->num_rows()<>0){
    //         $data = $query->row();
    //         $kode = intval($data->kode)+1;
    //     }else{
    //         $kode = 1;
    //     }
    //     $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
    //     $kodejadi = "AB".$kodemax;
    //     return $kodejadi;

    //     // if($query->num_rows() == 0){
    //     //     $kode = 1;
    //     // }else{
    //     //     $data = $query->row();
    //     //     $kode = intval($data->kode)+1;
    //     // }
    //     // $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
    //     // $kodejadi = "AB".$kodemax;
    //     // return $kodejadi;
    // }

    public function getAnggota($id=false){
		if($id == false){
			return $this->findAll();
		}

		return $this->where(['id_a'=> $id]) -> first();
	}
    
}