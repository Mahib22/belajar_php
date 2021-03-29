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
	<title>Penanganan Form</title>
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
      	<li><a class="active" href="form.php">Form</a></li>
      	<li><a href="array.php">Array</a></li>
      	<li><a href="luas.php">Luas</a></li>
        <li><a href="barang.php">Inventory</a></li>
        <li><a href="peminjaman.php">Peminjaman</a></li>
      </ul>
    </nav>

    <div class="layout au">
    	<div class="hmm">

		<form class="wk" action="" method="post">
			<label style="font-size: 22px" for="nama"><b>Nama : </b></label>
			<input class="n" type="text" name="nama">

			<br><br>

			<h2>Pilih Jurusan : </h2>
			<input type="radio" name="jurusan" value="Elektronika Industri">Elektrtonika Industri
			<br>
			<input type="radio" name="jurusan" value="Instrumentasi Logam">Instrumentasi Logam
			<br>
			<input type="radio" name="jurusan" value="Kimia Industri">Kimia Industri
			<br>
			<input type="radio" name="jurusan" value="Pengelasan">Pengelasan
			<br>
			<input type="radio" name="jurusan" value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak

			<div class="eskul">
				<h2>Pilih Ekstrakulikuler : </h2>
				<input type="checkbox" name="eskul5" value="English Club">English Club
				<br>
				<input type="checkbox" name="eskul1" value="IT Club">IT Club
				<br>
				<input type="checkbox" name="eskul4" value="Paskibra">Paskibra
				<br>
				<input type="checkbox" name="eskul2" value="Pramuka">Pramuka
				<br>
				<input type="checkbox" name="eskul3" value="Rohis">Rohis
			</div>

			<br>

			<h2>Pilih Game Favorite : </h2>
			<select class="s" name="game">
				<option>-</option>
				<option>Pro Evolution Soccer</option>
				<option>Mobile Legend</option>
				<option>Free Fire</option>
				<option>PUBG</option>
				<option>COD</option>
			</select>

			<br><br>

			<h2>Cita-cita</h2>
			<textarea class="s" name="cita" cols="40" rows="5"></textarea>

			<br><br>

			<button class="glow-on-hover" type="submit" name="cetak">Cetak</button>
		</form>

		</div>

		<center><table id="customers">
        <?php 

			if (isset($_POST['cetak'])) {
				$nama = htmlspecialchars($_POST['nama']);
				echo "<tr>
			            <th>Nama</th>
			            <td>$nama</td>
			          </tr>";

				$jurusan = $_POST['jurusan'];
				echo "<tr>
			            <th>Jurusan</th>
			            <td>$jurusan</td>
			          </tr>";

			    echo "<tr>
			            <th>Ekstrakulikuler</th>
			            <td>";

				if (isset($_POST['eskul1'])) {
					echo "+ " . $_POST['eskul1'] . "<br>";
				}
				if (isset($_POST['eskul2'])) {
					echo "+ " . $_POST['eskul2'] . "<br>";
				}
				if (isset($_POST['eskul3'])) {
					echo "+ " . $_POST['eskul3'] . "<br>";
				}
				if (isset($_POST['eskul4'])) {
					echo "+ " . $_POST['eskul4'] . "<br>";
				}
				if (isset($_POST['eskul5'])) {
					echo "+ " . $_POST['eskul5'] . "<br>";
				}
				echo "</td>
					</tr>";

				$game = $_POST['game'];
				echo "<tr>
			            <th>Game Favorite</th>
			            <td>$game</td>
			          </tr>";

				$cita = htmlspecialchars($_POST['cita']);
				echo "<tr>
			            <th>Cita-cita</th>
			            <td>$cita</td>
			          </tr>";
			}

		?>
      </table></center>
		<br><br>

	</div>

</body>
</html>