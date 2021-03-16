<!DOCTYPE html>
<html>
<head>
	<title>Login Aplikasi Pembayaran SPP</title>
</head>
<body>
<h3>Silahkan Login Menggunakan Username dan Password Anda</h3>
<hr/>
<form method="post" action="">
	<table>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username"  /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"  /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="Login"  /></td>
		</tr>
	</table>
</form>
<?php 
if($_SERVER ['REQUEST_METHOD']=='POST'){
	//variabel untuk menyimpan kiriman dari form 
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user=='' || $pass==''){
		echo "Form belum Lengkap";
	}else{
		include "koneksi.php";
		$sqlLogin = mysqli_query($konek, "SELECT * FROM tbl_petugas WHERE uname='$user' AND paswd='$pass'");
		$jml = mysqli_num_rows($sqlLogin);
		$d=mysqli_fetch_array($sqlLogin);
		if($jml > 0){
			session_start();
			$_SESSION['login'] = true;
			$_SESSION['id'] = $d['id_petugas'];
			$_SESSION['username'] = $d['uname'];

			header('location:./index.php');
		}else{
			echo "Username dan Password Anda Salah";
			echo $user;
			echo $pass;
		}
	}
} 
?>
</body>
</html>