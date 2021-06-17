<?php

namespace App\Controllers;

class Sewa extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'HaloKos | Daftar Sewa',
            'sewa' => $this->sewaModel->fetchSewaJoin(),
        ];

        return view('pages\Sewa', $data);
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
            'TanggalPembayaran' => '',
            'TanggalSewa'       => $tglSewa,
            'TanggalAkhirSewa'  => $tglAkhirSewa,
            'GrandTotal'        => $grandTotal,
            'status_sewa'       => '',
            'IdPenyewa'         => $idPenyewa,
            'NoKamar'           => $noKamar
        ]);

        return redirect()->to('/sewa');
    }
}
