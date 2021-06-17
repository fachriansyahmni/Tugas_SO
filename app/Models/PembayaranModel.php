<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends SewaModel
{
    protected $table      = 'riwayat_sewa';
    protected $primaryKey = 'IdRiwayatSewa';

    protected $allowedFields  = ['IdRiwayatSewa', 'TanggalPembayaran', 'TanggalSewa', 'TanggalAkhirSewa', 'GrandTotal', 'status_sewa', 'IdSewa'];

    public function fetchPembayaranJoin($id = false)
    {
        if ($id == false) {
            $result = $this->join('sewa', 'sewa.IdSewa = riwayat_sewa.IdSewa')
                ->findAll();

            return $result;
        }

        return $this->where('IdSewa', $id);
    }
}
