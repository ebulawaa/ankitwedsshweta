var u = "c";
city = "jodhpur";


$(document).ready(function() {

   $(".icon_temp").click(function(){
     if($('.icon_temp').text().includes("C")){
         u="f"
         $('#submit-city').click();

     }else if($('.icon_temp').text().includes("F")){
         u="c"
         $('#submit-city').click();
     }
   
   });
      
    $.simpleWeather({
     location: city ,
     
     woeid: '',
     unit: u,
     success: function(weather) {

       var city = $('.city');
       var thumb = $('.thumb');
       var temp = $('.temp');
        var currently = weather.currently;
       var humidity = weather.humidity;
        var thumb = weather.image;
       var high = weather.high;

                      
                        var low = weather.low;
                      var wind = weather.wind.speed;
                      var forehigh = weather.forecast[1].high;
                         var b = weather.forecast[1].thumbnail;
                      var c = weather.forecast[1].text;
                   var forelow = weather.forecast[1].low;
              var unit = weather.units.temp;
       
        var day2 = weather.forecast[1].day+" | "+"<i class='wi wi-yahoo-"+ weather.forecast[1].code +"'></i>"+
                  " | "+ weather.forecast[1].high+'\xB0' + weather.units.temp+" / "+ weather.forecast[1].low+'\xB0' + weather.units.temp;

                  var day3 = weather.forecast[2].day+" | "+"<i class='wi wi-yahoo-"+ weather.forecast[2].code +"'></i>"+
                  " | "+ weather.forecast[2].high+'\xB0' + weather.units.temp+" / "+ weather.forecast[2].low+'\xB0' + weather.units.temp;

                  var day4 = weather.forecast[3].day+" | "+"<i class='wi wi-yahoo-"+ weather.forecast[3].code +"'></i>"+
                  " | "+ weather.forecast[3].high+'\xB0' + weather.units.temp+" / "+ weather.forecast[3].low+'\xB0' + weather.units.temp;

                  var day5 = weather.forecast[4].day+" | "+"<i class='wi wi-yahoo-"+ weather.forecast[4].code +"'></i>"+
                  " | "+ weather.forecast[4].high+'\xB0' + weather.units.temp+" / "+ weather.forecast[4].low+'\xB0' + weather.units.temp;

                  var day6 = weather.forecast[5].day+" | "+"<i class='wi wi-yahoo-"+ weather.forecast[5].code +"'></i>"+
                  " | "+ weather.forecast[5].high+'\xB0' + weather.units.temp+" / "+ weather.forecast[5].low+'\xB0' + weather.units.temp;


   
 $('.day2').html(day2);
 $('.day3').html(day3);
 $('.day4').html(day4);
 $('.day5').html(day5);
  $('.day6').html(day6);
                  
                  
                      

                  var mainicon = "<i class='wi wi-yahoo-"+ weather.code +"'></i>"
                 
                 var icon = "<i class='wi wi-yahoo-"+ weather.forecast[1].code +"'></i>"
                  

                  $('.thumb').html(mainicon);
                 $('.b').html(icon);

                     $('#splashscreen').fadeOut('fast');

                     global_my = weather;
                     console.log(weather);
                     console.log(JSON.stringify(weather));

  
 $("#save").show();

/* new work starts from here*/

$('.place_condition').text(weather.city+","+weather.region+" | "+weather.currently);
$('.icon_temp').html("<i id='mainicon'class='wi wi-yahoo-"+ weather.code +"'></i>"+"   "+weather.temp + '\xB0' + weather.units.temp);
$('.high_low').html(high + '\xB0' + weather.units.temp+" / "+low + '\xB0' + weather.units.temp);
$('.humi_wind').html("<i class='wi wi-raindrop'></i>"+humidity+"%"+" | "+"<i class='wi wi-strong-wind'></i>"+wind+weather.units.speed);
$('.weatherinfo1').html("Currently weather of "+weather.city+ " is "+weather.currently+ " and temperature is "+weather.temp+'\xB0'+weather.units.temp);
$('.weatherinfo2').html("Expected weather on programme days may be "+weather.forecast[9].text+" and temperature will be around "+weather.forecast[9].high+'\xB0' + weather.units.temp+" - "+ weather.forecast[9].low+'\xB0' + weather.units.temp);
$('.box1').fadeIn(500);
$('.box2').fadeIn(1500);

setTimeout(function(){ info(); }, 3000);
     },
     
     error: function(error) {
      //$("#weather").html('<p>'+error+'</p>');
      loadweather();
     }

     
    });
  
  });
  
