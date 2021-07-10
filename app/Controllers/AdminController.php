<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AdminController extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'HaloKos | Admin',
			'admins' => $this->userModel->fetchadmin()
		];
		return view('pages/admin', $data);
	}

	public function getDataAdmin()
	{
		echo json_encode($this->userModel->fetchadmin($_POST['id']));
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
		return redirect()->to("/admin");
	}

	public function update($id)
	{
		$dataAdmin = $this->userModel->fetchadmin($id);
		if ($this->request->getVar('password') == "") {
			$this->userModel->update($id, [
				'nama'		=> $this->request->getVar('nama'),
				'username'	=> $this->request->getVar('username'),
				'password'	=> $dataAdmin['password']
			]);
		} else {
			$this->userModel->update($id, [
				'nama'		=> $this->request->getVar('nama'),
				'username'	=> $this->request->getVar('username'),
				'password'	=> $this->request->getVar('password')
			]);
		}
		return redirect()->to('/admin');
	}

	public function delete($id)
	{
		$this->userModel->delete($id);

		return redirect()->to('/admin');
	}
}
