<?php 

session_start();

  if( !isset($_SESSION["login"]) ){
    header("Location: login.php");
    exit;
  }

require 'function.php';
$barang = query("SELECT * FROM barang");
$pinjam = query("SELECT * FROM pinjam");

if( isset($_POST["submit"]) ){
  if( pinjam($_POST) > 0){
    echo "<script>
      alert('Peminjaman Berhasil');
      document.location.href = 'peminjaman.php';
    </script>";
  }else{
    echo "<script>
      alert('Peminjaman Gagal');
      document.location.href = 'peminjaman.php';
    </script>";
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
      <title>Peminjaman</title>
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
        <li><a href="form.php">Form</a></li>
        <li><a href="array.php">Array</a></li>
        <li><a href="luas.php">Luas</a></li>
        <li><a href="barang.php">Inventory</a></li>
        <li><a class="active" href="peminjaman.php">Peminjaman</a></li>
      </ul>
    </nav>

    <div class="layout au">

      <form action="" class="form" method="POST" enctype="multipart/form-data">
          <h1><center>Pinjam Barang</center></h1>

          <label for="nama_barang"><b>Nama Peminjam</b></label>
          <input class="hm" type="text" name="nama_peminjam" required>

          <label for="jumlah"><b>Kelas</b></label>
          <input class="hm" type="text" name="kelas" required>

          <label for="tanggal_pinjam"><b>Tanggal Pinjam</b></label>
          <input class="hm" type="date" name="tanggal_pinjam" required>

          <label for="tanggal_pengembalian"><b>Tanggal Pengembalian</b></label>
          <input class="hm" type="date" name="tanggal_pengembalian" required>

          <label for="barang_id"><b>Id Barang</b></label>
          <select class="hm" name="barang_id" required style="width: 100%;">
            <?php foreach( $barang as $row ) : ?>
              <option value="<?= $row["id"]; ?>"><?= $row["id"]; ?></option>
            <?php endforeach; ?>
          </select>

          <label for="jumlah_pinjam"><b>Jumlah Pinjam</b></label>
          <input class="hm" type="number" name="jumlah_pinjam" required>

          <button type="submit" name="submit" class="submit">Simpan</button>
        </form>

      <center><table id="customers">
        <caption>Data Peminjam</caption>
          <tr>
            <th style="width: 20%">Nama Peminjam</th>
            <th style="width: 20%">Kelas</th>
            <th style="width: 20%">Tanggal Pinjam</th>
            <th style="width: 20%">Tanggal Pengembalian</th>
            <th style="width: 10%">Id Barang</th>
            <th style="width: 10%">Jumlah Pinjam</th>
            <th style="width: 10%">Action</th>
          </tr>
          <?php foreach( $pinjam as $row ) : ?>
          <tr>
            <td><?= $row["nama_peminjam"]; ?></td>
            <td><?= $row["kelas"]; ?></td>
            <td><?= $row["tanggal_pinjam"]; ?></td>
            <td><?= $row["tanggal_pengembalian"]; ?></td>
            <td><?= $row["barang_id"]; ?></td>
            <td><?= $row["jumlah_pinjam"]; ?></td>
            <td>
              <a class="action del" href="pengembalian.php?id=<?= $row["id"]; ?>" onclick="return confirm('Kembalikan Barang?');">Kembalikan</a>
            </td>
          </tr>
          <?php endforeach; ?>
      </table></center>

      <br><br>

    </div>


  </body>
</html>
