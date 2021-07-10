<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'HaloKos | Dashboard',
            'kamar' =>  $this->kamarModel->countKamar(),
            'penyewa' => $this->sewaModel->countPenyewa(),
            'lunas' => $this->sewaModel->countLunas(),
            'nunggak' => $this->sewaModel->countNuggak()
        ];

        return view('pages/dashboard', $data);
    }
}
