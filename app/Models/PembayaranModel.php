<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends SewaModel
{
    protected $table      = 'riwayat_sewa';
    protected $primaryKey = 'IdRiwayatSewa';

    protected $allowedFields  = ['IdRiwayatSewa', 'TanggalPembayaran', 'TanggalSewa', 'LamaSewa', 'GrandTotal', 'status_sewa', 'IdSewa'];

    public function generateIdRiwayatSewa()
    {
        $data   = $this->selectMax('IdRiwayatSewa')->get()->getRowArray();
        $id     = $data['IdRiwayatSewa'];

        $order = (int) substr($id, 3, 3);

        $order++;

        $alphabet = 'RS-';
        $id = $alphabet . sprintf("%03s", $order);

        return $id;
    }

    public function fetchPembayaranJoin($id = false)
    {
        if ($id == false) {
            $result = $this->Select('riwayat_sewa.IdRiwayatSewa, riwayat_sewa.TanggalPembayaran, riwayat_sewa.TanggalSewa, riwayat_sewa.LamaSewa, riwayat_sewa.GrandTotal, penyewa.NamaPenyewa, kamar.NoKamar, kamar.Harga')
                ->join('sewa', 'sewa.IdSewa = riwayat_sewa.IdSewa')
                ->join('penyewa', 'penyewa.IdPenyewa = sewa.IdPenyewa')
                ->join('kamar', 'kamar.NoKamar = sewa.NoKamar')
                ->findAll();

            return $result;
        }

        return $this->where('IdSewa', $id);
    }
}
