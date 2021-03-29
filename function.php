<?php 

//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "pwpb");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data){
	global $conn;

	$nama_barang = htmlspecialchars($data["nama_barang"]);
	$jumlah = htmlspecialchars($data["jumlah"]);
	$img = upload();
	if( !$img ){
		return false;
	}

	$query = "INSERT INTO barang VALUES 
			('', '$nama_barang', '$jumlah', '$img')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function pinjam($data){
	global $conn;

	$nama_peminjam = htmlspecialchars($data["nama_peminjam"]);
	$kelas = htmlspecialchars($data["kelas"]);
	$tanggal_pinjam = htmlspecialchars($data["tanggal_pinjam"]);
	$tanggal_pengembalian = htmlspecialchars($data["tanggal_pengembalian"]);
	$barang_id = htmlspecialchars($data["barang_id"]);
	$jumlah_pinjam = htmlspecialchars($data["jumlah_pinjam"]);
	

	$query = "INSERT INTO pinjam VALUES 
			('', '$nama_peminjam', '$kelas', '$tanggal_pinjam', '$tanggal_pengembalian', '$barang_id', '$jumlah_pinjam')";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function hapus($id){
	global $conn;

	mysqli_query($conn, "DELETE FROM barang WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function pengembalian($id){
	global $conn;

	mysqli_query($conn, "DELETE FROM pinjam WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function edit($data){
	global $conn;
	$id = $data["id"];
	$nama_barang = htmlspecialchars($data["nama_barang"]);
	$jumlah = htmlspecialchars($data["jumlah"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	if( $_FILES['img']['error'] === 4 ){
		$img = $gambarLama;
	}else{
		$img = upload();
	}

	$query = "UPDATE barang SET
	nama_barang = '$nama_barang',
	jumlah = '$jumlah',
	img = '$img'
	WHERE id = $id
	";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function registrasi($data){
	global $conn;
	$username = strtolower($data["username"]);
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	$result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
	
	if( mysqli_fetch_assoc($result) ){
		echo "<script>alert('Akun ini sudah ada');</script>";
		return false;
	}

	if( $password !== $password2 ){
		echo "<script>alert('Konfirmasi password salah');</script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password')");
	return mysqli_affected_rows($conn);
}

function upload(){

	$namaFile = $_FILES['img']['name'];
	$ukuranFile = $_FILES['img']['size'];
	$error = $_FILES['img']['error'];
	$tmpName = $_FILES['img']['tmp_name'];

	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/barang/' . $namaFileBaru);
	return $namaFileBaru;

}



?>