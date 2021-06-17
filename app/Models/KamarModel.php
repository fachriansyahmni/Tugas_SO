<?php

namespace App\Models;

use CodeIgniter\Model;

class KamarModel extends Model
{
    protected $table      = 'kamar';
    protected $primaryKey = 'NoKamar';

    protected $allowedFields  = ['NoKamar', 'Lantai', 'Fasilitas', 'Harga'];

    public function fetchkamar($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where('NoKamar', $id)->first();
    }
}
