<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class C_Pengembalian extends BaseController
{
	public function index()
	{
		return view('pengembalian/index');
	}
}
