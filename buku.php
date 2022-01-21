<?php
if(isset($_GET['delete'])){
    $id = $_GET['id'];
    $query_delete = mysqli_query($koneksi, "DELETE FROM buku where id_buku = '$id'");
    if($query_delete){
        echo "<h1>Data Berhasil Dihapus</h1>";
        header('refresh:3; URL=http://localhost/21_PTSGANJIL2021_XIIRPL1_RAFFIRIZALDI/admin.php?page=buku');
    }
}           

if(isset($_POST['save'])){
    $kb = $_POST['kode_buku'];
    $jb = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];

    $query_insert = mysqli_query($koneksi, "INSERT INTO buku VALUES('','$kb','$jb','$penulis','$penerbit')");
    if($query_insert){
        echo "<h1>Data Berhasil Disimpan</h1>";
        header('refresh:3; URL=http://localhost/21_PTSGANJIL2021_XIIRPL1_RAFFIRIZALDI/admin.php?page=buku');
    }
}

?>

<center><h1 class="mt-4 mb-3">Data Buku</h1></center>

<button type="button" class="btn btn-success mb-1" data-bs-toggle="modal" data-bs-target="#tambahbuku">
  Tambah Data
</button>

<table class="table table-dark table-striped">
    <tr class="text-center">
        <th>No</th>
        <th>Kode Buku</th>
        <th>Judul Buku</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>--Action--</th>
    </tr>

    <?php
        $query = mysqli_query($koneksi,"SELECT * FROM buku");
        if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_array($query)){
        $no = 1;
        foreach ($query as $row) {
    ?>
    <tr>
        <td align="center" valign="middle"><?php echo $no; ?></td>
        <td align="center" valign="middle"><?php echo $row['kode_buku']; ?></td>
        <td align="center" valign="middle"><?php echo $row['judul_buku']; ?></td>
        <td align="center" valign="middle"><?php echo $row['penulis']; ?></td>
        <td align="center" valign="middle"><?php echo $row['penerbit']; ?></td>
        <td align="center" valign="middle">
        <a href="?page=buku&delete=&id=<?php echo $row ['id_buku'];?>">
            <button class="btn btn-danger"><i class="fas fa-trash-alt">Hapus</i></button>
        </a>
        <a href="?page=buku&edit=&id=<?php echo $row ['id_buku'];?>">
            <button class="btn btn-warning"><i class="fas fa-edit">Edit</i></button>
        </a>
        </td>
    </tr>
    <?php
    $no++;
    }
    }   
    }else{
    ?>
        <tr>
            <td colspan="10" align="center">Data Kosong</td>
        </tr>
    <?php
    }
    ?>
</table>

<div class="modal fade" id="tambahbuku" tabindex="-1" aria-labelledby="tambahbukuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tambahbukuLabel">Form Tambah Buku</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

<form action="" method="post">
                <div class="alert alert-dark" role="alert">
                    <input class="form-control" type="text" name="kode_buku" placeholder="Kode Buku" required>
                </div>
                <div class="alert alert-dark" role="alert">
                    <input class="form-control" type="text" name="judul_buku" placeholder="Judul Buku" required>
                </div>
                <div class="alert alert-dark" role="alert">
                    <input class="form-control" type="text" name="penulis" placeholder="Penulis" required>
                </div>
                <div class="alert alert-dark" role="alert">
                    <input class="form-control" type="text" name="penerbit" placeholder="Penerbit" required>
                </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="save" class="btn btn-primary">Save changes</button>
        </div>   
</form> 
        </div>
    </div>
</div>