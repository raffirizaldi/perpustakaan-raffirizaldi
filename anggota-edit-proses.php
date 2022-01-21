<?php
include('koneksi.php');

if (isset($_GET['save-edit'])) {
    $id             = $_POST['id_anggota'];
    $nis            = $_POST['nis'];
    $nama           = $_POST['nama'];
    $jk             = $_POST['jk'];
    $tpt_lahir      = $_POST['tpt_lahir'];
    $tgl_lahir      = $_POST['tgl_lahir'];
    $kelas          = $_POST['id_kelas'];
    $jurusan        = $_POST['id_jurusan'];
    $tlp            = $_POST['nomor_telepon'];
    $alamat         = $_POST['alamat'];
    

    $query_update = mysqli_query($koneksi,"UPDATE anggota 
    SET nis             = '$nis',
        nama            = '$nama',
        jk              = '$jk',
        tpt_lahir       = '$tpt_lahir',
        tgl_lahir       = '$tgl_lahir',     
        id_kelas        = '$kelas',    
        id_jurusan      = '$jurusan',       
        nomor_telepon   = '$tlp',     
        alamat          = '$alamat'  
    WHERE id_anggota = '$id'");

    if ($query_update) {
        ?>
        <script>
            alert('Data Berhasil Diupdate')
            window.location.href='admin.php?page=anggota';
        </script>
        <?php
    }
}
?>
