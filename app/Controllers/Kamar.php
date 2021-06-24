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

    public function getDataKamar()
    {
        echo json_encode($this->kamarModel->fetchkamar($_POST['id']));
    }

    public function save()
    {
        $this->kamarModel->insert([
            'NoKamar'       => $this->request->getVar('kamar'),
            'Lantai'        => $this->request->getVar('lantai'),
            'Fasilitas'     => $this->request->getVar('fasilitas'),
            'Harga'         => $this->request->getVar('harga'),
        ]);

        return redirect()->to('/kamar');
    }

    public function update($id)
    {
        $this->kamarModel->update($id, [
            'Lantai'        => $this->request->getVar('lantai'),
            'Fasilitas'     => $this->request->getVar('fasilitas'),
            'Harga'         => $this->request->getVar('harga'),
        ]);

        return redirect()->to('/kamar');
    }

    public function delete($id)
    {
        $this->kamarModel->delete($id);

        return redirect()->to('/kamar');
    }
}
