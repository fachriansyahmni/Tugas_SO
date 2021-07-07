<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HaloKos</title>

  <link href="<?= base_url("vendor") ?>/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url("assets") ?>/css/sb-admin-2.min.css" rel="stylesheet">

  <style>
    .position .row {
      justify-content: center;
    }
  </style>

</head>
<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container">
    <a class="navbar-brand" href="/" style="font-weight: bold; font-size: 1.8rem;">HaloKos</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <a class="btn btn-success mr-2" href="https://wa.link/37qy6j" target="_blank">WhatsApp</a>
        <a class="btn btn-primary" href="/login" target="_blank">Log In</a>
      </div>
    </div>
  </div>
</nav>
<div class="container">
  <div class="jumbotron jumbotron-fluid bg-transparent position-relative">
    <img src="<?= base_url('assets') ?>/images/lp.png" width="1100">
    <div class="row position-absolute justify-content-center wv-100" style="bottom: 10px; left: -130px;">
      <div class="col-sm-6">
        <div class="card" style="width: 900px; border-radius: 15px;">
          <div class="card-body position">
            <div class="row">
              <div class="col-3">
                <div class="row">
                  <div class="col-1">
                    <i class="fas fa-map-marker-alt fa-3x"></i>
                  </div>
                  <div class="col-auto ml-4 mt-2">
                    <h5 style="color: #000; font-weight: bold; line-height: 0.9rem;">Lokasi</h5>
                    <p style="font-size: 0.8rem;">Jakarta Pusat</p>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="row">
                  <div class="col-1">
                    <i class="fas fa-video fa-3x"></i>
                  </div>
                  <div class="col-auto ml-5 mt-2">
                    <h5 style="color: #000; font-weight: bold; line-height: 0.9rem;">Keamanan</h5>
                    <p style="font-size: 0.8rem;">24 Jam</p>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="row">
                  <div class="col-1">
                    <i class="fas fa-dollar-sign fa-3x"></i>
                  </div>
                  <div class="col-auto ml-4 mt-2">
                    <h5 style="color: #000; font-weight: bold; line-height: 0.9rem;">Harga</h5>
                    <p style="font-size: 0.8rem;">Terjangkau</p>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="row">
                  <div class="col-1">
                    <i class="fas fa-clipboard-list fa-3x"></i>
                  </div>
                  <div class="col-auto ml-4 mt-2">
                    <h5 style="color: #000; font-weight: bold; line-height: 0.9rem;">Fasilitas</h5>
                    <p style="font-size: 0.8rem;">Lengkap</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-5" style="margin-top: 120px;">
    <div class="col-md-6">
      <img src="<?= base_url('assets') ?>/images/kos1.png">
    </div>
    <div class="col-md-5 offset-md-1">
      <h2 style="color: #000; font-weight: bold; line-height: 2.5rem;">Mau Cari Kos-Kosan?</h2>
      <p style="line-height: 2.2rem;">
        Halokos merupakan pilihan yang tepat untuk untuk anda huni. Halokos memiliki lokasi yang strategis , selain itu halokos juga memiliki sistem keamanan 24 jam non stop, serta halokos memiliki fasilitas yang lengkap dan harga yang terjangkau. maka dari itu tunggu apa lagi!.
      </p>
      <a href="https://wa.link/37qy6j" target="_blank" class="btn btn-success">WhatsApp</a>
    </div>
  </div>
  <div class="row mt-5 mb-5">
    <div class="col-12 text-center">
      <h2 style="color: #000; font-weight: bold; margin-top: 50px;">Galeri</h2>
      <p>
        Foto ini dari beberapa bangunan <br> yang terdapat di HaloKos
      </p>
    </div>
    <div class="col-md-4 mt-4">
      <img src="<?= base_url('assets') ?>/images/kos2.png" width="300" height="425">
    </div>
    <div class="col-md-4 mt-4">
      <img src="<?= base_url('assets') ?>/images/kos3.png" width="300" height="425">
    </div>
    <div class="col-md-4 mt-4">
      <img src="<?= base_url('assets') ?>/images/kos4.png" width="300">
    </div>
  </div>
  <div class="row mb-5 mt-5">
    <div class="col-12 text-center">
      <hr class="mb-3" style="margin-top: 50px;">
      <p>Copyright © 2021. HaloKos. All RIght Reserved</p>
    </div>
  </div>
</div>

<body>

  <script src="<?= base_url("vendor") ?>/jquery/jquery.min.js"></script>
  <script src="<?= base_url("vendor") ?>/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>