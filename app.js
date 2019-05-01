$(document).ready(function() {
    $('#havadurumu').weatherfeed(['TUXX0029']);

    function scroll() {
      $('#events ol li:first').slideUp(function() {
        $(this).show().parent().append(this);
      });
    }
    setInterval(scroll, 1000);
  
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
      
                          $("#place").text(result.name);
                          $("#country").text(result.sys.country);
                          $("#weatherMain").text(result.weather[0].main);
                          $("#weatherIcon").html("<img src= weatherIcon>" );
                          $("#temperature").text(result.main.temp);
                          $("#tempMin").text(result.main.temp_min);
            
                      
                
            var havaresmi = result.weather[0].main;
            console.log(havaDurumUrl)

          switch(havaresmi){
             case 'Clouds':
                    day = "bulutludur";
                   $("#durumimg").attr("src","https://img.icons8.com/color/48/000000/partly-cloudy-day.png");
                    break;
             case 'Rains':
                    day = "yağmurludur";
              $("#durumimg").attr("src","https://img.icons8.com/color/48/000000/rain.png");
                    break;
              case 'Clear':
                    day = "açık";
              $("#durumimg").attr("src","https://img.icons8.com/color/48/000000/sun.png");
                    break;
                case 'Thunderstorm':
                    day = "şimşek";
              $("#durumimg").attr("src","https://img.icons8.com/color/48/000000/chance-of-storm.png");
                    break;
        }
        document.getElementById('baslik').innerHTML=day;
              
                var c = result.main.temp_min;
                function convertF(celsius){
                  var fahrenheit;
                  fahrenheit = (celsius * (9/5)) + 32;
                  return fahrenheit;
                }
                
                
                  $("#unit").on("click",function(){
                    if($("#unit").html()==="Show Fahrenheit!"){
                    var fahren = convertF(c);
                     fahren = Math.round(fahren);
                    $("#tempMin").text(fahren);
                    $("#unitLabel").text("\u2109")
                    $("#unit").html("Show Celcius!");
                      } else {
                        $("#tempMin").text(c);
                        $("#unit").html("Show Fahrenheit!");
                         $("#unitLabel").text("\u2103")
                      }
                     });
            
                      }
                  });
            });
          };
        }
        getData();
        
      
        });
       

  
});