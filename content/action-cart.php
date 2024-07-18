<?php
if (!isset($_SESSION['id_member'])) {
    header("location:?pg=member&message=Upss-Harus-Register-Dulu");
}else{
    
}
