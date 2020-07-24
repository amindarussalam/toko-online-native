<?php 
  if($user_id){
    header("location: ".BASE_URL);
  }
?>

<div id="container-user-akses">
  <form method="post" action="<?php echo BASE_URL."proses_login.php"; ?>">
  
  <?php 
    $notif = isset ($_GET['notif']) ? $_GET['notif'] : false;
  
    if($notif == "require"){
      echo "<div class='notif'>maaf, email atau password salah</div>";
    }
  ?>

    
    <div class="element-form">
      <label for="email">Email</label>
      <span><input type="email" name="email" id="email" placeholder="masukkan email"></span>
    </div>

    <div class="element-form">
      <div class="label-pass">
        <label for="password">Password</label>
        <i class="btn-hide-show far fa-eye-slash" title="show password"></i>
      </div>
      <span><input type="password" name="password" id="password" class="input-pass" placeholder="masukkan password"></span>
    </div>

    <div class="element-form">
      <span><input type="submit" value="login"></span>
    </div>
  </form>
</div>