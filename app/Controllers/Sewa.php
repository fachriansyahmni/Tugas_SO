<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;

class Sewa extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'HaloKos | Daftar Sewa',
            'sewa' => $this->sewaModel->fetchSewaJoinByStatus(),
            'kamar' => $this->kamarModel->fetchKamarByStatus(),

        ];

        return view('pages/Sewa', $data);
    }

    public function getDataSewa()
    {
        echo json_encode($this->sewaModel->fetchSewaJoin($_POST['id']));
    }

    public function getDataPenyewa()
    {
        echo json_encode($this->penyewaModel->fetchPenyewa($_POST['id']));
    }

    public function save()
    {
        $idSewa         = $this->sewaModel->generateIdSewa();
        $lamaSewa       = $this->request->getVar('lamasewa');
        $noKamar        = $this->request->getVar('kamar');
        $idPenyewa      = $this->penyewaModel->generateIdPenyewa();
        $nama           = $this->request->getVar('nama');
        $jk             = $this->request->getVar('jk');
        $telepon        = $this->request->getVar('telepon');
        $alamat         = $this->request->getVar('alamat');

        //Insert Table Penyewa
        $this->penyewaModel->insert([
            'IdPenyewa'     => $idPenyewa,
            'NamaPenyewa'   => $nama,
            'JenisKelamin'  => $jk,
            'NoTelp'        => $telepon,
            'Alamat'        => $alamat
        ]);

        //get table kamar
        $kamar = $this->kamarModel->fetchkamar($noKamar);

        //calculate grandTotal
        $grandTotal = $lamaSewa * $kamar['Harga'];

        //Insert Table Sewa
        $this->sewaModel->insert([
            'IdSewa'            => $idSewa,
            'TanggalSewa'       => date("Y-m-d"),
            'LamaSewa'          => $lamaSewa,
            'GrandTotal'        => $grandTotal,
            'IdPenyewa'         => $idPenyewa,
            'NoKamar'           => $noKamar
        ]);

        // Update status kamar
        $this->kamarModel->update($noKamar, [
            'status_kamar'  => 1
        ]);

        return redirect()->to('/sewa');
    }

    public function update($id)
    {
        $this->penyewaModel->update($id, [
            'NamaPenyewa'   => $this->request->getVar('nama'),
            'JenisKelamin'  => $this->request->getVar('jk'),
            'NoTelp'        => $this->request->getVar('telepon'),
            'Alamat'        => $this->request->getVar('alamat')
        ]);

        return redirect()->to('/sewa');
    }

    public function delete($id)
    {
        $dataSewa = $this->sewaModel->fetchSewaJoin($id);

        $hapusSewa = $this->sewaModel->update($id, [
            'status_sewa' => 0
        ]);

        if ($hapusSewa) {
            // update status kamar
            $this->kamarModel->update($dataSewa['NoKamar'], [
                'status_kamar' => 0
            ]);
        }

        return redirect()->to('/sewa');
    }

    public function perpanjang($id)
    {
        $lamaSewa = $this->request->getVar('lamasewa');

        //get data sewa
        $dataSewa = $this->sewaModel->fetchSewaJoin($id);

        //get table kamar
        $kamar = $this->kamarModel->fetchkamar($dataSewa['NoKamar']);

        //calculate grandTotal
        $grandTotal = $lamaSewa * $kamar['Harga'];

        $this->sewaModel->update($id, [
            'TanggalPembayaran' => null,
            'TanggalSewa'       => date("Y-m-d"),
            'LamaSewa'          => $lamaSewa,
            'GrandTotal'        => $grandTotal
        ]);

        return redirect()->to('/sewa');
    }
}
