<?php 
  if($user_id){
    header("location: ".BASE_URL);
  }
?>

<div id="container-user-akses">
  <form method="post" action="<?php echo BASE_URL."proses_register.php"; ?>">
  
  <?php 
    $notif = isset ($_GET['notif']) ? $_GET['notif'] : false;
    
    $nama_lengkap = isset ($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
    $email = isset ($_GET['email']) ? $_GET['email'] : false;
    $phone = isset ($_GET['phone']) ? $_GET['phone'] : false;
    $alamat = isset ($_GET['alamat']) ? $_GET['alamat'] : false;
  
    if($notif == "require"){
      echo "<div class='notif'>maaf, kamu harus melengkapi form dibawah ini</div>";
    }elseif ($notif == "password") {
      echo "<div class='notif'>maaf, password yang kamu masukin tidak sama</div>";
    }elseif ($notif == "email") {
      echo "<div class='notif'>maaf, email yang kamu masukin sudah dipakai</div>";
    }
  ?>

    <div class="element-form">
      <label for="nama_lengkap">Nama Lengkap</label>
      <span><input type="text" name="nama_lengkap" id="nama_lengkap" value="<?php echo $nama_lengkap ?>"></span>
    </div>
    <div class="element-form">
      <label for="email">Email</label>
      <span><input type="email" name="email" id="email" value="<?php echo $email ?>"></span>
    </div>
    <div class="element-form">
      <label for="phone">No. Hp</label>
      <span><input type="text" name="phone" id="phone" value="<?php echo $phone ?>"></span>
    </div>
    <div class="element-form">
      <label for="alamat">Alamat</label>
      <span><textarea name="alamat" id="alamat"><?php echo $alamat ?></textarea></span>
    </div>

    <div class="element-form">
      <div class="label-pass">
        <label for="password">Password</label>
        <i class="btn-hide-show far fa-eye-slash" title="show password"></i>
      </div>
      <span><input type="password" name="password" id="password" class="input-pass"></span>
    </div>

    <div class="element-form">
      <div class="label-pass">
        <label for="re_password">Re_type Password</label>
        <i class="btn-hide-show1 far fa-eye-slash" title="show password"></i>
      </div>
      <span><input type="password" name="re_password" id="re_password" class="input-pass1"></span>
    </div>

    <div class="element-form">
      <span><input type="submit" value="register"></span>
    </div>
  </form>
</div>