<?php

namespace App\Controllers;

use App\Models\M_anggota;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{
		$M_anggota = model("M_anggota");
		$M_buku = model("M_buku");
		$M_pinjam = model("M_pinjam");
		$M_kembali = model("M_kembali");
		$data = [
		'anggota' => $M_anggota->findAll(),
		'buku' => $M_buku->findAll(),
		'pinjam' => $M_pinjam->findAll(),
		'kembali' => $M_kembali->findAll(),
	];
		return view('v_admin', $data);
	}

	public function anggota()
	{
		$M_anggota = model("M_anggota");

		// session();
		$data = [
			'anggota' => $M_anggota->findAll(),
			// 'anggota' => $M_anggota->paginate(5),
			// 'pager' => $M_anggota->pager,
			'validation' => \Config\Services::validation(),

		];
		return view('anggota/index', $data);
	}

	public function tambah()
	{
		$M_anggota = model("M_anggota");
		$id_anggota = $M_anggota->id_anggota();
		// session();
		$data = [
			'validation' => \Config\Services::validation(),
			'id_anggota' => $id_anggota,
		];
		return view('anggota/tambah', $data);
	}



	public function store()
	{
		// session();
		//$id_anggota = $this->M_anggota->id_anggota();

		$data = [
			'id_anggota' => $this->request->getVar('id_anggota'),
			'nama' => $this->request->getVar('nama'),
			'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
			'alamat' => $this->request->getVar('alamat'),
			'no_hp' => $this->request->getVar('no_hp'),
		];
		$M_anggota = model("M_anggota");
		$M_anggota->insert($data);
		return redirect()->to(base_url('/anggota'));
	}

	public function edit($id)
	{
		$M_anggota = model("M_anggota");
		$data = [
			'validation' => \Config\Services::validation(),
			'anggota' => $M_anggota->getAnggota($id),
		];
		return view('anggota/edit', $data);
	}

	public function update($id)
	{

		$M_anggota = model("M_anggota");
		// $request = \Config\Services::request();

		// $slug = url_title($request->getVar('judul'), '-', true);
		$M_anggota->save([
			'id_a' => $id,
			'id_anggota' => $this->request->getVar('id_anggota'),
			'nama' => $this->request->getVar('nama'),
			'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
			// 'slug' => $slug,
			'alamat' => $this->request->getVar('alamat'),
			'no_hp' => $this->request->getVar('no_hp'),

		]);

		return redirect()->to(base_url('/anggota'));
	}


	public function delete($id)
	{

		$M_anggota = model("M_anggota");
		$M_anggota->delete($id);
		return redirect()->to(base_url('/anggota'));
	}

	public function buku()
	{

		$M_buku = model("M_buku");
		
		// session();
		$data = [
			'buku' => $M_buku->findAll(),
			'validation' => \Config\Services::validation(),
			
		];
		return view('buku/index', $data);
	
	}

	public function tambahbuku()
	{
		// session();
		$M_buku = model("M_buku");
		$kode_buku = $M_buku->kode_buku();
		// session();
		$data = [
			'validation' => \Config\Services::validation(),
			'kode_buku' => $kode_buku,
		];
		return view('buku/tambah', $data);

		
	}

	public function storebuku(){
		
		$data = [
			'kode_buku' => $this->request->getVar('kode_buku'),
            'judul_buku' => $this->request->getVar('judul_buku'),
            'penulis' => $this->request->getVar('penulis'),
			'penerbit' => $this->request->getVar('penerbit'),
			'thn_terbit' => $this->request->getVar('thn_terbit'),
		];
		$M_buku = model("M_buku");
        $M_buku->insert($data);
		return redirect()->to(base_url('/buku'));
	}

	public function editbuku($id)
	{
		$M_buku = model("M_buku");
		$data = [
			'validation' => \Config\Services::validation(),
			'buku' => $M_buku->getBuku($id),
		];
		return view('buku/edit', $data);
		// session();
	}

	public function updatebuku($id)
	{

		$M_buku = model("M_buku");
		// $request = \Config\Services::request();

		// $slug = url_title($request->getVar('judul'), '-', true);
		$M_buku->save([
			'id_b' => $id,
			'kode_buku' => $this->request->getVar('kode_buku'),
			'judul_buku' => $this->request->getVar('judul_buku'),
			'penulis' => $this->request->getVar('penulis'),
			// 'slug' => $slug,
			'penerbit' => $this->request->getVar('penerbit'),
			'thn_terbit' => $this->request->getVar('thn_terbit'),

		]);

		return redirect()->to(base_url('/buku'));
	}

	public function deletebuku($id)
	{
		$M_buku = model("M_buku");
		$M_buku->delete($id);
		return redirect()->to(base_url('/buku'));
	}
}
