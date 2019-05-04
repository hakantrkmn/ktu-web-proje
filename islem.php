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

// duyuru silme
if (isset($_GET['duyurusil']) and ($_GET['duyurusil']=="ok")) 
{
    $sil=$db->prepare("DELETE  FROM duyuru WHERE  id=:y_id");
    $kontrol=$sil->execute(array('y_id'=>$_GET['id'] ));
	if ($kontrol) 
	{
        header("Location:./admin/admin/duyuru.php?durum=ok");
    }
}
// etkinlik silme
if (isset($_GET['etkinliksil']) and ($_GET['etkinliksil']=="ok")) 
{
    $sil=$db->prepare("DELETE  FROM etkinlik WHERE  id=:y_id");
    $kontrol=$sil->execute(array('y_id'=>$_GET['id'] ));
	if ($kontrol) 
	{
        header("Location:./admin/admin/duyuru.php?durum=ok");
    }
}
// video silme 
if (isset($_GET['videosil']) and ($_GET['videosil']=="ok")) 
{
    $sil=$db->prepare("DELETE  FROM video WHERE  id=:y_id");
    $kontrol=$sil->execute(array('y_id'=>$_GET['id'] ));
	if ($kontrol) 
	{
        header("Location:./admin/admin/video.php?durum=ok");
    }
}
// duyuru ekleme
 if(isset($_POST['duyuruekle'])) 
 {
	$duyurukaydet=$db->prepare("INSERT INTO duyuru SET duyuru=:dyrmetin,k_id=:kk_id");
	$ekle=$duyurukaydet->execute(array('dyrmetin'=>$_POST['duyurumetni'],'kk_id'=>$_POST['kullanici_id']));
	header("Location:./admin/admin/duyuru.php");
}
// etkinlik ekleme
if(isset($_POST['etkinlikekle'])) 
{
	$duyurukaydet=$db->prepare("INSERT INTO etkinlik SET etkinlik=:dyrmetin,k_id=:kk_id");
	$ekle=$duyurukaydet->execute(array('dyrmetin'=>$_POST['etkinlik'],'kk_id'=>$_POST['kullanici_id']));
	header("Location:./admin/admin/etkinlik.php");
}
// dersprogramı ekleme
if(isset($_POST['dersprogramekle']))
{
	$derssil=$db->prepare("DELETE FROM ders WHERE k_id=:kullanici_id");
	$sil=$derssil->execute(array('kullanici_id'=>$_POST['kullanici_id']));
	$dersekle=$db->prepare("INSERT INTO ders SET img=:derslinki,k_id=:kullanici_id");
	$ekle=$dersekle->execute(array('derslinki'=>$_POST['derslinki'],'kullanici_id'=>$_POST['kullanici_id']));	
		header("Location:./admin/admin/dersprogrami.php");
}
// ders programı silme
if (isset($_GET['derssil']) and ($_GET['derssil']=="ok")) 
{
    $sil=$db->prepare("DELETE  FROM ders WHERE k_id=:user_id and ders_id=:d_id");
    $kontrol=$sil->execute(array('user_id'=>$_GET['kullanici_id'] , 'd_id'=>$_GET['ders_id'] ));
	if ($kontrol) 
	{
    header("Location:./admin/admin/dersprogrami.php?durum=ok");
    }
}
// video yükleme
if (isset($_POST['videoyukle'])) 
{
$yukleklasor="./admin/admin/video/";
$tmp_name = $_FILES['video']['tmp_name'];
$name=$_FILES['video']['name'];
$boyut =$_FILES['video']['size'];
$tip=$_FILES['video']['type'];
$uzanti = substr($name, -4,4);
$rand1=rand(10000,50000);
$rand2=rand(10000,50000);
$resimad=$rand1.$rand2.$uzanti;
move_uploaded_file($tmp_name, "$yukleklasor/$resimad");
$resimsor=$db->prepare("INSERT INTO video SET link=:resimbilgi , aciklama=:aciklamabilgi, k_id=:kul_id");
$resimcek=$resimsor->execute(array('resimbilgi' => $resimad , 'aciklamabilgi'=>$_POST['aciklama'] , 'kul_id'=>$_POST['kullanici_id']));
if ($resimcek) {
	header("Location:./admin/admin/video.php");
}
}
// resim yükleme
if (isset($_POST['resimyukle'])) 
{
$yukleklasor="./admin/admin/resim/";
$tmp_name = $_FILES['yukle_resim']['tmp_name'];
$name=$_FILES['yukle_resim']['name'];
$boyut =$_FILES['yukle_resim']['size'];
$tip=$_FILES['yukle_resim']['type'];
$uzanti = substr($name, -4,4);
$rand1=rand(10000,50000);
$rand2=rand(10000,50000);
$resimad=$rand1.$rand2.$uzanti;
//dosya varmı control 

if (strlen($name)==0) {
	echo "Bir dosya seçiniz";
	exit();
}
//boyut control
if ($boyut>(1024*1024*3)) {
	echo "Dosya boyutu çok fazla";
	exit();
}
//tip kontrol
if ($tip != 'image/jpeg' && $tip!= 'image/png' && $uzanti!='.jpg') {
	echo "Yalnızca jpeg veya png formatında olabilir";
}

move_uploaded_file($tmp_name, "$yukleklasor/$resimad");


$resimsor=$db->prepare("INSERT INTO resim SET resim=:resimbilgi , aciklama=:aciklamabilgi, k_id=:kul_id");
$resimcek=$resimsor->execute(array('resimbilgi' => $resimad , 'aciklamabilgi'=>$_POST['aciklama'] , 'kul_id'=>$_POST['kullanici_id']));
if ($resimcek) {
	header("Location:./admin/admin/resim.php");
}
}
// resim silme
if (isset($_GET['resimsil']) and ($_GET['resimsil']=="ok")) 
{
    $sil=$db->prepare("DELETE  FROM resim WHERE  resim_id=:r_id");
    $control=$sil->execute(array('r_id'=>$_GET['id'] ));
	if ($control) 
	{
        header("Location:./admin/admin/resim.php?durum=ok");
    }
}

 ?>