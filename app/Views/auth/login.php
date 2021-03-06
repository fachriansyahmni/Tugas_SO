<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('vendor') ?>/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets') ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background: linear-gradient(90deg, hsla(225, 68%, 58%, 1) 0%, hsla(204, 84%, 66%, 1) 100%);">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center" style="height: 100vh;">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5" style="height: 50vh;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row h-100 align-items-center">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="<?= base_url('assets') ?>/images/home.png" style="margin-top: 25px; margin-left: 60px;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h3 text-gray-900 mb-4 fw-bold">Please Sign IN</h1>
                                        <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <?php echo session()->getFlashdata('error'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <form class="user" method="post" action="<?= base_url(); ?>/login/process">
                                        <?= csrf_field(); ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="Enter Your Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Enter Your Password...">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('vendor') ?>/jquery/jquery.min.js"></script>
    <script src="<?= base_url('vendor') ?>/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('vendor') ?>/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets') ?>/js/sb-admin-2.min.js"></script>

</body>

</html>