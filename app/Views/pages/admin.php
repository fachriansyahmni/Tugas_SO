<?= $this->extend("layout/admin"); ?>

<?= $this->section("content"); ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Manajemen Admin</h1>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Admin</h6>
                <button type="button" class="btn btn-primary tambah" data-toggle="modal" data-target="#modalAdd">Tambah Admin</button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($admins as $admin) :
                        ?>

                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $admin['nama'] ?></td>
                                <td><?= $admin['username'] ?></td>
                                <td><?= $admin['password'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-success edit mb-2" data-toggle="modal" data-target="#modalAdd" data-id="<?= $admin['id'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger hapus" data-toggle="modal" data-target="#modalHapus" data-href="AdminController/delete/<?= $admin['id'] ?>">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
            </div>
            <form method="post" action="<?= base_url(); ?>/admin/register/process">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" name="password" required>
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

<!-- Modal Hapus -->
<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-hapus" id="exampleModalLabel">Apakah anda yakin akan menghapus data ini?</h5>
            </div>
            <div class="modal-footer d-inline text-center">
                <a class="btn btn-danger btn-ok">Delete</a>
                <button type="button" class="btn btn-success" data-dismiss="modal">Cencel</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Hapus -->

<script>
    $(document).ready(function() {
        //insert
        $(".tambah").on("click", function() {
            $(".modal-title").html("Tambah Admin");
            $("form").attr("action", "AdminController/process");

            //remove data in modal
            $("#nama").val('');
            $("#username").val('');
            $("#password").val('');
        });

        //update
        $(".edit").on("click", function() {
            const id = $(this).data('id');
            $("#password").removeAttr("required");

            $(".modal-title").html("Ubah Admin");
            $("form").attr("action", "AdminController/update/" + id);

            $.ajax({
                url: "AdminController/getDataAdmin",
                data: {
                    id: id,
                },
                method: "POST",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    $('#nama').val(data.nama);
                    $('#username').val(data.username);
                },

            });
        });

        //delete
        $("#modalHapus").on("show.bs.modal", function(e) {
            $('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        })
    });
</script>

<?= $this->endSection(); ?>