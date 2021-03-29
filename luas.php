<?php

	session_start();

	  if( !isset($_SESSION["login"]) ){
	    header("Location: login.php");
	    exit;
	  }

?>

<!DOCTYPE html>
<html>

<head>
	<title>Luas</title>
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
      	<li><a class="active" href="luas.php">Luas</a></li>
        <li><a href="barang.php">Inventory</a></li>
        <li><a href="peminjaman.php">Peminjaman</a></li>
      </ul>
    </nav>

    <div class="layout au">

    	<center><h1>Menghitung Luas dan Keliling Lingkaran</h1></center>
		<div class="circle">
			<form action="" method="post">
				<br><br><br>
				<h2 class="j">Jari-Jari : </h2> <input type="text" class="kotak" name="r">
				<button class="btn2" name="hitung"><span>Hitung </span></button>
			</form>
		</div>

		<br>

		<center><h1>Menghitung Luas dan Keliling Persegi</h1></center>
		<div class="square">
			<form action="" method="post">
				<br><br><br>
				<h2 class="j">Sisi : </h2> <input type="text" class="kotak" name="sisi">
				<button class="btn" name="jumlah"><span>Hitung </span></button>
			</form>
		</div>

		<div class="hasil">
			<center><h1 class="h">Hasil</h1></center>
			<div class="p">
			<?php
				if (isset($_POST['hitung'])) {
				$r = $_POST['r'];

				$keliling = 2 * 3.14 * $r;
				$luas = 3.14 * $r *$r;

				echo "r = $r <br>";
				echo "maka : <br>";
				echo "Keliling = $keliling <br>";
				echo "Luas = $luas <br>";
				}
			?>
			</div>
		</div>

		<div class="hasil2">
			<center><h1 class="h">Hasil</h1></center>
			<div class="p">
			<?php
				if (isset($_POST['jumlah'])) {
				$s = $_POST['sisi'];

				$keliling = 4 * $s;
				$luas = $s * $s;

				echo "s = $s <br>";
				echo "maka : <br>";
				echo "Keliling = $keliling <br>";
				echo "Luas = $luas <br>";
				}
			?>
			</div>
		</div>

	</div>

</body>
</html>