<?php

namespace App\Controllers;

use App\Models\M_pinjam;
use App\Controllers\BaseController;

class Peminjaman extends BaseController
{
	public function index()
	{
		$M_pinjam = model("M_pinjam");
		$data = [
			'pinjam' => $M_pinjam->findAll(),
			'validation' => \Config\Services::validation(),
		];
		return view('peminjaman/index', $data);
	}

	public function tambah()
	{
		// session();
		return view('peminjaman/tambah');
	}
}
