<?php

namespace App\Models;

use CodeIgniter\Model;

class SewaModel extends Model
{
    protected $table      = 'sewa';
    protected $primaryKey = 'IdSewa';

    protected $allowedFields  = ['IdSewa', 'TanggalPembayaran', 'TanggalSewa', 'LamaSewa', 'GrandTotal', 'status_sewa', 'IdPenyewa', 'NoKamar'];

    public function fetchSewaJoin($id = false)
    {
        if ($id == false) {
            $result = $this->join('penyewa', 'penyewa.IdPenyewa = sewa.IdPenyewa')
                ->join('kamar', 'kamar.NoKamar = sewa.NoKamar')
                ->findAll();

            return $result;
        }

        return $this->join('penyewa', 'penyewa.IdPenyewa = sewa.IdPenyewa')
            ->join('kamar', 'kamar.NoKamar = sewa.NoKamar')
            ->where('IdSewa', $id)->first();
    }

    public function fetchSewaJoinByStatus()
    {

        $result = $this->join('penyewa', 'penyewa.IdPenyewa = sewa.IdPenyewa')
            ->join('kamar', 'kamar.NoKamar = sewa.NoKamar')
            ->where('status_sewa', 1)
            ->findAll();

        return $result;
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

    public function fetchPembayaran($id = false)
    {
        if ($id == false) {
            $result = $this->fetchSewaJoinByStatus();
            foreach ($result as $index => $pembayaran) {
                $pembayaran["penyewa"] = $this->getDataPenyewa($pembayaran["IdPenyewa"])["NamaPenyewa"];
                $pembayaran["status_pembayaran"] = $this->checkStatusPembayaran($pembayaran["TanggalPembayaran"]);
                $result[$index] = $pembayaran;
            }
            return $result;
        }
        return $this->where('IdSewa', $id);
    }

    public function getDataPenyewa($id)
    {
        return  $this->join('penyewa', 'penyewa.IdPenyewa = sewa.IdPenyewa')->where("penyewa.IdPenyewa", $id)
            ->first();
    }

    public function checkStatusPembayaran($tglPembayaran = null)
    {
        if ($tglPembayaran == null) {
            return "Belum Lunas";
        }
        return "Lunas";
    }

    public function countLunas()
    {
        return $this->selectCount('IdSewa')->where('TanggalPembayaran !=', NULL)->get()->getRow()->IdSewa;
    }

    public function countNuggak()
    {
        return $this->selectCount('IdSewa')->where('TanggalPembayaran =', NULL)->get()->getRow()->IdSewa;
    }

    public function countPenyewa()
    {
        return $this->selectCount('IdSewa')->where('status_sewa', 1)->get()->getRow()->IdSewa;
    }
}
