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

        return view('pages/kamar', $data);
    }

    public function getDataKamar()
    {
        echo json_encode($this->kamarModel->fetchkamar($_POST['id']));
    }

    public function save()
    {
        $noKamar = $this->request->getVar('kamar');
        $cetKamar = $this->kamarModel->fetchkamar($noKamar);
        if ($cetKamar != null) {
            return redirect()->back();
        }
        $this->kamarModel->insert([
            'NoKamar'       => $noKamar,
            'Lantai'        => $this->request->getVar('lantai'),
            'Fasilitas'     => $this->request->getVar('fasilitas'),
            'Harga'         => $this->request->getVar('harga'),
        ]);

        return redirect()->to('/kamar');
    }

    public function update($id)
    {
        $cetKamar = $this->kamarModel->fetchkamar($id);
        if ($cetKamar == null) {
            return redirect()->back();
        }
        $this->kamarModel->update($id, [
            'Lantai'        => $this->request->getVar('lantai'),
            'Fasilitas'     => $this->request->getVar('fasilitas'),
            'Harga'         => $this->request->getVar('harga'),
        ]);

        return redirect()->to('/kamar');
    }

    public function delete($id)
    {
        $cetKamar = $this->kamarModel->fetchkamar($id);
        if ($cetKamar == null) {
            return redirect()->back();
        }
        $this->kamarModel->delete($id);

        return redirect()->to('/kamar');
    }
}
