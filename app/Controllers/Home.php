<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'HaloKos | Dashboard'
		];

		return view('pages\dashboard', $data);
	}
}
