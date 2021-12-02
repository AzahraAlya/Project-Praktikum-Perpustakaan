<?php

namespace App\Controllers;

use App\Models\M_pinjam;
use App\Controllers\BaseController;

class C_Peminjaman extends BaseController
{
	public function index()
	{
		$M_pinjam = model("M_pinjam");
		
		$data = [
			'pinjam' => $M_pinjam->getDataPeminjaman(),
			'validation' => \Config\Services::validation(),
		];
		return view('peminjaman/index', $data);
	}

	public function tambah()
	{
		
		$M_pinjam = model("M_pinjam");
		$M_anggota = model("M_anggota");
		$M_buku = model("M_buku");
		$id_peminjaman = $M_pinjam->id_peminjaman();
		// session();
		$data = [
			'validation' => \Config\Services::validation(),
			'id_peminjaman' => $id_peminjaman,
			'peminjam' => $M_anggota->findAll(),
			'buku' => $M_buku->findAll(),
		];
		// session();
		return view('peminjaman/tambah' , $data);
	}

	public function store()
	{
		// session();
		//$id_anggota = $this->M_anggota->id_anggota();

		$data = [
			'id_peminjaman' => $this->request->getVar('id_peminjaman'),
			'id_a' => $this->request->getVar('id_a'),
			'id_b' => $this->request->getVar('id_b'),
			'tgl_pinjam' => $this->request->getVar('tgl_pinjam'),
			'tgl_kembali' => $this->request->getVar('tgl_kembali'),
		];
		$M_pinjam = model("M_pinjam");
		$M_pinjam->insert($data);
		return redirect()->to(base_url('/peminjaman'));
	}

	public function jumlah_buku(){
        $id = $this->input->post('id');
        $pinjam =$this->m_peminjaman->jumlah_buku($id);
        echo json_encode($pinjam);
    }
}
