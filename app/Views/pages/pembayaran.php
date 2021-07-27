<?= $this->extend("layout/admin"); ?>

<?= $this->section("content"); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manajemen Pembayaran</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pembayaran</h6>
                <a href="/riwayat-pembayaran" class="btn btn-primary">Riwayat Pembayaran</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
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
                            <?php
                            $no = 1;
                            foreach ($pembayaran as $index => $pmbyrn) :
                            ?>
                                <tr>
                                    <th scope="row"><?= $no++  ?></th>
                                    <td><?= $pmbyrn["IdSewa"] ?></td>
                                    <td><?= $pmbyrn["penyewa"] ?></td>
                                    <td><?= $pmbyrn["NoKamar"]  ?></td>
                                    <td><?= rupiah($pmbyrn["GrandTotal"])  ?></td>
                                    <td>
                                        <?php
                                        if ($pmbyrn["status_pembayaran"] == "Lunas") {
                                            $badge_color = "badge-success";
                                        } else {
                                            $badge_color = "badge-danger";
                                        }
                                        ?>
                                        <h5><span class="badge <?= $badge_color ?> w-100 py-2"><?= $pmbyrn["status_pembayaran"]  ?></span></h5>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <?php
                                            if ($pmbyrn["TanggalPembayaran"] == null) {
                                            ?>
                                                <form action="/bayar" method="post">
                                                    <input type="hidden" name="idSewa" value="<?= $pmbyrn["IdSewa"] ?>" id="">
                                                    <button type="submit" class="btn btn-success mr-2">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </form>
                                            <?php
                                            }
                                            ?>
                                            <?php
                                            if ($pmbyrn["status_pembayaran"] != "Lunas") {
                                            ?>
                                                <a href="https://wa.me/<?= $pmbyrn['NoTelp'] ?>/?text=Kepada <?= urlencode($pmbyrn['NamaPenyewa']) ?> mohon untuk segera melakukan pembayaran!, dengan total tagihan <?= rupiah($pmbyrn['GrandTotal']) ?>, terimakasih" target="_blank" class="btn btn-primary mr-2"><i class="fas fa-paper-plane"></i></a>
                                            <?php } ?>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalDetail<?= $index ?>">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>


                                <div class="modal fade" id="modalDetail<?= $index ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Pembayaran</h5>
                                            </div>
                                            <form action="#">
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label for="id" class="col-md-3">No Transaksi</label>
                                                        <input type="text" class="form-control col-md-8" id="id" readonly value="<?= $pmbyrn["IdSewa"] ?>" name="id">
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama" class="col-md-3">Nama Penghuni</label>
                                                        <input type="text" class="form-control col-md-8" id="nama" readonly value="<?= $pmbyrn["penyewa"]  ?>" name="nama">
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="kamar" class="col-md-3">No Kamar</label>
                                                        <input type="text" class="form-control col-md-8" id="kamar" readonly value="<?= $pmbyrn["NoKamar"]  ?>" name="kamar">
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="kamar" class="col-md-3">Status</label>
                                                        <h5>
                                                            <span class="badge <?= $badge_color ?> py-2 col-md-12"><?= $pmbyrn["status_pembayaran"]  ?></span>
                                                        </h5>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tanggal" class="col-md-3">Tanggal Sewa</label>
                                                        <input type="date" class="form-control col-md-4" readonly value="<?= $pmbyrn["TanggalSewa"] ?>" name="awalSewa">
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="lamasewa" class="col-md-3">Lama Sewa</label>
                                                        <input type="text" class="form-control col-md-4" readonly value="<?= $pmbyrn["LamaSewa"] ?>" name="lamasewa">
                                                        <div class="col-md-1">
                                                            <p class="mt-2" style="margin-left: -10px;">Bulan</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="harga" class="col-md-3">Harga</label>
                                                        <input type="text" class="form-control col-md-8" readonly id="harga" value="<?= rupiah($pmbyrn["Harga"]) ?>">
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="total" class="col-md-3">Total Harga</label>
                                                        <input type="text" class="form-control col-md-8" id="total" readonly value="<?= rupiah($pmbyrn["GrandTotal"]) ?>" name="totalharga">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php

                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- End Content Column -->

</div>
<!-- End Content Row -->

<!-- Modal Detail -->
<!-- End Modal Detail -->

<?= $this->endSection(); ?>