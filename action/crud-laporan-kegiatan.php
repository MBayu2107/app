<?php
include "../koneksi.php";

if (isset($_POST['bcreate'])) {
    // Ambil nilai dari POST
    $tanggal = $_POST['ttgl'];
    $jumlah_pasien = $_POST['tpasien'];
    $laki = $_POST['tlaki'];
    $wanita = $_POST['twanita'];
    $wb = $_POST['twb'];
    $prc = $_POST['tprc'];
    $a = $_POST['ta'];
    $b = $_POST['tb'];
    $ab = $_POST['tab'];
    $o = $_POST['to'];
    $jumlah_crossmatch = $_POST['tcross'];
    $phlebotomy = $_POST['tphlebotomy'];
    $apheresis = $_POST['tapheresis'];
    $coomb_tes = $_POST['ttes'];
    $gol_darah = $_POST['tgol'];


    // Hitung total
    $total_pemeriksaan = $jumlah_crossmatch + $phlebotomy + $apheresis + $coomb_tes + $gol_darah;
    $create = mysqli_query($koneksi, "INSERT INTO laporan_kegiatan 
    (tanggal, jumlah_pasien, laki, wanita, wb, prc, a, b, ab, o, 
    jumlah_crossmatch, phlebotomy, apheresis, coomb_tes, gol_darah,
    total_pasien, total_laki, total_wanita, total_wb, total_prc, 
    total_a, total_b, total_ab, total_o, 
    total_jmlh_crossmatch, total_phlebotomy, total_apheresis, total_coomb_tes, 
    total_gol_darah, grand_total) 
    VALUES 
    ('$tanggal', '$jumlah_pasien', '$laki', '$wanita', '$wb', 
    '$prc', '$a', '$b', '$ab', '$o', 
    '$jumlah_crossmatch', '$phlebotomy', '$apheresis', 
    '$coomb_tes', '$gol_darah', 
    '$jumlah_pasien', '$laki', '$wanita', '$wb', '$prc', 
    '$a', '$b', '$ab', '$o', 
    '$jumlah_crossmatch', '$phlebotomy', '$apheresis', 
    '$coomb_tes', '$gol_darah', 
    '$total_pemeriksaan')");

    // Cek hasil query
    if ($create) {
        echo "<script>
                alert('ADD DATA SUCCESSFULLY');
                document.location= '../laporan_kegiatan.php';
              </script>";
    } else {
        echo "<script>
                alert('ADD DATA FAILED');
                document.location= '../laporan_kegiatan.php';
              </script>";
    }
}
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bedit'])) {
        $edit = mysqli_query($koneksi, "UPDATE laporan_kegiatan SET tanggal = '$_POST[ttgl]', jumlah_pasien = '$_POST[tpasien]',laki = '$_POST[tlaki]', wanita = '$_POST[twanita]', wb = '$_POST[twb]', prc = '$_POST[tprc]', a = '$_POST[ta]', b = '$_POST[tb]', ab = '$_POST[tab]', o = '$_POST[to]', jumlah_crossmatch = '$_POST[tcross]', phlebotomy = '$_POST[tphlebotomy]', apheresis = '$_POST[tapheresis]', coomb_tes = '$_POST[ttes]', gol_darah = '$_POST[tgol]', total_pemeriksaan = '$_POST[ttotal]' WHERE id_laporan_kegiatan = '$_POST[id_laporan_kegiatan]'");

        if($edit){
            echo "<script>
                    alert('EDIT DATA SUCCESSFULLY');
                    document.location= '../laporan_kegiatan.php';
                  </script>";
        } else {
            echo "<script>
                    alert('EDIT DATA FAILED');
                    document.location= '../laporan_kegiatan.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bdelete'])) {
        $delete = mysqli_query($koneksi, "DELETE FROM laporan_kegiatan WHERE id_laporan_kegiatan = '$_POST[id_laporan_kegiatan]'");

        if($delete){
            echo "<script>
                    alert('DELETE DATA SUCCUESSFULLY');
                    document.location= '../laporan_kegiatan.php';
                  </script>";
        } else {
            echo "<script>
                    alert('DELETE DATA FAILED');
                    document.location= '../laporan_kegiatan.php';
                  </script>";
        }
    }
?>
