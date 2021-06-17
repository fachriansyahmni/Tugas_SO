<?php

namespace App\Controllers;

class Kamar extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'HaloKos | Daftar Kamar',
            'kamar' => $this->kamarModel->fetchKamar()
        ];

        return view('pages\kamar', $data);
    }

    public function save()
    {
        $nokamar    = $this->request->getVar('kamar');
        $lantai     = $this->request->getVar('lantai');
        $fasilitas  = $this->request->getVar('fasilitas');
        $harga  = $this->request->getVar('harga');

        $this->kamarModel->insert([
            'NoKamar'       => $nokamar,
            'Lantai'        => $lantai,
            'Fasilitas'     => $fasilitas,
            'Harga'         => $harga,
            'status_kamar'  => ''
        ]);

        return redirect()->to('/kamar');
    }
}
