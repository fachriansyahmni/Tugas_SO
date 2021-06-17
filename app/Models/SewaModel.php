<?php

namespace App\Models;

use CodeIgniter\Model;

class SewaModel extends Model
{
    protected $table      = 'sewa';
    protected $primaryKey = 'IdSewa';

    protected $allowedFields  = ['IdSewa', 'TanggalPembayaran', 'TanggalSewa', 'TanggalAkhirSewa', 'GrandTotal', 'status_sewa', 'IdPenyewa', 'NoKamar'];

    // protected $useSoftDeletes = true;

    public function fetchSewaJoin($id = false)
    {
        if ($id == false) {
            $result = $this->join('penyewa', 'penyewa.IdPenyewa = sewa.IdPenyewa')
                ->join('kamar', 'kamar.NoKamar = sewa.NoKamar')
                ->findAll();

            return $result;
        }

        return $this->where('IdSewa', $id);
    }

    public function generateIdSewa()
    {
        $data   = $this->selectMax('IdSewa')->get()->getRowArray();
        $id     = $data['IdSewa'];

        $order = (int) substr($id, 3, 3);

        $order++;

        $alphabet = 'SW-';
        $id = $alphabet . sprintf("%03s", $order);

        return $id;
    }
}
