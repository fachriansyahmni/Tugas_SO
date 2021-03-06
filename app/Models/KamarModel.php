<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
    protected $table      = 'kamar';
    protected $primaryKey = 'NoKamar';

    protected $allowedFields  = ['NoKamar', 'Lantai', 'Fasilitas', 'Harga', 'status_kamar'];

    public function fetchkamar($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where('NoKamar', $id)->first();
    }

    public function fetchKamarByStatus()
    {
        return $this->where('status_kamar', 0)->findAll();
    }

    public function countKamar()
    {
        return $this->selectCount('NoKamar')->countAll();
    }

    public function changeToTersedia($id)
    {
        $data = [
            'status_kamar' => 0
        ];
        return $this->update($id, $data);
    }
    public function changeToTidakTersedia($id)
    {
        $data = [
            'status_kamar' => 1
        ];
        return $this->update($id, $data);
    }
}
