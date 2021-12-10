<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
	public function index()
	{
		$data['title'] = "Login Application";
		return view('auth/login', $data);
	}

	public function register()
	{
		$data['title'] = "Register Application";
		return view('auth/register', $data);
	}
}
