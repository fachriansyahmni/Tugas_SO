<?php
function rupiah($angka)
{
    $rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $rupiah;
}
