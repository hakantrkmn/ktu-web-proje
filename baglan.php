<?php 


session_start();
ob_start(); 

try {
	//Veri tabanına baglanmak icin 
	$db= new PDO("mysql:host=localhost;dbname=yeniproje;charset=utf8",'root','12345678');

	$db= new PDO("mysql:host=localhost;dbname=proje;charset=utf8",'root','');

	
	//  echo "Veri tabani baglantisi basarili";
}

catch(PDOException $e) {
	echo $e-> getMessage();

}
 ?>