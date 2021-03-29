<?php 

	session_start();

	  if( !isset($_SESSION["login"]) ){
	    header("Location: login.php");
	    exit;
	  }

	$nilai = [
		[
			"no" => "18",
			"nama" => "Upin",
			"nilai" => "90"
		],

		[
			"no" => "7",
			"nama" => "Ipin",
			"nilai" => "88"
		],

		[
			"no" => "11",
			"nama" => "Mail",
			"nilai" => "76"
		],

		[
			"no" => "3",
			"nama" => "Ehsan",
			"nilai" => "65"
		],

		[
			"no" => "12",
			"nama" => "Mei Mei",
			"nilai" => "93"
		],

		[
			"no" => "15",
			"nama" => "Susanti",
			"nilai" => "91"
		],

		[
			"no" => "9",
			"nama" => "Jarjit",
			"nilai" => "85"
		],

		[
			"no" => "5",
			"nama" => "Fizi",
			"nilai" => "83"
		],

		[
			"no" => "8",
			"nama" => "Ijat",
			"nilai" => "55"
		],

		[
			"no" => "2",
			"nama" => "Boboiboy",
			"nilai" => "73"
		],

		[
			"no" => "6",
			"nama" => "Gopal",
			"nilai" => "67"
		],

		[
			"no" => "4",
			"nama" => "Fang",
			"nilai" => "58"
		],

		[
			"no" => "19",
			"nama" => "Ying",
			"nilai" => "82"
		],

		[
			"no" => "20",
			"nama" => "Yaya",
			"nilai" => "80"
		],

		[
			"no" => "1",
			"nama" => "Adudu",
			"nilai" => "56"
		],

		[
			"no" => "16",
			"nama" => "Spongebob",
			"nilai" => "72"
		],

		[
			"no" => "13",
			"nama" => "Patrick",
			"nilai" => "79"
		],

		[
			"no" => "17",
			"nama" => "Squidword",
			"nilai" => "84"
		],

		[
			"no" => "10",
			"nama" => "Krab",
			"nilai" => "66"
		],

		[
			"no" => "14",
			"nama" => "Plankton",
			"nilai" => "91"
		],
	];


	$urut = [
		"Upin" => "90",
		"Ipin" => "88",
		"Mail" => "76",
		"Ehsan" => "65",
		"Mei Mei" => "93",
		"Susanti" => "91",
		"Jarjit" => "85",
		"Fizi" => "83",
		"Ijat" => "55",
		"Boboiboy" => "73",
		"Gopal" => "67" ,
		"Fang" => "58",
		"Ying" => "82",
		"Yaya" => "80",
		"Adudu" => "56",
		"Spongebob" => "72",
		"Patrick" => "79",
		"Squidword" => "84",
		"Krab" => "66",
		"Plankton" => "91"
	];

?>

<!DOCTYPE html>
<html>
  <head>
      <title>Array</title>
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
      	<li><a class="active" href="array.php">Array</a></li>
      	<li><a href="luas.php">Luas</a></li>
        <li><a href="barang.php">Inventory</a></li>
        <li><a href="peminjaman.php">Peminjaman</a></li>
      </ul>
    </nav>

    <div class="layout au">

      

      <center><table id="customers">
        <caption><h2>Daftar Nilai</h2></caption>
          <tr>
          	<th style="width: 10%">No.</th>
            <th>Nama</th>
            <th>Nilai</th>
          </tr>
          <?php foreach( $nilai as $row ) : ?>
          <tr>
          	<td><?= $row["no"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["nilai"]; ?></td>
          </tr>
          <?php endforeach; ?>
      </table></center>

      <h1># sort - Mengurutkan dari yang terkecil berdasarkan No. Absen</h1>
      <center><table id="customers">
          <tr>
          	<th style="width: 10%">No.</th>
            <th>Nama</th>
            <th>Nilai</th>
          </tr>
          <?php sort($nilai); ?>
          <?php foreach( $nilai as $row ) : ?>
          <tr>
          	<td><?= $row["no"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["nilai"]; ?></td>
          </tr>
          <?php endforeach; ?>
      </table></center>

      <h1># rsort - Mengurutkan dari yang terbesar berdasarkan No. Absen</h1>
      <center><table id="customers">
          <tr>
          	<th style="width: 10%">No.</th>
            <th>Nama</th>
            <th>Nilai</th>
          </tr>
          <?php rsort($nilai); ?>
          <?php foreach( $nilai as $row ) : ?>
          <tr>
          	<td><?= $row["no"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["nilai"]; ?></td>
          </tr>
          <?php endforeach; ?>
      </table></center>

      <h1># asort - Mengurutkan nilai dari yang terbesar</h1>
      <center><table id="customers">
          <tr>
            <th>Nama</th>
            <th>Nilai</th>
          </tr>
          <?php
          	arsort($urut);
          	foreach($urut as $x => $x_value) {
          		echo "<tr>";
			    echo "<td>$x</td>";
			    echo "<td>$x_value</td>";
			    echo "</tr>";
			}
          ?>
      </table></center>

      <h1># asort - Mengurutkan nilai dari yang terkecil</h1>
      <center><table id="customers">
          <tr>
            <th>Nama</th>
            <th>Nilai</th>
          </tr>
          <?php
          	asort($urut);
          	foreach($urut as $x => $x_value) {
          		echo "<tr>";
			    echo "<td>$x</td>";
			    echo "<td>$x_value</td>";
			    echo "</tr>";
			}
          ?>
      </table></center>

      <h1># ksort - Mengurutkan nama dari awal</h1>
      <center><table id="customers">
          <tr>
            <th>Nama</th>
            <th>Nilai</th>
          </tr>
          <?php
          	ksort($urut);
          	foreach($urut as $x => $x_value) {
          		echo "<tr>";
			    echo "<td>$x</td>";
			    echo "<td>$x_value</td>";
			    echo "</tr>";
			}
          ?>
      </table></center>

      <h1># asort - Mengurutkan nama dari akhir</h1>
      <center><table id="customers">
          <tr>
            <th>Nama</th>
            <th>Nilai</th>
          </tr>
          <?php
          	krsort($urut);
          	foreach($urut as $x => $x_value) {
          		echo "<tr>";
			    echo "<td>$x</td>";
			    echo "<td>$x_value</td>";
			    echo "</tr>";
			}
          ?>
      </table></center>

    </div>


  </body>
</html>