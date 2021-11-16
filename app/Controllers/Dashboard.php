<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		return view('body');
	}

	public function anggota()
	{
		// session();
		$data =[
			'validation' => \Config\Services::validation(),
		];
		return view('anggota/index', $data);
	}

	public function tambah()
	{
		// session();
		$data =[
			'validation' => \Config\Services::validation(),
		];
		return view('anggota/tambah', $data);
	}
}
