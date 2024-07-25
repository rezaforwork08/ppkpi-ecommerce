<?php
include '../koneksi/koneksi.php';

function getData($koneksi, $table, $id)
{
    $query = mysqli_query($koneksi, "SELECT * FROM '$table' WHERE id ='$id'");
    $data = mysqli_fetch_assoc($query);

    return $data;
}
