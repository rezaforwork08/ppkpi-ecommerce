<?php
$query = mysqli_query($koneksi, "SElECT * FROM barang ORDER BY id DESC");

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $foto = mysqli_query($koneksi, "SELECT * FROM barang WHERE id ='$id'");
    $rowFoto = mysqli_fetch_assoc($foto);

    unlink("upload/" . $rowFoto['foto']);
    $delete = mysqli_query($koneksi, "DELETE FROM barang WHERE id ='$id'");
    header("location:?pg=produk&hapus=berhasil");
}

?>
<div class="mb-3" align="right">
    <a href="?pg=tambah-produk" class="btn btn-primary">Tambah Produk</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($row = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row['nama_barang'] ?></td>
                <td><?php echo $row['harga'] ?></td>
                <td><img class="img-thumbnail" width="100px" src="upload/<?php echo $row['foto'] ?>" alt=""></td>
                <td>
                    <a href="?pg=tambah-produk&edit=<?php echo $row['id'] ?>" class="btn btn-danger btn-xs">Edit</a>
                    <a onclick="return confirm('Apakah anda yakin akan menghapus data ini??')" href="?pg=produk&delete=<?php echo $row['id'] ?>" class="btn btn-xs btn-success">Delete</a>
                </td>

            </tr>
        <?php endwhile ?>
    </tbody>
</table>