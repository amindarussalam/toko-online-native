<?php 

  include_once("../../function/koneksi.php");
  include_once("../../function/helper.php");

  admin_only("kategori", $level);
  
  $button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
  
  $kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : "";

  $kategori = isset($_POST['kategori']) ? $_POST['kategori'] : "";
  $status = isset($_POST['status']) ? $_POST['status'] : "";

  // $kategori = $_POST['kategori'];
  // $status = $_POST['status'];
  // $button = $_POST['button'];

  if($button == "add"){
    mysqli_query($koneksi, "INSERT INTO kategori (kategori, status) VALUES('$kategori','$status')");
  }else if($button == "update"){
    // $kategori_id = $_GET['kategori_id'];

    mysqli_query($koneksi, "UPDATE kategori SET kategori = '$kategori',
                                                status = '$status' WHERE kategori_id='$kategori_id'");    
  }
  else if ($button == "delete"){
    mysqli_query($koneksi, "DELETE FROM kategori WHERE kategori_id='$kategori_id'");
  }

  header("location:".BASE_URL."index.php?page=my_profile&module=kategori&action=list");
?>