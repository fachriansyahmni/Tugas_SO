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
    public function riwayatIndex()
    {
        $data = [
            'title' => 'HaloKos | Riwayat Pembayaran',
            'riwayatPembayarans' => $this->pembayaranModel->fetchPembayaranJoin()
        ];
        return view('pages\riwayat-pembayaran', $data);
    }



    public function aksiBayar()
    {
        $idSewa        = $this->request->getVar('idSewa');
        $tglPembayaran = date('Y-m-d');
        $simpanPembayaran = $this->sewaModel->update($idSewa, [
            'TanggalPembayaran'   => $tglPembayaran,
        ]);
        if ($simpanPembayaran) {
            $dataSewa = $this->sewaModel->fetchSewaJoin($idSewa);
            $this->pembayaranModel->insert([
                'IdRiwayatSewa'     => $this->pembayaranModel->generateIdRiwayatSewa(),
                'TanggalPembayaran' => $tglPembayaran,
                'TanggalSewa'       => $dataSewa["TanggalSewa"],
                'LamaSewa'          => $dataSewa["LamaSewa"],
                'GrandTotal'        => $dataSewa["GrandTotal"],
                'status_sewa'       => $dataSewa["status_sewa"],
                'IdSewa'            => $idSewa
            ]);
        }
        return redirect()->to('/pembayaran');
    }
}
