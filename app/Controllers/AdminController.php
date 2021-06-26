<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AdminController extends UserController
{
	public function index()
	{
		$data = [
			'title' => 'HaloKos | Admin',
		];

		return view('pages\admin', $data);
	}


	public function process()
	{
		if (!$this->validate([
			'username' => [
				'rules' => 'required|min_length[4]|max_length[20]|is_unique[users.username]',
				'errors' => [
					'required' => '{field} Harus diisi',
					'min_length' => '{field} Minimal 4 Karakter',
					'max_length' => '{field} Maksimal 20 Karakter',
					'is_unique' => 'Username sudah digunakan sebelumnya'
				]
			],
			'password' => [
				'rules' => 'required|min_length[4]|max_length[50]',
				'errors' => [
					'required' => '{field} Harus diisi',
					'min_length' => '{field} Minimal 4 Karakter',
					'max_length' => '{field} Maksimal 50 Karakter',
				]
			],
			'nama' => [
				'rules' => 'required|min_length[4]|max_length[100]',
				'errors' => [
					'required' => '{field} Harus diisi',
					'min_length' => '{field} Minimal 4 Karakter',
					'max_length' => '{field} Maksimal 100 Karakter',
				]
			],
		])) {
			session()->setFlashdata('error', $this->validator->listErrors());
			return redirect()->back()->withInput();
		}
		$users = new UserModel();
		$users->insert([
			'username' => $this->request->getVar('username'),
			'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
			'nama' => $this->request->getVar('nama'),
		]);
		return redirect()->back();
	}
}
