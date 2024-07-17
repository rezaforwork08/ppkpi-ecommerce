<?php
if (isset($_POST['simpan'])) {
    $email_website = $_POST['email_website'];
    $tlp_website   = $_POST['tlp_website'];
    $alamat_website = $_POST['alamat_website'];
    $facebook_link = $_POST['fb'];
    $instagram_link = $_POST['ig'];
    $twitter_link  = $_POST['twitter'];
    $linked_link   = $_POST['linkedin'];

    $querySetting  = mysqli_query($koneksi, "SELECT * FROM setting ORDER BY id DESC");
    if (mysqli_num_rows($querySetting) > 0) {
        // updated
    } else {
        // insert
        $insert = mysqli_query($koneksi, "INSERT INTO setting (email_website, no_tlp_website, alamat_website, fb, ig, twitter, linkedin)
         VALUES ('$email_website','$tlp_website','$alamat_website','$facebook_link','$instagram_link','$twitter_link','$linked_link')");
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="">Email Website</label>
        <input type="email" class="form-control" name="email_website" placeholder="Email Website">
    </div>
    <div class="mb-3">
        <label for="">Telpon Website</label>
        <input type="text" class="form-control" name="tlp_website" placeholder="Telpon Website">
    </div>
    <div class="mb-3">
        <label for="">Alamat</label>
        <textarea name="alamat_website" id="" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="">Facebook Link</label>
        <input type="url" class="form-control" name="fb" placeholder="Facebook Link">
    </div>
    <div class="mb-3">
        <label for="">Instagram Link</label>
        <input type="text" class="form-control" name="ig" placeholder="Instagram Link">
    </div>
    <div class="mb-3">
        <label for="">Twitter Link</label>
        <input type="url" class="form-control" name="twitter" placeholder="Twitter Link">
    </div>
    <div class="mb-3">
        <label for="">Linkedin</label>
        <input type="text" class="form-control" name="linkedin" placeholder="Linkedin Link">
    </div>
    <div class="mb-3">
        <label for="">Logo</label>
        <input type="file" name="logo">
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
    </div>
</form>