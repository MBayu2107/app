<?php
include "../koneksi.php";

if (isset($_POST['bcreate'])) {
    // Ambil nilai dari checkbox 
    $a = isset($_POST['ta']) ? 1 : 0;
    $b = isset($_POST['tb']) ? 1 : 0;
    $ab = isset($_POST['tab']) ? 1 : 0;
    $o = isset($_POST['to']) ? 1 : 0;
    $wb = isset($_POST['wb']) ? 1 : 0;
    $prc = isset($_POST['tprc']) ? 1 : 0;

    // Proses setiap "no_kantong" dalam array
    foreach ($_POST['tnokantong'] as $no_kantong) {
        $create = mysqli_query($koneksi, "
            INSERT INTO lembar_kerja 
            (tanggal, nama_pasien, ruangan, no_kantong, a, b, ab, o, rh, wb, prc, uji_1, uji_2, uji_3, hasil, nama_pemeriksa, jumlah_kantong) 
            VALUES 
            ('$_POST[ttgl]', '$_POST[tpasien]', '$_POST[truangan]', '$no_kantong', '$a', '$b', '$ab', '$o', '$_POST[trh]', '$wb', '$prc', '$_POST[tuji1]', '$_POST[tuji2]', '$_POST[tuji3]', '$_POST[thasil]', '$_POST[tpemeriksa]', '1')
        ");
        
        if (!$create) {
            echo "<script>
                    alert('PENAMBAHAN DATA GAGAL untuk No Kantong: $no_kantong');
                    document.location= 'lembar-kerja.php';
                  </script>";
            exit;
        }
    }

    // Hitung total keseluruhan dalam tabel
    $totalsQuery = "
        SELECT 
            SUM(a) as total_a, 
            SUM(b) as total_b, 
            SUM(ab) as total_ab, 
            SUM(o) as total_o, 
            SUM(wb) as total_wb, 
            SUM(prc) as total_prc, 
            COUNT(*) as total_kantong 
        FROM lembar_kerja
    ";

    $result = mysqli_query($koneksi, $totalsQuery);
    $totals = mysqli_fetch_assoc($result);

    // Tampilkan pesan sukses dengan total keseluruhan
    echo "<script>
            alert('PENAMBAHAN DATA BERHASIL\nTotal A: {$totals['total_a']}\nTotal B: {$totals['total_b']}\nTotal AB: {$totals['total_ab']}\nTotal O: {$totals['total_o']}\nTotal WB: {$totals['total_wb']}\nTotal PRC: {$totals['total_prc']}\nTotal Kantong: {$totals['total_kantong']}');
            document.location= '../lembar-kerja.php';
          </script>";
}
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bedit'])) {
        $edit = mysqli_query($koneksi, "UPDATE lembar_kerja SET tanggal = '$_POST[ttgl]', nama_pasien = '$_POST[tpasien]',ruangan = '$_POST[truangan]', no_kantong = '$_POST[tnokantong]', a = '$_POST[ta]', b = '$_POST[tb]', ab = '$_POST[tba]', o = '$_POST[to]', rh = '$_POST[trh]', wb = '$_POST[twb]', prc = '$_POST[tprc]', uji_1 = '$_POST[tuji1]', uji_2 = '$_POST[tuji2]', uji_3 = '$_POST[tuji3]', hasil = '$_POST[thasil]', nama_pemeriksa = '$_POST[tpemeriksa]' WHERE id_lembar_kerja = '$_POST[id_lembar_kerja]'");

        if($edit){
            echo "<script>
                    alert('EDIT DATA SUCCESSFULLY');
                    document.location= '../lembar-kerja.php';
                  </script>";
        } else {
            echo "<script>
                    alert('EDIT DATA FAILED');
                    document.location= '../lembar-kerja.php';
                  </script>";
        }
    }
?>

<?php
    include "../koneksi.php";

    if(isset($_POST['bdelete'])) {
        $delete = mysqli_query($koneksi, "DELETE FROM lembar-kerja WHERE id_lembar_kerja = '$_POST[id_lembar_kerja]'");

        if($delete){
            echo "<script>
                    alert('DELETE DATA SUCCUESSFULLY');
                    document.location= '../lembar-kerja.php';
                  </script>";
        } else {
            echo "<script>
                    alert('DELETE DATA FAILED');
                    document.location= '../lembar-kerja.php';
                  </script>";
        }
    }
?>