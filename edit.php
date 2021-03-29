<?php 

session_start();

  if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
  }

require 'function.php';

$id = $_GET["id"];
$edit = query("SELECT * FROM barang WHERE id = $id")[0];

if( isset($_POST["submit"]) ){
  if( edit($_POST) > 0){
    echo "<script>
      alert('Data Berhasil Diubah');
      document.location.href = 'barang.php';
    </script>";
  }else{
    echo "<script>
      alert('Data Gagal Diubah');
      document.location.href = 'barang.php';
    </script>";
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
      <title>Inventory</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css/stylehome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>

    <nav>
      <h2 class="username">Welcome, <?= $_SESSION['login']; ?></h2>
      <a href="logout.php" class="button border-blue">Log Out</a>
      <hr>
      <ul>
        <li><a class="active" href="barang.php">Inventory</a></li>
        <li><a href="peminjaman.php">Peminjaman</a></li>
      </ul>
    </nav>

    <div class="layout au">

      <div class="form-popup">
        <form action="" class="form-container" method="POST" enctype="multipart/form-data">
          <h1><center>Edit Barang</center></h1>

          <input type="hidden" name="id" required value="<?= $edit["id"]; ?>">
          <input type="hidden" name="gambarLama" required value="<?= $edit["img"]; ?>">

          <label for="nama_barang"><b>Nama Barang</b></label>
          <input class="hm" type="text" name="nama_barang" required value="<?= $edit["nama_barang"]; ?>">

          <label for="jumlah"><b>Jumlah</b></label>
          <input class="hm" type="number" name="jumlah" required value="<?= $edit["jumlah"]; ?>">

          <label for="img"><b>Gambar</b></label>
          <input class="hm" type="file" name="img" value="<?= $edit["img"]; ?>">

          <button type="submit" class="submit" name="submit">Edit</button>
        </form>
      </div>

    </div>


  </body>
</html>
