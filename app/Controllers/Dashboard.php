<?php

namespace App\Controllers;

use App\Models\M_anggota;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{
		return view('body');
	}

	public function anggota()
	{
		$M_anggota = model("M_anggota");
		
		// session();
		$data = [
			'anggota' => $M_anggota->findAll(),
			'validation' => \Config\Services::validation(),
			
		];
		return view('anggota/index', $data);
	}

	public function tambah()
	{
		// session();
		$data = [
			'validation' => \Config\Services::validation(),
		];
		return view('anggota/tambah', $data);
	}

	public function delete($id){

		$M_anggota = model("M_anggota");
		$M_anggota->delete($id);
		return redirect()->to(base_url('/anggota'));
	}
}
