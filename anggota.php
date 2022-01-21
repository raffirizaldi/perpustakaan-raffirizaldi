<?php
if(isset($_GET['delete'])){
    $id = $_GET['id'];
    $query_delete = mysqli_query($koneksi, "DELETE FROM anggota where id_anggota = '$id'");
    if($query_delete){
        echo "<h1>Data Berhasil Dihapus</h1>";
        header('refresh:3; URL=http://localhost/21_PTSGANJIL2021_XIIRPL1_RAFFIRIZALDI/admin.php?page=anggota');
    }
}

if(isset($_POST['save'])){
    $nis            = $_POST['nis'];
    $nama           = $_POST['nama'];
    $jenis_kelamin  = $_POST['jk'];
    $tpt_lahir      = $_POST['tpt_lahir'];
    $tgl_lahir      = $_POST['tgl_lahir'];
    $kelas          = $_POST['id_kelas'];
    $jurusan        = $_POST['id_jurusan'];
    $no_telp        = $_POST['nomor_telepon'];
    $alamat         = $_POST['alamat'];
 

    $query_insert = mysqli_query($koneksi, "INSERT INTO anggota VALUES(
                                '',
                                '$nis',
                                '$nama',
                                '$jenis_kelamin',
                                '$tpt_lahir',
                                '$tgl_lahir',
                                '$kelas',
                                '$jurusan',
                                '$no_telp',
                                '$alamat')"
                                );
    if($query_insert){
        echo "<h1>Data Berhasil Disimpan</h1>";
        header('refresh:3; URL=http://localhost/21_PTSGANJIL2021_XIIRPL1_RAFFIRIZALDI/admin.php?page=anggota');
    }
}
?>

<center><h1 class="mt-4 mb-3">Data Anggota</h1></center>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#tambahanggota">
  Tambah Data
</button>
<table class="table table-striped table-hover">
    <tr class="text-center">
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Gender</th>
        <th>Tpt Lahir</th>
        <th>Tgl Lahir</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Tlp</td>
        <th>Alamat</th>
        
        <th>--Action--</th>
    </tr>
    <?php

        //$querybaru = mysqli_query($koneksi,"SELECT anggota.nis, anggota.nama, anggota.jk, anggota.tpt_lahir, 
        //anggota.tgl_lahir, anggota.id_kelas, anggota.id_jurusan, anggota.nomor_telepon, anggota.alamat, kelas.nama_kelas
        //jurusan.nama_jurusan from anggota
        //join kelas on anggota.id_kelas = kelas.id_kelas
        //join jurusan on anggota.id_jurusan = jurusan.id_jurusan");

        $query = mysqli_query($koneksi,"SELECT * FROM anggota");
        if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_array($query)){
        $no = 1;
        foreach ($query as $row) {
    ?>
    <tr>
        <td align="center" valign="middle"><?php echo $no; ?></td>
        <td align="center" valign="middle"><?php echo $row['nis']; ?></td>
        <td align="center" valign="middle"><?php echo $row['nama']; ?></td>
        <td align="center" valign="middle"><?php echo $row['jk']; ?></td>
        <td align="center" valign="middle"><?php echo $row['tpt_lahir']; ?></td>
        <td align="center" valign="middle"><?php echo $row['tgl_lahir']; ?></td>
        <td align="center" valign="middle">
            <?php
            $idkelas = $row['id_kelas'];
            $query_kelas = mysqli_query($koneksi,"SELECT * FROM kelas WHERE id_kelas = '$idkelas'");
            foreach ($query_kelas as $kelas){
                echo $kelas['nama_kelas'];
            } 
            ?>
        </td>
        <td align="center" valign="middle"><?php
            $idjurusan = $row['id_jurusan'];
            $query_jurusan = mysqli_query($koneksi,"SELECT * FROM jurusan WHERE id_jurusan= '$idjurusan'");
            foreach ($query_jurusan as $jurusan){
                echo $jurusan['nama_jurusan'];
            } 
            ?>
        </td>
        <td align="center" valign="middle"><?php echo $row['nomor_telepon']; ?></td>
        <td align="center" valign="middle"><?php echo $row['alamat']; ?></td>
        
        <td align="center" valign="middle">
        <a href="?page=anggota&delete=&id=<?php echo $row ['id_anggota'];?>">
            <button class="btn btn-danger"><i class="fas fa-trash-alt"> Hapus</i></button>
        </a>
        <a href="?page=anggota-edit&edit=&id=<?php echo $row ['id_anggota'];?>">
            <button class="btn btn-warning"><i class="fas fa-edit">Edit</i></button>
        </a>
        </td>
    </tr>
    <?php
    $no++;
    }
    }
    }
    else{
    ?>
        <tr>
            <td colspan="11" align="center  ">Data Kosong</td>
        </tr>
    <?php
    }
    ?>
</table>

<!-- Modal -->
<div class="modal fade" id="tambahanggota" tabindex="-1" aria-labelledby="tambahanggotaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tambahanggotaLabel">Form Tambah Anggota</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form action="" method="post">
                <div class="form-group mt-3">
                    <input class="form-control" type="text" name="nis" placeholder="Nomor Induk Siswa" required>
                </div>
                <div class="form-group mt-3">
                    <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group mt-3">
                   <select class="form=control" name="jk">
                        <option value="">--Pilih Jenis Kelamin--</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                   </select>
                </div>
                <div class="form-group mt-3">
                    <input class="form-control" type="text" placeholder="Tempat Lahir" name="tpt_lahir">
                </div>
                <div class="form-group mt-3">
                    <input class="form-control" type="date" name="tgl_lahir">
                </div>
                <div class="form-group mt-3">
                    <select class="form-control" name="id_kelas" id="">
                    <option value="">--Pilih Kelas--</option>
                        <?php
                             $query = mysqli_query($koneksi,"SELECT * FROM kelas");
                             foreach ($query as $row) {
                        ?>
                        <option value="<?php echo $row ['id_kelas'];?>">
                                <?php echo $row ['nama_kelas']?>  
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mt-3">
                   <select class="form-control" name="id_jurusan" id="">
                   <option value="">--Pilih Jurusan--</option>
                   <?php
                             $query = mysqli_query($koneksi,"SELECT * FROM jurusan");
                             foreach ($query as $row) {
                        ?>
                        <option value="<?php echo $row ['id_jurusan'];?>">
                                <?php echo $row ['nama_jurusan']?>  
                        </option>
                        <?php
                        }
                        ?>
                   </select>
                </div>
                <div class="form-group mt-3">
                    <input class="form-control" type="text" name="nomor_telepon" placeholder="Nomor Telepon">
                </div>
                <div class="form-group mt-3">
                    <textarea name="alamat" id="" class="form-control" placeholder="Alamat Lengkap"></textarea>
                </div>
                
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="save" class="btn btn-primary">Save changes</button>
            </form>
        </div>
        </div>
    </div>
</div>

