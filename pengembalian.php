<?php 

require 'function.php';

$id = $_GET["id"];

if( pengembalian($id) > 0){
    echo "<script>
      alert('Barang Berhasil Dikembalikan');
      document.location.href = 'peminjaman.php';
    </script>";
  }else{
    echo "<script>
      alert('Barang Gagal Dikembalikan');
      document.location.href = 'peminjaman.php';
    </script>";
  }

?>