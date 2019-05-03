<?php 

session_start();
ob_start(); 

include '../../baglan.php';

$kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE k_ad=:email");
$kullanicisor->execute(array(
'email'=>$_SESSION['k_ad']
));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);


if (($_GET['durum']=="bilgisayar")) 
{
	$i=0;
    $kul_id=1;
    $tab_id=2;

	$yazisor=$db->prepare("SELECT * FROM yazi WHERE k_id=:id AND t_id=:tid ");
	$yazisor->execute(array('id'=>$kul_id , 'tid' => $tab_id ));

	while ($yazicek=$yazisor->fetch(PDO::FETCH_ASSOC)) 
	{
		$i++;

	}

	echo $i;



    
}












 ?>