<?php
    include "../koneksi.php";


    if(isset($_POST['bcreate'])) {
        $create = mysqli_query($koneksi, "INSERT INTO billing (no_rm, nama_pasien, jenis_kelamin, tanggal_lahir, nomor, tanggal, waktu, unit_asal, status, cara_bayar, dokter, diagnosa, job_list) VALUES ('$_POST[trm]', '$_POST[tnama]', '$_POST[tkelamin]', '$_POST[tlahir]', '$_POST[tno]', '$_POST[ttgl]', '$_POST[twaktu]', '$_POST[tunit]', '$_POST[tstatus]', '$_POST[tbayar]', '$_POST[tdokter]', '$_POST[tdiagnosa]', '$_POST[tjob]')");

        if($create){
            echo "<script>
                    alert('ADD DATA SUCCESSFULLY');
                    document.location= '../billing.php';
                  </script>";
        } else {
            echo "<script>
                    alert('ADD DATA FAILED');
                    document.location= '../billing.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bedit'])) {
        $edit = mysqli_query($koneksi, "UPDATE billing SET no_rm = '$_POST[trm]', nama_pasien = '$_POST[tnama]', jenis_kelamin = '$_POST[tkelamin]', tanggal_lahir = '$_POST[tlahir]', nomor = '$_POST[tno]', tanggal = '$_POST[ttgl]', waktu = '$_POST[twaktu]', unit_asal = '$_POST[tunit]', status = '$_POST[tstatus]', cara_bayar = '$_POST[tbayar]', dokter = '$_POST[tdokter]', job_list = '$_POST[tjob]' WHERE id_billing = '$_POST[id_billing]'");

        if($edit){
            echo "<script>
                    alert('EDIT DATA SUCCESSFULLY');
                    document.location= '../billing.php';
                  </script>";
        } else {
            echo "<script>
                    alert('EDIT DATA FAILED');
                    document.location= '../billing.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bdelete'])) {
        $delete = mysqli_query($koneksi, "DELETE FROM billing WHERE id_billing = '$_POST[id_billing]'");

        if($delete){
            echo "<script>
                    alert('DELETE DATA SUCCESSFULLY');
                    document.location= '../billing.php';
                  </script>";
        } else {
            echo "<script>
                    alert('DELETE DATA FAILED');
                    document.location= '../billing.php';
                  </script>";
        }
    }
?>
