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
	 $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

	  

	 if ($say==1)
	  {
	 	$_SESSION['k_ad']=$kul_ad;

	 	header("Location:./admin/admin/dersprogrami.php?durum=bilgisayar");
	 	exit();	 	# code...
	 }
	 
	 else{
	 	header("Location:login.php?durum=no");
	 	exit();
	 	
	 }



}


if (($_GET['duyurusil']=="ok")) 
{
   



    $sil=$db->prepare("DELETE  FROM yazi WHERE k_id=:user_id and yazi_id=:y_id");

    $kontrol=$sil->execute(array('user_id'=>$_GET['kullanici_id'] , 'y_id'=>$_GET['yazi_id'] ));

    if ($kontrol) {

        header("Location:./admin/admin/duyuru.php?durum=ok");


        # code...
    }
    

}


 if(isset($_POST['duyuruekle'])) {

	$duyurukaydet=$db->prepare("INSERT INTO yazi SET
       yazi=:dyrmetin,
       k_id=:kk_id,
       t_id=:tablo_id
       
 

		");

	$ekle=$duyurukaydet->execute(array(

		'dyrmetin'=>$_POST['duyurumetni'],
		'kk_id'=>$_POST['kullanici_id'],
		'tablo_id'=>$_POST['tablo_id']

		
	));
	if ($_POST['tablo_id']==1) {
		header("Location:./admin/admin/etkinlik.php");
		# code...
	}
	else if ($_POST['tablo_id']==2) {
		header("Location:./admin/admin/duyuru.php");
		# code...
	}
}



if(isset($_POST['dersprogramekle'])) {

	$dersekle=$db->prepare("INSERT INTO ders SET
       img=:derslinki,
       k_id=:kullanici_id
       
       
 

		");

	$ekle=$dersekle->execute(array(

		'derslinki'=>$_POST['derslinki'],
		'kullanici_id'=>$_POST['kullanici_id']
		

		
	));
	
		header("Location:./admin/admin/dersprogrami.php");
		# code...
	
	
}


if (($_GET['derssil']=="ok")) 
{
   



    $sil=$db->prepare("DELETE  FROM ders WHERE k_id=:user_id and ders_id=:d_id");

    $kontrol=$sil->execute(array('user_id'=>$_GET['kullanici_id'] , 'd_id'=>$_GET['ders_id'] ));

    if ($kontrol) {

        header("Location:./admin/admin/dersprogrami.php?durum=ok");


        # code...
    }
    

}











 ?>