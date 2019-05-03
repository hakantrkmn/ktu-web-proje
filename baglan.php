<?php 

try {
	//Veri tabanına baglanmak icin 
	$db= new PDO("mysql:host=localhost;dbname=proje;charset=utf8",'root','12345678');
	//  echo "Veri tabani baglantisi basarili";
}

catch(PDOException $e) {
	echo $e-> getMessage();

}
 ?>