<?php

define("BASE_URL", "http://localhost/cobanative/");

$arrayStatusPesanan[0] = "Menunggu Pembayaran";
$arrayStatusPesanan[1] = "Pembayaran Sedang diValidasi";
$arrayStatusPesanan[2] = "Lunas";
$arrayStatusPesanan[3] = "Pembayaran diTolak";

function rupiah($nilai = 0){
  $string = "Rp,".number_format($nilai);
  return $string;
}

function kategori($kategori_id = false){
  global $koneksi;

  $string = "<div id='menu-kategori'>";
  $string .= "<ul>";
    
      $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status = 'on'");
      while($row=mysqli_fetch_assoc($query)){
        $kategori = strtolower($row['kategori']);
        if($kategori_id == $row['kategori_id']){
          // $string .= "<li><a href='".BASE_URL."index.php?kategori_id=$row[kategori_id]' class='active'>$row[kategori]</a></li>";
          $string .= "<li><a href='".BASE_URL."$row[kategori_id]/$kategori.html' class='active'>$row[kategori]</a></li>";
        }else{
          $string .=  "<li><a href='".BASE_URL."$row[kategori_id]/$kategori.html'>$row[kategori]</a></li>";
        }
      }
    
  $string .= "</ul>";
  $string .= "</div>";

return $string;
}

function admin_only($module, $level){
  if($level != "superadmin"){
    $admin_pages = array("kategori", "barang", "user", "banner", "kota");
    if(in_array($module, $admin_pages)){
      header("location:".BASE_URL."index.php?page=my_profile&module=pesanan&action=list");
    }
  }
}

function pagination($query, $data_perhalaman, $pagination, $url){
  
  $totalData = mysqli_num_rows($query);
  $totalHalaman = ceil($totalData / $data_perhalaman);

  $batasPosisiNomor = 6;
  $batasJumlahHalaman = 10;
  $mulaiPagination = 1;
  $batasAkhirPagination = $totalHalaman;

  echo "<ul class='pagination'>";

  if($pagination > 1){
    $prev = $pagination - 1;
  
    echo "<li>
            <a href='".BASE_URL."$url&pagination=$prev'><< Prev</a>
          </li>";
  }

  
  if($totalHalaman >= $batasJumlahHalaman){
    if($pagination > $batasPosisiNomor){
      $mulaiPagination = $pagination - ($batasPosisiNomor-1);
    }
    
    $batasAkhirPagination = ($mulaiPagination-1) + $batasJumlahHalaman;
    
      if($batasAkhirPagination > $totalHalaman){
        $batasAkhirPagination = $totalHalaman;
      }
  }
  
  // for($i=1; $i<=$totalHalaman; $i++){
  //   if($pagination == $i){
  //  }
  // }

  for($i=$mulaiPagination; $i<=$batasAkhirPagination; $i++){
    if($pagination == $i){

      echo "<li>
              <a class='active' href='".BASE_URL."$url&pagination=$i'>$i</a>
            </li>";
    }else{

      echo "<li>
      <a href='".BASE_URL."$url&pagination=$i'>$i</a>
      </li>";
    }
  }
  
  if($pagination < $totalHalaman){
    $next = $pagination + 1;
  
    echo "<li>
            <a href='".BASE_URL."$url&pagination=$next'>Next >></a>
          </li>";
  }

  echo "</ul>";
}
  
?>