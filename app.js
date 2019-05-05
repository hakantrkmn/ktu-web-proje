$(document).ready(function() {
      $(".carousel-item").first().addClass("active")



      var bolum = $("#bolum").val()
      // DUYURULAR GÜNCELLEME
      console.log($(".etkinlikler").last().text())
      setInterval(function(){
            $.ajax({
                  type:'POST',
                  url:'api.php',
                  dataType: "json",
                  data:{duyuru:"1",bolum:bolum},
                  success:function(result){
                        if(result.duyuru==$(".duyuru").val())
                        {
                        }
                        else
                        {
                              $("#duyuru").append("-"+ result.duyuru)
                              $(".duyuru").val(result.duyuru)
      
                        }
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                  }
            });
            $.ajax({
                  type:'POST',
                  url:'api.php',
                  dataType: "json",
                  data:{etkinlik:"1",bolum:bolum},
                  success:function(result){
                        if(result.etkinlik==$("#etkinlik").val())
                        {
                        }
                        else
                        {
                              $(".etkinlikler").last().after("<li class='etkinlikler'>"+result.etkinlik+"</li>")
                              $("#etkinlik").val(result.etkinlik)
      
                        }
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                  }
            });
            // console.log($(".videolar").last().attr("src"))
            $.ajax({
                  type:'POST',
                  url:'api.php',
                  dataType: "json",
                  data:{video:"1",bolum:bolum},
                  success:function(result){
                        if("admin/admin/video/"+result.link==$(".videolar").last().attr("src"))
                        {
                        }
                        else
                        {
                              $(".carousel-item").last().after('<div class="carousel-item"><div class="view"><video class="video-fluid" autoplay loop muted><source class="videolar" src="admin/admin/video/'+ result.link +'" type="video/mp4" /></video></div><div class="carousel-caption"><div class="animated fadeInDown"><p class="aciklama" >'+ result.aciklama +'</p></div></div></div>')

      
                        }

                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                  }
            });
            $.ajax({
                  type:'POST',
                  url:'api.php',
                  dataType: "json",
                  data:{resim:"1",bolum:bolum},
                  success:function(result){
                        if("admin/admin/resim/"+result.resim==$(".resim").last().attr("src"))
                        {
                        }
                        else
                        {
                              $(".carousel-item").last().after('<div class="carousel-item"><div class="view"><img class="d-block w-100 olcu resim" src="admin/admin/resim/'+ result.resim +'"alt="Second slide"></div><div class="carousel-caption"><div class="animated fadeInDown"><p class="aciklama" >'+ result.aciklama +'</p></div></div></div>')

      
                        }

                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                  }
            });
        },1000);
      //   DUYURULAR GÜNCELLEME 

















































  console.log(moment.locale("tr"))
    function scroll() {
      $('#events ol li:first').slideUp(function() {
        $(this).show().parent().append(this);
      });
    }
    setInterval(scroll, 2000);
  
    $(document).ready (function(){
  
        function getData(){
        var url = "https://fcc-weather-api.glitch.me/api/current?";
      
        var latitude;
        var longitude;
        var havaDurumUrl;
      
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
         latitude = position.coords.latitude;
         longitude = position.coords.longitude;
         havaDurumUrl = (url + "lat=" + 41.005 +  "&lon=" + 39.72694);
                $.ajax({
                      url:havaDurumUrl,
              dataType:'json',
                      success: function(result){
      
                          $("#sehir").text(result.name);
                          $("#country").text(result.sys.country);
                          $("#durum").text(result.weather[0].main);
                          $("#wind").text(result.wind.speed);
                          $("#gun").text(moment().format('LL'));
                          $("#weatherIcon").html("<img src= weatherIcon>" );
                          $("#degree").text(Math.ceil(result.main.temp)+ "°C");
                          $("#tempMin").text(result.main.temp_min);
            
                      
                
            var havaresmi = result.weather[0].main;
            console.log(result)

          switch(havaresmi){
             case 'Clouds':
                    day = "bulutludur";
                   $("#img").attr("src",result.weather[0].icon);
                    break;
             case 'Rain':
                    day = "yağmurludur";
              $("#img").attr("src","https://cdn4.iconfinder.com/data/icons/weather-129/64/weather-5-128.png");
                    break;
              case 'Clear':
                    day = "açık";
              $("#img").attr("src",result.weather[0].icon);
                    break;
                case 'Thunderstorm':
                    day = "şimşek";
              $("#img").attr("src","https://cdn4.iconfinder.com/data/icons/weather-129/64/weather-8-128.png");
                    break;
        }
        document.getElementById('baslik').innerHTML=day;
              
                var c = result.main.temp_min;
            
                      }
                  });
            });
          };
        }
        getData();
        
      
        });
       

  
});




