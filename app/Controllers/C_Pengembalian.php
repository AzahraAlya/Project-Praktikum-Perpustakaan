<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class C_Pengembalian extends BaseController
{
	public function index()
	{

		$M_kembali = model("M_kembali");
		
		$data = [
			'kembali' => $M_kembali->getDataKembali(),
			'validation' => \Config\Services::validation(),
		];
		return view('pengembalian/index', $data);
	}


	// public function store($id)
	// {

	// 	$data = [

	// 		'id_a' => $this->request->getVar('id_a'),
	// 		'id_b' => $this->request->getVar('id_b'),
	// 		'id_p' => $id,
	// 		'tgl_kembalikan' => $this->request->getVar('tgl_kembalikan'),
	// 	];
	// 	$M_kembali = model("M_kembali");
	// 	$M_kembali->insert($data);
	// 	return redirect()->to(base_url('/pengembalian'));
	// }


}
