<?php 
//variabel koneksi

$konek = mysqli_connect("localhost","root","","db_spp_rifqy");


if(!$konek)
{
	echo "Koneksi Database Gagal..";
}

?>