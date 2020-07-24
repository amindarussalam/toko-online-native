<div id="kiri">
  <?php 

    echo kategori($kategori_id);

  ?>
</div>

<div id="kanan">

  <div id="slides">
    <?php 
      $queryBanner = mysqli_query($koneksi, "SELECT * FROM banner WHERE status='on' ORDER BY banner_id DESC LIMIT 3");
      while($rowBanner=mysqli_fetch_assoc($queryBanner)){
        echo "<a href='".BASE_URL."$rowBanner[link]'><img src='".BASE_URL."image/slide/$rowBanner[gambar]'></a>";
      }
    ?>
  </div>

  <div id="frame-barang">
    <ul>
      <?php 

        // if($kategori_id){
        //   $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status = 'on' AND kategori_id='$kategori_id' ORDER BY rand() DESC lIMIT 9");
        // }else{
        //   $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE status = 'on' ORDER BY rand() DESC lIMIT 9");
        // }
        if($kategori_id){
        $kategori_id = "AND barang.kategori_id='$kategori_id'";
        }
        $query = mysqli_query($koneksi, "SELECT barang.*, kategori.kategori FROM barang JOIN kategori ON barang.kategori_id=kategori.kategori_id WHERE barang.status = 'on' $kategori_id ORDER BY rand() DESC lIMIT 9");

        $no = 1;

        while($row=mysqli_fetch_assoc($query)){

          $kategori = strtolower($row['kategori']);
          $nama_barang = strtolower($row['nama_barang']);
          $nama_barang = str_replace(" ","-", $nama_barang);

          $style=false;

          if($no==3){
            $style="style='margin-right:0px;'";
            $no=0;
          }
          
          // <a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>

          echo "<li $style>
                  <p class='price'>".rupiah($row['harga'])."</p>
                  <a href='".BASE_URL."$row[barang_id]/$kategori/$nama_barang.html'>
                    <img src='".BASE_URL."image/barang/$row[gambar]'>
                  </a>
                  <div class='keterangan-gambar'>
                    <p>
                      <a href='".BASE_URL."$row[barang_id]/$kategori/$nama_barang.html'>$row[nama_barang]</a>
                    </p>
                    <span>Stock : $row[stok]</span>
                  </div>
                  <div class='button-add-cart'>
                    <a href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]'>+ add to cart</a>
                  </div>
          </li>";
      
          $no++;
        }
      ?>
    </ul>
  </div>
</div>