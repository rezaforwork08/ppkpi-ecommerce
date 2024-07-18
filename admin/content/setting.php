<?php
$querySetting  = mysqli_query($koneksi, "SELECT * FROM setting ORDER BY id DESC");
if (isset($_POST['simpan'])) {
    $email_website = $_POST['email_website'];
    $tlp_website   = $_POST['tlp_website'];
    $alamat_website = $_POST['alamat_website'];
    $facebook_link = $_POST['fb'];
    $instagram_link = $_POST['ig'];
    $twitter_link  = $_POST['twitter'];
    $linked_link   = $_POST['linkedin'];

    if (mysqli_num_rows($querySetting) > 0) {
        // print_r("jalan kesini ..");
        // die;
        // updated
        $id = mysqli_insert_id($koneksi);
        $update = mysqli_query($koneksi, "UPDATE setting 
        SET email_website ='$email_website', 
        no_tlp_website='$tlp_website',
        alamat_website ='$alamat_website',
        fb='$facebook_link',
        ig='$instagram_link',
        twitter='$twitter_link',
        linkedin='$linked_link' WHERE id ='1'");
        header("location:?pg=setting&edit=berhasil");
    } else {
        // insert
        $insert = mysqli_query($koneksi, "INSERT INTO setting (email_website, no_tlp_website, alamat_website, fb, ig, twitter, linkedin)
         VALUES ('$email_website','$tlp_website','$alamat_website','$facebook_link','$instagram_link','$twitter_link','$linked_link')");
        header("location:?pg=setting&tambah=berhasil");
    }
}
$rowSetting = mysqli_fetch_assoc($querySetting);


?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="">Email Website</label>
        <input value="<?= $rowSetting['email_website']  ?>" type="email" class="form-control" name="email_website" placeholder="Email Website">
    </div>
    <div class="mb-3">
        <label for="">Telpon Website</label>
        <input value="<?= $rowSetting['no_tlp_website']  ?>" type="text" class="form-control" name="tlp_website" placeholder="Telpon Website">
    </div>
    <div class="mb-3">
        <label for="">Alamat</label>
        <textarea name="alamat_website" id="" class="form-control"><?= $rowSetting['alamat_website']  ?></textarea>
    </div>
    <div class="mb-3">
        <label for="">Facebook Link</label>
        <input value="<?= $rowSetting['fb']  ?>" type="url" class="form-control" name="fb" placeholder="Facebook Link">
    </div>
    <div class="mb-3">
        <label for="">Instagram Link</label>
        <input value="<?= $rowSetting['ig']  ?>" type="text" class="form-control" name="ig" placeholder="Instagram Link">
    </div>
    <div class="mb-3">
        <label for="">Twitter Link</label>
        <input value="<?= $rowSetting['twitter']  ?>" type="url" class="form-control" name="twitter" placeholder="Twitter Link">
    </div>
    <div class="mb-3">
        <label for="">Linkedin</label>
        <input value="<?= $rowSetting['linkedin']  ?>" type="text" class="form-control" name="linkedin" placeholder="Linkedin Link">
    </div>
    <div class="mb-3">
        <label for="">Logo</label>
        <input type="file" name="logo">
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
    </div>
</form>