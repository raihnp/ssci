$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    autoplay:false,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    center: true,
    
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:3
        }
    }
  });
});

var playerSettings = {
      resetOnEnd : true,
      hideControls  :true,
      clickToPlay:true,
      keyboard : false,
    }

const players = Plyr.setup('.js-player', playerSettings);

 players.forEach(function(instance,index) { 
            instance.on('play',function(){
                players.forEach(function(instance1,index1){
                  if(instance != instance1){
                        instance1.pause();
                    }
                });
            });
        });

$('.video-section').on('translated.owl.carousel', function (event) {
  players.forEach(function(instance,index1){
                  instance.pause();
                });
});