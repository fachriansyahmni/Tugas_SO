<?php

namespace App\Controllers;

class Pembayaran extends Sewa
{
    public function index()
    {
        $data = [
            'title' => 'HaloKos | Pembayaran',
            'pembayaran' => $this->sewaModel->fetchPembayaran()
        ];
        return view('pages\pembayaran', $data);
    }
}
