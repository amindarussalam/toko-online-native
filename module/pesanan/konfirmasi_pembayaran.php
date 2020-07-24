<?php 

$pesanan_id = $_GET["pesanan_id"];

?>

<table class="table-list">
  <form action="<?php echo BASE_URL."module/pesanan/action.php?pesanan_id=$pesanan_id"; ?>" method="POST">
    <div class="element-form">
      <label for="nomor_rekening">Nomor Rekening</label>
      <span><input type="text" name="nomor_rekening"></span>
    </div>
    <div class="element-form">
      <label for="nama_account">Nama Account</label>
      <span><input type="text" name="nama_account"></span>
    </div>
    <div class="element-form">
      <label for="tanggal_transfer">Tanggal Transfer (format: yyyy-mm-dd)</label>
      <span><input type="text" name="tanggal_transfer"></span>
    </div>
    <div class="element-form">
      <span><input type="submit" value="konfirmasi" name="button"></span>
    </div>
  </form>
</table>