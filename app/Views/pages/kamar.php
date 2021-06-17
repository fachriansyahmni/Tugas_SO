<?= $this->extend("layout/admin") ?>

<?= $this->section("content") ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manajemen Kamar</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Kamar</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">Tambah Kamar</button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">No Kamar</th>
                            <th scope="col">Lantai</th>
                            <th scope="col">Fasilitas</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kamar as $k) :
                        ?>

                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $k['NoKamar'] ?></td>
                                <td><?= $k['Lantai'] ?></td>
                                <td><?= $k['Fasilitas'] ?></td>
                                <td><?= $k['Harga'] ?></td>
                                <td>
                                    <h5>

                                        <?= $k['status_kamar'] == 0 ? '<span class="badge badge-success w-100 py-2">Tersedia</span>' : '<span class="badge badge-denger w-100 py-2">Tersedia</span>' ?>
                                    </h5>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/Kamar/save" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kamar">No Kamar</label>
                                <input type="number" class="form-control" id="kamar" name="kamar">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lantai">Lantai</label>
                                <input type="number" class="form-control" id="lantai" name="lantai">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fasilitas">Fasilitas</label>
                        <input type="text" class="form-control" id="fasilitas" name="fasilitas">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="sumbit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add -->

<?= $this->endSection(); ?>