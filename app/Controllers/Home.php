<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'HaloKos | Dashboard',
			'kamar' =>  $this->kamarModel->countKamar(),
			'penyewa' => $this->penyewaModel->countPenyewa(),
			'lunas' => $this->sewaModel->countLunas(),
			'nunggak' => $this->sewaModel->countNuggak()
		];

		return view('pages\dashboard', $data);
	}
}
