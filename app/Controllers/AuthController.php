<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_user;
use App\Models\M_auth;

class AuthController extends BaseController
{
	public function index()
	{
		$data['title'] = "Login Application";
		return view('auth/login', $data);
	}

	public function register()
	{
		session();	
		$data = [
			'title' => "Register Application",
			'validate' => \Config\Services::validation(),
		];
		return view('auth/register', $data);
	}

	public function saveRegister(){

		$val = $this->validate(
			[
				'firstname' => 'required',
				'lastname' => 'required',
				'email' => [
					'rules' => 'required|is_unique[user.email]',
					'errors' => [
						'is_unique' => '{field} sudah terdaftar'
					]],
				'username' => [
					'rules' => 'required|is_unique[user.username]',
					'errors' => [
						'is_unique' => '{field} sudah dipakai'
					]],
				'password' => 'required',
			]
					);

		if(!$val){
			$pesanvalidasi = \Config\Services::validation();
			return redirect()->to('/register')->withInput()->with('validate', $pesanvalidasi);
		}
		$data = [
			'firstname' => $this->request->getPost('firstname'),
			'lastname' => $this->request->getPost('lastname'),
			'username' => $this->request->getPost('username'),
			'email' => $this->request->getPost('email'),
			'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
		];
		$M_user = model("M_user");
		$M_user->insert($data);
		session()->setFlashdata('pesan', 'Selamat Anda berhasil Registrasi, silakan login!');
		return redirect()->to('/');
	}

	public function saveLogin(){
		$model = new M_auth;
		$table = 'user';
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$row = $model->get_data_login($username, $table);
		if($row == NULL){
			session()->setFlashdata('pesan','username anda salah');
			return redirect()->to('/');
		}
		if(password_verify($password, $row->password)){
			$data = [
				'log' => TRUE,
				'firstname' => $row->username,
				'lastname' => $row->lastname,
				'username' => $row->username,
				'email' => $row->email,
			];
			session()->set($data);
			session()->setFlashdata('pesan', 'berhasil login');
			return redirect()->to('/dashboard');
		}

		session()->setFlashdata('pesan', 'password salah');
		return redirect()->to('/');
	}

	public function logout(){
		$session = session();
		$session->destroy();
		session()->setFlashdata('pesan', 'berhasil logout');
		return redirect()->to('/');
	}
}
