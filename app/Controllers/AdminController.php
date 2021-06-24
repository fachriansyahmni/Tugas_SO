<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends UserController
{
	public function index()
	{
		$data = [
			'title' => 'HaloKos | Admin',
		];

		return view('pages\admin', $data);
	}
}
