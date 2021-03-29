<?php 

session_start();

  if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
  }

require 'function.php';
$barang = query("SELECT * FROM barang");

if( isset($_POST["submit"]) ){
  if( tambah($_POST) > 0){
    echo "<script>
      alert('Data Berhasil Ditambahkan');
      document.location.href = 'barang.php';
    </script>";
  }else{
    echo "<script>
      alert('Data Gagal Ditambahkan');
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
      <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  </head>

  <body>

    <nav>
      <h2 class="username">Welcome, <?= $_SESSION['login']; ?></h2>
      <a href="logout.php" class="button border-blue">Log Out</a>
      <hr>
      <ul>
        <li><a href="form.php">Form</a></li>
        <li><a href="array.php">Array</a></li>
        <li><a href="luas.php">Luas</a></li>
        <li><a class="active" href="barang.php">Inventory</a></li>
        <li><a href="peminjaman.php">Peminjaman</a></li>
      </ul>
    </nav>

    <div class="layout au">

      <form action="" class="form" method="POST" enctype="multipart/form-data">
          <h1><center>Input Barang</center></h1>

          <label for="nama_barang"><b>Nama Barang</b></label>
          <input class="hm" type="text" name="nama_barang" required>

          <label for="jumlah"><b>Jumlah</b></label>
          <input class="hm" type="number" name="jumlah" required>

          <label for="img"><b>Gambar</b></label>
          <input class="hm" type="file" name="img" required>

          <button type="submit" name="submit" class="submit">Simpan</button>
        </form>

      <center><table id="customers">
        <caption>Data Barang</caption>
          <tr>
            <th style="width: 10%">ID Barang</th>
            <th style="width: 20%">Nama Barang</th>
            <th style="width: 10%">Jumlah</th>
            <th style="width: 20%">Gambar</th>
            <th style="width: 20%">Action</th>
          </tr>
          <?php foreach( $barang as $row ) : ?>
          <tr>
            <td><?= $row["id"]; ?></td>
            <td><?= $row["nama_barang"]; ?></td>
            <td><?= $row["jumlah"]; ?></td>
            <td><img src="img/barang/<?= $row["img"]; ?>" width="100px" height="100px"></td>
            <td>
              <a class="action" href="edit.php?id=<?= $row["id"]; ?>"><i class="fa fa-edit"></i> Edit</a>
              <a class="action del" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Hapus Data?');"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
      </table></center>

      <br><br>

    </div>


  </body>
</html>
