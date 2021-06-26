<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
	public function index()
	{
		return view("auth/login");
	}

	public function login()
	{
		$users = new UserModel();
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
		$dataUser = $users->where([
			'username' => $username,
		])->first();
		if ($dataUser) {
			if (password_verify($password, $dataUser["password"])) {
				session()->set([
					'username' => $dataUser["username"],
					'nama' => $dataUser["nama"],
					'logged_in' => TRUE
				]);
				return redirect()->to(base_url('/'));
			} else {
				session()->setFlashdata('error', 'Username & Password Salah');
				return redirect()->back();
			}
		} else {
			session()->setFlashdata('error', 'Username & Password Salah');
			return redirect()->back();
		}
	}
	function logout()
	{
		session()->destroy();
		return redirect()->to('/login');
	}
}
