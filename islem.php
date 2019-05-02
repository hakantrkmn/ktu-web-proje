<?php 

session_start();
ob_start();

require_once 'baglan.php';

if (isset($_POST['kullanicigiris'])) {

	$kul_ad=$_POST['kullanici_adi'];
	$kul_sifre=$_POST['kullanici_password'];
	# code...

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where k_ad=:email and sifre=:password");

	$kullanicisor->execute(array(
		'email'=>$kul_ad,
		'password'=>$kul_sifre 
	));

	 $say=$kullanicisor->rowCount();

	 if ($say==1) {
	 	$_SESSION['k_ad']=$kul_ad;

	 	header("Location:./admin/admin/dersprogrami.php?durum=ok");	 	# code...
	 }
	 else{
	 	header("Location:giris.php?durum=no");
	 	
	 }



}




 ?>