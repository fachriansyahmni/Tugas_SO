<?= $this->extend("layout/admin") ?>

<?= $this->section("content") ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manajemen Sewa</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Sewa</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd" id="tambah">Tambah Sewa</button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kamar</th>
                            <th scope="col">Jatuh Tempo</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($sewa as $s) :
                        ?>

                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $s['NamaPenyewa'] ?></td>
                                <td><?= $s['NoKamar'] ?></td>

                                <?php
                                if ($s['TanggalAkhirSewa'] == date('Y-m-d')) {
                                ?>

                                    <td>
                                        <button type="button" class="btn btn-warning mr-3">Kirim Pesan</button>
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalPerpanjang">Perpanjang</button>
                                    </td>

                                <?php
                                } else {
                                ?>
                                    <td><?= $s['TanggalAkhirSewa'] ?></td>

                                <?php
                                }
                                ?>

                                <td>
                                    <button type="button" class="btn btn-success edit" data-id="<?= $s['IdPenyewa'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger" id="hapus">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>

                        <?php
                        endforeach;
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- End Content Column -->

</div>
<!-- End Content Row -->

<!-- Modal Add -->
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Sewa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/Sewa/save" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>Jenis Kelamin</label>
                        </div>
                        <div class="col-md-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk_l" value="Laki-Laki">
                                <label class="form-check-label" for="jk_l">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jk" id="jk_p" value="Perempuan">
                                <label class="form-check-label" for="jk_p">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telepon">No Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="5"></textarea>
                    </div>
                    <div class="form-grup">
                        <label for="kamar">Kamar</label>
                        <select id="kamar" class="form-control" name="kamar">
                            <option selected>-- Pilih Kamar --</option>
                            <option value="01">01</option>
                            <option>02</option>
                            <option>03</option>
                        </select>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="awalSewa">Tanggal Awal Sewa</label>
                                <input type="date" class="form-control" id="awalSewa" name="awalSewa">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="akhirSewa">Tanggal Akhir Sewa</label>
                                <input type="date" class="form-control" id="akhirSewa" name="akhirSewa">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add -->

<!-- Modal Perpanjang -->
<div class="modal fade" id="modalPerpanjang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Perpanjang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="awalSewa">Tanggal Awal Sewa</label>
                                <input type="date" class="form-control" id="awalSewa" name="awalSewa">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="akhirSewa">Tanggal Akhir Sewa</label>
                                <input type="date" class="form-control" id="akhirSewa" name="akhirSewa">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Perpanjang -->

<?= $this->endSection(); ?>