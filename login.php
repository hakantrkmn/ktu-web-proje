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







<div class="container sd col-md-3 text-center" style="margin-top: 120px;">



    <?php if ($_GET['durum']==ok && isset($_SESSION['kullanici_email']) ) {?>
        <div class="alert alert-success">
            Giriş Başarılı
        </div>
        
   <?php header("Refresh: 2; index.php "); }
   else if($_GET['durum']==no){
        ?> <div class="alert alert-danger">
            Giriş Başarısız
        </div>
    <?php header("Refresh: 2; giris.php "); } ?> 
    
     
 
   
    <form action="islem.php" class="form-signin" method="POST">
      <img class="mb-4" src="kisi.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">GİRİŞ YAP</h1>
      <input type="email" name="kullanici_email"  class="form-control mt-3" placeholder="Email address" required="">
      <input type="password"  name="kullanici_password" class="form-control mt-3" placeholder="Password" required="">
      
      <button class="btn btn-lg btn-primary btn-block mt-3" type="submit" name="kullanicigiris">Giriş Yap</button>
    
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
    

    
 




</div>

                 
</div>
</body>
</html>