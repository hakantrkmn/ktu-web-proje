<?php
include 'baglan.php';


if (isset($_GET['bolum'])) {
  $bolum = $_GET['bolum'];
  $kid=$db->prepare("SELECT k_id FROM kullanici where k_ad=:kul_ad ");
  $kid->execute(array('kul_ad'=>$bolum ));
  $kid=$kid->fetch(PDO::FETCH_OBJ);
  $duyurular=$db->prepare("SELECT * FROM duyuru where k_id=:kul_id ");
  $duyurular->execute(array('kul_id'=>$kid->k_id ));
  $duyurular=$duyurular->fetchAll(PDO::FETCH_OBJ);
  // şırda notice verebilir salla bişe olmaz ondan
  $yazi = $duyurular[0]->duyuru;
  for ($i=1;$i<count($duyurular);$i++) 
  { 
    $yazi = $yazi . " - " . $duyurular[$i]->duyuru;
  }
  $etkinlik=$db->prepare("SELECT * FROM etkinlik where k_id=:kul_id ");
  $etkinlik->execute(array('kul_id'=>$kid->k_id ));
  $etkinlik=$etkinlik->fetchAll(PDO::FETCH_OBJ);
}
?>

<!DOCTYPE html>

<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/css/mdb.min.css" rel="stylesheet">

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.0/js/mdb.min.js"></script>
<link rel="stylesheet" href="app.css">

<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">

<title>ödev</title>
<script src="app.js"></script>
<script src="moment-with-locales.js"></script>
</head>


<body>
  <div style="margin-top:50px" class="container">
    <div class="row">
      <div class="col-md-7">

<!-- video carousel -->
<div id="video-carousel-example2" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#video-carousel-example2" data-slide-to="0" class="active"></li>
      <li data-target="#video-carousel-example2" data-slide-to="1"></li>
      <li data-target="#video-carousel-example2" data-slide-to="2"></li>
    </ol>


    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <div class="view">
          <video class="video-fluid" autoplay loop muted>
            <source src="https://mdbootstrap.com/img/video/Lines.mp4" type="video/mp4" />
          </video>
        </div>
  
        <div class="carousel-caption">
          <div class="animated fadeInDown">
            <h3 class="h3-responsive">Light mask</h3>
            <p>First text</p>
          </div>
        </div>

      </div>


      <div class="carousel-item">
        <div class="view">
            <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(6).jpg"
              alt="Second slide">
        </div>

        <div class="carousel-caption">
          <div class="animated fadeInDown">
            <h3 class="h3-responsive">Super light mask</h3>
            <p>Secondary text</p>
          </div>
        </div>
      </div>


      <div class="carousel-item">
        <div class="view">
          <video class="video-fluid" autoplay loop muted>
            <source src="https://mdbootstrap.com/img/video/Tropical.mp4" type="video/mp4" />
          </video>
        </div>
  
        <div class="carousel-caption">
          <div class="animated fadeInDown">
            <h3 class="h3-responsive">Strong mask</h3>
            <p>Third text</p>
          </div>
        </div>
      </div>
    </div>

    <a class="carousel-control-prev" href="#video-carousel-example2" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#video-carousel-example2" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>

</div>

<!-- video carousel -->

<!-- ETKİNLİKLER -->
    <div>
      <div style="text-align:center">
        <span style="font-family: 'Merriweather', serif;font-size: -webkit-xxx-large;">Etkinlikler</span>
      </div>
      <div style="text-align: center;margin-top: 15px" id="events">
          <ol style="list-style: none;padding: 0;word-break: break-all">
          <?php foreach ($etkinlik as $etkinlik): ?>
                    <li> <?php echo $etkinlik->etkinlik ?> </li>
          <?php endforeach; ?>
          </ol>
      </div>    
    </div>
<!-- ETKİNLİKLER -->

        </div>
  <div class="col-md-5">
<!-- DERS PROGRAMI -->
      <div style="text-align:center">
          <span style="font-family: 'Merriweather', serif;font-size: -webkit-xxx-large;">Ders Programı</span>
      <iframe src="http://www.ktu.edu.tr/dosyalar/bilgisayar_1fd3b.pdf" style="width:100%; height:200px;" frameborder="0"></iframe>
      </div>
<!-- DERS PROGRAMI -->
<!-- KAYAN DUYURULAR -->
<div>
    <div class="card">
      <div class="card-body">
        <marquee behavior="scroll" direction="left"> <?php echo $yazi ?></marquee>

      </div>
    </div>
  </div>
<!-- KAYAN DUYURULAR -->
<!-- HAVA DURUMU -->
      <div class="card sa">
        <div id="sehir" class="city">Eindhoven</div>
        <div id="gun" class="date">29 september 2015</div>
        <div class="weather">
          <div class="sun"><img style="    width: 6em;height: 6em;" id="img" src="" alt=""></div>
          <div id="degree" style="text-align:right;padding-right:20px" class="temp">12°C</div>
        </div>
      </div>
<!-- HAVA DURUMU -->
    </div>
    </div>

                 
</div>
</body>
</html>