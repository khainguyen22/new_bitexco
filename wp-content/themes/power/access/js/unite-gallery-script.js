jQuery(document).ready(function($){
  $('.gallery-item').magnificPopup({
    type: 'image',
    mainClass: 'mfp-with-zoom', 
    preload: [0, 6],
    gallery:{
        enabled:true
      },
  
    zoom: {
      enabled: true, 
  
      duration: 300, // duration of the effect, in milliseconds
      easing: 'ease-in-out', // CSS transition easing function
  
      opener: function(openerElement) {
  
        return openerElement.is('img') ? openerElement : openerElement.find('img');
    }
  }
  
  });
  
  });