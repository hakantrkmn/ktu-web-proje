<?php 
// bağlan phpde session dursun headerin içinde bişe olmasın her yere bağlan phpyi eklersin

require_once 'baglan.php';

if (isset($_POST['kullanicigiris'])) {
$kul_ad=$_POST['kullanici_adi'];
$kul_sifre=$_POST['kullanici_password'];
$kullanicisor=$db->prepare("SELECT * FROM kullanici where k_ad=:email and sifre=:password");
$kullanicisor->execute(array('email'=>$kul_ad,'password'=>$kul_sifre ));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);	
if ($say==1)
	{
	$_SESSION['k_ad']=$kul_ad;
	header("Location:./admin/admin/dersprogrami.php?durum=bilgisayar");
	exit();
	}	 
else
{
header("Location:login.php?durum=no");
exit();	 	
}
}


if (isset($_GET['duyurusil']) and ($_GET['duyurusil']=="ok")) 
{
   



    $sil=$db->prepare("DELETE  FROM duyuru WHERE  id=:y_id");

    $kontrol=$sil->execute(array('y_id'=>$_GET['id'] ));

    if ($kontrol) {

        header("Location:./admin/admin/duyuru.php?durum=ok");


        # code...
    }
    

}
if (isset($_GET['etkinliksil']) and ($_GET['etkinliksil']=="ok")) 
{
   



    $sil=$db->prepare("DELETE  FROM etkinlik WHERE  id=:y_id");

    $kontrol=$sil->execute(array('y_id'=>$_GET['id'] ));

    if ($kontrol) {

        header("Location:./admin/admin/duyuru.php?durum=ok");


        # code...
    }
    

}


 if(isset($_POST['duyuruekle'])) {

	$duyurukaydet=$db->prepare("INSERT INTO duyuru SET duyuru=:dyrmetin,k_id=:kk_id");

	$ekle=$duyurukaydet->execute(array('dyrmetin'=>$_POST['duyurumetni'],'kk_id'=>$_POST['kullanici_id']));

		header("Location:./admin/admin/duyuru.php");

}
if(isset($_POST['etkinlikekle'])) {

	$duyurukaydet=$db->prepare("INSERT INTO etkinlik SET etkinlik=:dyrmetin,k_id=:kk_id");

	$ekle=$duyurukaydet->execute(array('dyrmetin'=>$_POST['etkinlik'],'kk_id'=>$_POST['kullanici_id']));

		header("Location:./admin/admin/etkinlik.php");

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