<?php
    include "../koneksi.php";


    if(isset($_POST['bcreate'])) {
        $create = mysqli_query($koneksi, "INSERT INTO farmasi (tanggal, principal, nama_barang, merk, satuan, stok_awal, masuk, keluar, stok_akhir, permintaan) VALUES ('$_POST[ttgl]', '$_POST[tprincipal]', '$_POST[tnama]', '$_POST[tmerk]', '$_POST[tsatuan]', '$_POST[tawal]', '$_POST[tmasuk]', '$_POST[tkeluar]', '$_POST[takhir]', '$_POST[tpermintaan]')");

        if($create){
            echo "<script>
                    alert('ADD DATA SUCCESSFULLY');
                    document.location= '../farmasi.php';
                  </script>";
        } else {
            echo "<script>
                    alert('ADD DATA FAILED');
                    document.location= '../farmasi.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bedit'])) {
        $edit = mysqli_query($koneksi, "UPDATE farmasi SET tanggal = '$_POST[ttgl]', principal = '$_POST[tprincipal]', nama_barang = '$_POST[tnama]', merk = '$_POST[tmerk]', satuan = '$_POST[tsatuan]', stok_awal = '$_POST[tawal]', masuk = '$_POST[tmasuk]', keluar = '$_POST[tkeluar]', stok_akhir = '$_POST[takhir]', permintaan = '$_POST[tpermintaan]' WHERE id_farmasi = '$_POST[id_farmasi]'");

        if($edit){
            echo "<script>
                    alert('EDIT DATA SUCCESSFULLY');
                    document.location= '../farmasi.php';
                  </script>";
        } else {
            echo "<script>
                    alert('EDIT DATA FAILED');
                    document.location= '../farmasi.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bdelete'])) {
        $delete = mysqli_query($koneksi, "DELETE FROM farmasi WHERE id_farmasi = '$_POST[id_farmasi]'");

        if($delete){
            echo "<script>
                    alert('DELETE DATA SUCCUESSFULLY');
                    document.location= '../farmasi.php';
                  </script>";
        } else {
            echo "<script>
                    alert('DELETE DATA FAILED');
                    document.location= '../farmasi.php';
                  </script>";
        }
    }
?>
