<?php
    include "../koneksi.php";


    if(isset($_POST['bcreate'])) {
        $create = mysqli_query($koneksi, "INSERT INTO pendonor (tanggal, nama, gol_darah, kategori_donor) VALUES ('$_POST[ttgl]', '$_POST[tnama]', '$_POST[tgol]', '$_POST[tkategori]')");

        if($create){
            echo "<script>
                    alert('ADD DATA SUCCESSFULLY');
                    document.location= '../pendonor.php';
                  </script>";
        } else {
            echo "<script>
                    alert('ADD DATA FAILED');
                    document.location= '../pendonor.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bedit'])) {
        $edit = mysqli_query($koneksi, "UPDATE pendonor SET tanggal = '$_POST[ttgl]', nama = '$_POST[tnama]', gol_darah = '$_POST[tgol]', kategori_donor = '$_POST[tkategori]' WHERE id_pendonor = '$_POST[id_pendonor]'");

        if($edit){
            echo "<script>
                    alert('EDIT DATA SUCCESSFULLY');
                    document.location= '../pendonor.php';
                  </script>";
        } else {
            echo "<script>
                    alert('EDIT DATA FAILED');
                    document.location= '../pendonor.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bdelete'])) {
        $delete = mysqli_query($koneksi, "DELETE FROM pendonor WHERE id_pendonor = '$_POST[id_pendonor]'");

        if($delete){
            echo "<script>
                    alert('DELETE DATA SUCCESSFULLY');
                    document.location= '../pendonor.php';
                  </script>";
        } else {
            echo "<script>
                    alert('DELETE DATA FAILED');
                    document.location= '../pendonor.php';
                  </script>";
        }
    }
?>
