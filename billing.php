<?php
    include 'koneksi.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if (!isset($user_id)) {
        header('location:index.php');
    };
    if (isset($_GET['logout'])) {
        unset($user_id);
        session_destroy();
        header('location:index.php');
    }

    if (isset($_POST['bupdate'])) {
      $update_name = mysqli_real_escape_string($koneksi, $_POST['update_name']);
      $update_email = mysqli_real_escape_string($koneksi, $_POST['update_email']);

      mysqli_query($koneksi, "UPDATE `akun` SET name = '$update_name', email = '$update_email' WHERE id_akun = '$user_id'") or die ('query failed');
      
      $update_image = $_FILES['update_image']['name'];
      $update_image_size = $_FILES['update_image']['size'];
      $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
      $update_image_folder = 'uploaded_img/'.$update_image;

      if (!empty($update_image)) {
          if ($update_image_size > 2000000) {
              $message[] = 'Image is too Large';
          } else {
              $image_update_query = mysqli_query($koneksi, "UPDATE `akun` SET image = '$update_image' WHERE id_akun = '$user_id'") or die ('query failed');
              if ($image_update_query) {
                  move_uploaded_file($update_image_tmp_name, $update_image_folder);
              }
              $message[] = 'Image Updated Succesfully!';
          }
      }
    }
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistem Informasi-UTD RSUD Ulin</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards" />
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="shortcut icon" href="assets/images/utdrs.jpg" />

    <!-- *************
      ************ CSS Files *************
    ************* -->
    <link rel="stylesheet" href="assets/css/bootstrap-icons.css" />
    <link rel="stylesheet" href="assets/css/main.min.css" />

    <!-- *************
      ************ Vendor Css Files *************
    ************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="assets/css/OverlayScrollbars.min.css" />

    
  </head>

  <body>

    <!-- Page wrapper start -->
    <div class="page-wrapper">

      <!-- Main container start -->
      <div class="main-container">

        <!-- Sidebar wrapper start -->
        <nav id="sidebar" class="sidebar-wrapper">

          <!-- App brand starts -->
          <div class="app-brand p-4">
            <a href="index.html">
              <span style="color: white; font-size: x-large; font-weight: 900;">UTD RSUD Ulin</span>
            </a>
          </div>
          <!-- App brand ends -->

          <!-- Sidebar profile actions starts -->
          <ul class="profile-actions d-lg-flex d-none">
            <li class="dropdown">
              <a href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip-warning" data-bs-title="Settings">
                <i class="bi bi-gear-fill fs-4"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-end shadow">
                  <a class="logout dropdown-item d-flex align-items-center" href="laporan_kegiatan.php?logout=<?php echo $user_id; ?>" style="padding-left: 100px; color: red;">
                    <i class="bi bi-power fs-4 me-2"></i>
                    Logout
                  </a>
              </div>
            </li>
            <li>
              <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip-info" data-bs-title="Profile">
                <i class="bi bi-person-square fs-4" data-bs-toggle="modal" data-bs-target="#FormProfile"></i>
              </a>
            </li>
            <li>
              <a href="https://wa.me/+62895636284405" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip-success" data-bs-title="WhatsApp">
                <i class="bi bi-whatsapp fs-4"></i>
              </a>
            </li>
            <li>
              <a href="https://www.instagram.com/utd_rsulin" data-bs-toggle="tooltip" data-bs-placement="bottom"
                data-bs-custom-class="custom-tooltip-danger" data-bs-title="Instagram">
                <i class="bi bi-instagram fs-4"></i>
              </a>
            </li>
            <li>
              <a href="https://maps.app.goo.gl/r9CxiPx1ZUKK5JF88" data-bs-toggle="tooltip" data-bs-placement="bottom"
                data-bs-custom-class="custom-tooltip-success" data-bs-title="Maps">
                <i class="bi bi-geo-alt-fill fs-4"></i>
              </a>
            </li>
            <li>
              <a href="https://youtube.com/@rsudulinbanjarmasin7530?si=o5EXrNbx9aqeNPIN" data-bs-toggle="tooltip" data-bs-placement="bottom"
                data-bs-custom-class="custom-tooltip-danger" data-bs-title="Youtube">
                <i class="bi bi-youtube fs-4"></i>
              </a>
            </li>
          </ul>
          <!-- Sidebar profile actions ends -->

          <!-- Sidebar menu starts -->
          <div class="sidebarMenuScroll">
            <ul class="sidebar-menu">
              <li>
                <a href="home.php">
                  <i class="bi bi-grid-fill"></i>
                  <span class="menu-text">Dashboard</span>
                </a>
              </li>
              <li class="active current-page">
                <a href="#">
                  <i class="bi bi-receipt"></i>
                  <span class="menu-text">Billing</span>
                </a>
              </li>
              <li>
                <a href="lembar-kerja.php">
                  <i class="bi bi-stickies-fill"></i>
                  <span class="menu-text">Lembar Kerja</span>
                </a>
              </li>
              <li>
                <a href="laporan_kegiatan.php">
                  <i class="bi bi-stickies-fill"></i>
                  <span class="menu-text">Laporan Kegiatan</span>
                </a>
              </li>
              <li>
                <a href="farmasi.php">
                  <i class="bi bi-bag-fill"></i>
                  <span class="menu-text">BAKHP & Reagensia</span>
                </a>
              </li>
              <li>
                <a href="pendonor.php">
                  <i class="bi bi-file-earmark-person-fill"></i>
                  <span class="menu-text">Daftar Pendonor</span>
                </a>
              </li>
              <li>
                <a href="#!">
                  <i class="bi bi-ui-checks-grid"></i>
                  <span class="menu-text">Soon</span>
                </a>
              </li>
              <li>
                <a href="#!">
                  <i class="bi bi-window-sidebar"></i>
                  <span class="menu-text">Soon</span>
                </a>
              </li>
            </ul>
          </div>
          <!-- Sidebar menu ends -->

        </nav>
        <!-- Sidebar wrapper end -->

        <!-- App container starts -->
        <div class="app-container">

          <!-- App header starts -->
          <div class="app-header d-flex align-items-center p-3">

            <!-- Toggle buttons start -->
            <div class="d-flex">
              <button class="btn btn-outline-primary me-2 toggle-sidebar" id="toggle-sidebar">
                <i class="bi bi-menu-button-wide-fill fs-5"></i>
              </button>
              <button class="btn btn-outline-primary me-2 pin-sidebar" id="pin-sidebar">
                <i class="bi bi-menu-button-wide-fill fs-5"></i>
              </button>
            </div>
            <!-- Toggle buttons end -->


            <!-- App brand sm start -->
            <div class="app-brand-sm d-md-none d-sm-block">
              <a href="home.php">
                <img src="assets/images/utdrs.jpg" class="logo" alt="Bootstrap Gallery" style="border-radius: 50%;">
              </a>
            </div>
            <!-- App brand sm end -->

            <!-- App header actions start -->
            <div class="header-actions">
              <div class="search-container d-lg-block d-none me-2" style="display: flex; align-items: center;">
                <!-- Search container start -->
                <form action="" method="GET" class="d-flex align-items-center">
                  <input id="search" name="search" type="text" class="form-control me-2" style="width: 200px;" placeholder="Search" />
                  <button type="submit" class="btn btn-primary" style="border: none; width: 40px; height: 35px; cursor: pointer;">
                    <i class="bi bi-search" style="color: white;"></i>
                  </button>
                </form>
                <!-- Search container end -->
              </div>
              <div class="dropdown ms-3">
                <a href="#" data-bs-toggle="tooltip" data-bs-placement="left"
                  data-bs-custom-class="custom-tooltip-warning" data-bs-title="Settings"
                  class="d-flex p-2 border rounded-2">
                  <i class="bi bi-gear fs-4 lh-1"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow">
                  <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#FormProfile"><i
                      class="bi bi-person fs-4 me-2"></i>Profile</a>
                  <a class="dropdown-item d-flex align-items-center" href="laporan_kegiatan.php?logout=<?php echo $user_id; ?>" style="color: red;"><i
                      class="bi bi-power fs-4 me-2"></i>Logout</a>
                </div>
              </div>
            </div>
            <!-- App header actions end -->

          </div>
          <!-- App header ends -->

          <!-- App hero header starts -->
          <div class="app-hero-header d-flex align-items-start">

            <!-- Breadcrumb start -->
            <ol class="breadcrumb d-none d-lg-flex align-items-center">
              <li class="breadcrumb-item">
                <i class="bi bi-house-door-fill"></i>
                <a href="home.php">Home</a>
              </li>
              <li class="breadcrumb-item" aria-current="page">Billing</li>
            </ol>
            <!-- Breadcrumb end -->

            <!-- Sales stats start -->
            <!-- Sales stats end -->

          </div>
          <!-- App Hero header ends -->

          <!-- App body starts -->
          <div class="app-body">

            <!-- Row starts -->
            <!-- Row ends -->

            <!-- Row starts -->
            <!-- Row end -->

            <!-- Row start -->
            <!-- Row end -->

            <!-- Row start -->
            <div class="row">
              <div class="col-xxl-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">Billing</h5>
                  </div>
                  
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-dark table-striped-columns align-middle">
                        <thead class="table-group-divider">
                        <button type="button" class="btn btn-outline-primary mb-3 float-end" data-bs-toggle="modal" data-bs-target="#FormCreate">
                            <i class="bi bi-plus-square-fill fs-5"></i>
                            Add New
                        </button>
                          <tr style="text-align: center;">
                            <th>NO</th>
                            <th>NO. RM</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Nomor</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Unit Asal</th>
                            <th>Status</th>
                            <th>Cara Bayar</th>
                            <th>Dokter</th>
                            <th>Diagnosa</th>
                            <th>Job List</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <?php
                          $no = 1;
                          if (isset($_GET['search'])) {
                              $search = mysqli_real_escape_string($koneksi, $_GET['search']);
                              $tampil = mysqli_query($koneksi, "SELECT * FROM billing WHERE no_rm LIKE '%$search%' OR nama_pasien LIKE '%$search%' OR jenis_kelamin LIKE '%$search%' OR tanggal_lahir LIKE '%$search%' OR nomor LIKE '%$search%' OR tanggal LIKE '%$search%' OR waktu LIKE '%$search%' OR unit_asal LIKE '%$search%' OR status LIKE '%$search%' OR cara_bayar LIKE '%$search%' OR dokter LIKE '%$search%' OR diagnosa LIKE '%$search%' OR job_list LIKE '%$search%' ORDER BY id_billing DESC");
                          } else {
                              $tampil = mysqli_query($koneksi, "SELECT * FROM billing ORDER BY id_billing DESC");
                          }
                          while($data = mysqli_fetch_array($tampil)) :
                        ?>

                        <tbody class="table-group-divider">
                          <tr style="text-align: center;">
                            <td><?= $no++ ?></td>
                            <td><?= $data['no_rm'] ?></td>
                            <td><?= $data['nama_pasien'] ?></td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                            <td><?= $data['tanggal_lahir'] ?></td>
                            <td><?= $data['nomor'] ?></td>
                            <td><?= $data['tanggal'] ?></td>
                            <td><?= $data['waktu'] ?></td>
                            <td><?= $data['unit_asal'] ?></td>
                            <td><?= $data['status'] ?></td>
                            <td><?= $data['cara_bayar'] ?></td>
                            <td><?= $data['dokter'] ?></td>
                            <td><?= $data['diagnosa'] ?></td>
                            <td><?= $data['job_list'] ?></td>
                            <td>
                                <a href="#" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FormEdit<?= $no ?>"><i class="bi bi-pencil-fill" style="font-size: 12px;"></i></a>
                                <a href="#" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#FormEdit<?= $no ?>"><i class="bi bi-printer-fill" style="font-size: 12px;"></i></a>
                                <a href="#" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#FormDelete<?= $no ?>"><i class="bi bi-trash-fill" style="font-size: 12px;"></i></a>
                            </td>
                          </tr>
                        </tbody>

                        <div class="modal fade" id="FormEdit<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-theme= "dark" style="color: white;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-tittle fs-5" id="staticBackdropLabel">Edit Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="action/crud-billing.php">
                                        <input type="hidden" name="id_billing" value="<?= $data['id_billing']?>">
                                        <div class="modal-body">
                                        <div class="mb-3">
                                                <label class="form-label">NO. RM</label>
                                                <input type="text" class="form-control" name="trm" value="<?= $data['no_rm'] ?>" placeholder="Masukkan NO. RM" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama Pasien</label>
                                                <input type="text" class="form-control" name="tnama" value="<?= $data['nama_pasien'] ?>" placeholder="Masukkan Nama Pasien" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" name="tkelamin" id="" style="color: white;">
                                                    <option value="<?= $data['jenis_kelamin'] ?>"><?= $data['jenis_kelamin'] ?></option>
                                                    <option value="Laki - Laki">Laki - Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tlahir" value="<?= $data['tanggal_lahir'] ?>" placeholder="Masukkan Tanggal Lahir" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nomor</label>
                                                <input type="text" class="form-control" name="tno" value="<?= $data['nomor'] ?>" placeholder="Masukkan Nomor" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal</label>
                                                <input type="date" class="form-control" name="ttgl" value="<?= $data['tanggal'] ?>" placeholder="Masukkan Tanggal" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Waktu</label>
                                                <input type="time" class="form-control" name="twaktu" value="<?= $data['waktu'] ?>" placeholder="Masukkan Waktu" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Unit Asal</label>
                                                <input type="text" class="form-control" name="tunit" value="<?= $data['unit_asal'] ?>" placeholder="Masukkan Unit Asal" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Status</label>
                                                <input type="text" class="form-control" name="tstatus" value="<?= $data['status'] ?>" placeholder="Masukkan Status" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Cara Bayar</label>
                                                <select class="form-select" name="tbayar" id="" style="color: white;">
                                                    <option value="<?= $data['cara_bayar'] ?>"><?= $data['cara_bayar'] ?></option>
                                                    <option value="Umum">Umum</option>
                                                    <option value="BPJS">BPJS</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Dokter</label>
                                                <input type="text" class="form-control" name="tdokter" value="<?= $data['dokter'] ?>" placeholder="Masukkan Dokter" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Diagnosa</label>
                                                <input type="text" class="form-control" name="tdiagnosa" value="<?= $data['diagnosa'] ?>" placeholder="Masukkan Diagnosa" style="color: white;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Job List</label>
                                                <select class="form-select" name="tjob" id="" style="color: white;">
                                                    <option value="<?= $data['job_list'] ?>"><?= $data['job_list'] ?></option>
                                                    <option value="Pengolahan Darah - Rp. 490,000">Pengolahan Darah - Rp. 490,000</option>
                                                    <option value="Coomb's Tes - Rp. 200.000">Coomb's Tes - Rp. 200,000</option>
                                                    <option value="Phlebotomy - Rp. 500.000">Phlebotomy - Rp. 500,000</option>
                                                    <option value="Leucopharesis / Thrombopharesis - Rp. 5,300,000">Leucopharesis / Thrombopharesis - Rp. 5,300,000</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" ><i class="bi bi-x-square-fill"></i></button>
                                                <button type="submit" class="btn btn-outline-success" name="bedit"><i class="bi bi-check-square-fill"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    
                        <div class="modal fade" id="FormDelete<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-theme= "dark" style="color: white;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="action/crud-billing.php">
                                        <input type="hidden" name="id_billing" value="<?= $data['id_billing']?>">
                                        <div class="modal-body">
                                            <h5 class="text-center">Apakah Anda Yakin Akan Menghapus Data Ini ?
                                                <br>
                                                <span class="text-danger"><?= $data['nama_pasien'] ?> - Job List : <?= $data['job_list'] ?> </span>
                                            </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Batal</button>
                                            <button type="submit" class="btn btn-primary" name="bdelete">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <?php endwhile; ?>
                      </table>

                      <div class="modal fade" id="FormCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-theme= "dark" style="color: white;">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h1 class="modal-tittle fs-5" id="staticBackdropLabel">Add New Data</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form method="POST" action="action/crud-billing.php">
                                      <div class="modal-body">
                                          <div class="mb-3">
                                              <label class="form-label">NO. RM</label>
                                              <input type="text" class="form-control" name="trm" placeholder="Masukkan NO. RM" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Nama Pasien</label>
                                              <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama Pasien" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select class="form-select" name="tkelamin" id="" style="color: white;">
                                                <option value=""></option>
                                                <option value="Laki - Laki">Laki - Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Tanggal Lahir</label>
                                              <input type="date" class="form-control" name="tlahir" placeholder="Masukkan Tanggal Lahir" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Nomor</label>
                                              <input type="text" class="form-control" name="tno" placeholder="Masukkan Nomor" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Tanggal</label>
                                              <input type="date" class="form-control" name="ttgl" placeholder="Masukkan Tanggal" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Waktu</label>
                                              <input type="time" class="form-control" name="twaktu" placeholder="Masukkan Waktu" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Unit Asal</label>
                                              <input type="text" class="form-control" name="tunit" placeholder="Masukkan Unit Asal" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Status</label>
                                              <input type="text" class="form-control" name="tstatus" placeholder="Masukkan Status" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                            <label class="form-label">Cara Bayar</label>
                                            <select class="form-select" name="tbayar" id="" style="color: white;">
                                                <option value=""></option>
                                                <option value="Umum">Umum</option>
                                                <option value="BPJS">BPJS</option>
                                            </select>
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Dokter</label>
                                              <input type="text" class="form-control" name="tdokter" placeholder="Masukkan Dokter" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Diagnosa</label>
                                              <input type="text" class="form-control" name="tdiagnosa" placeholder="Masukkan Diagnosa" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                            <label class="form-label">Job List</label>
                                            <select class="form-select" name="tjob" id="" style="color: white;">
                                                <option value=""></option>
                                                <option value="Pengolahan Darah - Rp. 490,000">Pengolahan Darah - Rp. 490,000</option>
                                                <option value="Coomb's Tes - Rp. 200.000">Coomb's Tes - Rp. 200,000</option>
                                                <option value="Phlebotomy - Rp. 500.000">Phlebotomy - Rp. 500,000</option>
                                                <option value="Leucopharesis / Thrombopharesis - Rp. 5,300,000">Leucopharesis / Thrombopharesis - Rp. 5,300,000</option>
                                            </select>
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" ><i class="bi bi-x-square-fill"></i></button>
                                              <button type="submit" class="btn btn-outline-success" name="bcreate"><i class="bi bi-check-square-fill"></i></button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>

                      <div class="modal fade" id="FormProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-theme= "dark" style="color: white;">
                          <div class="modal-dialog">
                              <div class="modal-content update-profile">
                                  <div class="modal-header">
                                      <h1 class="modal-tittle fs-5" id="staticBackdropLabel">Profile Akun</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <?php
                                        $select = mysqli_query($koneksi, "SELECT * FROM `akun` WHERE id_akun = '$user_id'") or die ('query failed');
                                        if (mysqli_num_rows($select) > 0) {
                                            $fetch = mysqli_fetch_assoc($select);
                                        }   
                                        
                                    ?> 
                                  <form method="POST" action="" enctype="multipart/form-data">
                                      <div class="modal-body">
                                        <?php
                                            if ($fetch['image'] == '') {
                                                echo '<img src="img/2.png" style="height: 200px; width: 200px; border-radius: 50%; object-fit: cover; margin-bottom: 5px;">';
                                            } else {
                                                echo '<img src="uploaded_img/'.$fetch['image'].'" style="height: 200px; width: 200px; border-radius: 50%; object-fit: cover; margin-bottom: 5px;">';
                                            }
                                            if (isset($message)) {
                                                foreach ($message as $message) {
                                                    echo '<div class="message">'.$message.'</div>';
                                                }
                                            }
                                        ?>
                                          <div class="mb-3">
                                              <label class="form-label">Username</label>
                                              <input type="text" class="form-control" name="update_name" value="<?php echo $fetch['name'] ?>" placeholder="Masukkan Tanggal" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Email</label>
                                              <input type="mail" class="form-control" name="update_email" value="<?php echo $fetch['email'] ?>" placeholder="Masukkan Nama Pendonor" style="color: white;">
                                          </div>
                                          <div class="mb-3">
                                              <label class="form-label">Update Picture</label>
                                              <input type="file" class="form-control" name="update_image" accept="image/jpg, image/jpeg, image/png" style="color: white;">
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" ><i class="bi bi-x-square-fill"></i></button>
                                              <button type="submit" class="btn btn-outline-success" name="bupdate"><i class="bi bi-check-square-fill"></i></button>
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Row end -->

            <!-- Row start -->
            <!-- Row end -->

          </div>
          <!-- App body ends -->

          <!-- App footer start -->
          <div class="app-footer">
            <span>Muhammad Bayu 2024</span>
          </div>
          <!-- App footer end -->

        </div>
        <!-- App container ends -->

      </div>
      <!-- Main container end -->

    </div>
    <!-- Page wrapper end -->

    <!-- *************
      ************ JavaScript Files *************
    ************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- *************
      ************ Vendor Js Files *************
    ************* -->

    <!-- Overlay Scroll JS -->
    <script src="assets/js/jquery.overlayScrollbars.min.js"></script>
    <script src="assets/js/custom-scrollbar.js"></script>

    <!-- Apex Charts -->
    <script src="assets/js/apexcharts.min.js"></script>
    <script src="assets/js/activity-report.js"></script>
    <script src="assets/js/deals.js"></script>
    <script src="assets/js/sparkline.js"></script>
    <script src="assets/js/sparkline2.js"></script>

    <!-- Rating -->
    <script src="assets/js/raty.js"></script>
    <script src="assets/js/raty-custom.js"></script>

    <!-- Custom JS files -->
    <script src="assets/js/custom.js"></script>
  </body>

</html>

