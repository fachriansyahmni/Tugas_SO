<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyewaModel extends Model
{
    protected $table      = 'Penyewa';
    protected $primaryKey = 'IdPenyewa';

    protected $allowedFields = ['IdPenyewa', 'NamaPenyewa', 'JenisKelamin', 'NoTelp', 'Alamat'];

    // protected $useSoftDeletes = true;

    public function generateIdPenyewa()
    {
        $data   = $this->selectMax('IdPenyewa')->get()->getRowArray();
        $id     = $data['IdPenyewa'];

        $order = (int) substr($id, 2, 4);

        $order++;

        $alphabet = 'P-';
        $id = $alphabet . sprintf("%04s", $order);

        return $id;
    }
}
