$(document).ready(function() {

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

            console.log(result.weather)

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
              $("#img").attr("src","https://cdn2.iconfinder.com/data/icons/weathery/100/sun-256.png");
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




