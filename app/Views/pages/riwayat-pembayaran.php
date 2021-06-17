<?= $this->extend("layout/admin"); ?>

<?= $this->section("content"); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manajemen Riwayat Pembayaran</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Riwayat Pembayaran</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">No Transaksi</th>
                            <th scope="col">Penghuni</th>
                            <th scope="col">No Kamar</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>TR-001</td>
                            <td>Adit</td>
                            <td>01</td>
                            <td>Rp. 500.000</td>
                            <td>
                                <h5><span class="badge badge-success w-100 py-2">Lunas</span></h5>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDetail">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>TR-002</td>
                            <td>Jajang</td>
                            <td>02</td>
                            <td>Rp. 500.000</td>
                            <td>
                                <h5><span class="badge badge-danger w-100 py-2">Belum Bayar</span></h5>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- End Content Column -->

</div>
<!-- End Content Row -->

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="id" class="col-md-3">No Transaksi</label>
                        <input type="text" class="form-control col-md-8" id="id" name="id">
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-3">Nama Penghuni</label>
                        <input type="text" class="form-control col-md-8" id="nama" name="nama">
                    </div>
                    <div class="form-group row">
                        <label for="kamar" class="col-md-3">No Kamar</label>
                        <input type="number" class="form-control col-md-8" id="kamar" name="kamar">
                    </div>
                    <div class="form-group row">
                        <label for="kamar" class="col-md-3">Status</label>
                        <h5><span class="badge badge-success py-2 col-md-12">Lunas</span></h5>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal" class="col-md-3">Lama Sewa</label>
                        <input type="date" class="form-control col-md-4" name="awalSewa">
                        <input type="date" class="form-control col-md-4" name="akhirSewa">
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-md-3">Harga</label>
                        <input type="number" class="form-control col-md-8" id="harga" name="harga">
                    </div>
                    <div class="form-group row">
                        <label for="total" class="col-md-3">Total Harga</label>
                        <input type="number" class="form-control col-md-8" id="total" name="harga">
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
<!-- End Modal Detail -->

<?= $this->endSection(); ?>