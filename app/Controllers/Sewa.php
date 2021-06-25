<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;

class Sewa extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'HaloKos | Daftar Sewa',
            'sewa' => $this->sewaModel->fetchSewaJoin(),
            'kamar' => $this->kamarModel->fetchKamarByStatus(),
        ];

        return view('pages\Sewa', $data);
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
        $tglSewa        = $this->request->getVar('awalSewa');
        $tglAkhirSewa   = $this->request->getVar('akhirSewa');
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

        //get interval
        $lamaSewa = date_diff(date_create($tglSewa), date_create($tglAkhirSewa))->format('%a');

        //calculate grandTotal
        $grandTotal = $lamaSewa * $kamar['Harga'];

        //Insert Table Sewa
        $this->sewaModel->insert([
            'IdSewa'            => $idSewa,
            'TanggalSewa'       => $tglSewa,
            'TanggalAkhirSewa'  => $tglAkhirSewa,
            'GrandTotal'        => $grandTotal,
            'IdPenyewa'         => $idPenyewa,
            'NoKamar'           => $noKamar
        ]);

        //Insert Data To Riwayat Sewa
        $this->pembayaranModel->insert([
            'IdRiwayatSewa'     => $this->pembayaranModel->generateIdRiwayatSewa(),
            'TanggalSewa'       => $tglSewa,
            'TanggalAkhirSewa'  => $tglAkhirSewa,
            'GrandTotal'        => $grandTotal,
            'IdPenyewa'         => $idPenyewa,
            'NoKamar'           => $noKamar,
            'IdSewa'            => $idSewa
        ]);

        //Update status kamar
        $this->kamarModel->update($noKamar, [
            'status_kamar' => 1
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

        $hapusSewa = $this->penyewaModel->delete($dataSewa['IdPenyewa']);

        if ($hapusSewa) {
            // update status kamar
            $this->kamarModel->update($dataSewa['NoKamar'], [
                'status_kamar' => 0
            ]);
        }

        return redirect()->to('/sewa');
    }
}
