jQuery(document).ready(function(){
    jQuery('.menu-item-weglot-270-pl a').text('PL');
    jQuery('.menu-item-weglot-270-en a').text('ENG');
   
    setInterval(function () { }, 100);
   
    jQuery("input").prop('required',false);
    jQuery('.lb-tt lb-share-tt').remove();
    jQuery('.dropdown-toggle').on('click', function(){
        if(jQuery('.dropdown-menu').hasClass('show')){
        jQuery('.dropdown-menu').removeClass('show');
    }
        else{
            jQuery('.dropdown-menu').addClass('show');
        }
    })

   
    jQuery('.menu-item-weglot-270-en').on('click', function(){
        if(jQuery('.menu-item-weglot-270-pl').hasClass('active-lang')){
            jQuery('.menu-item-weglot-270-pl').removeClass('active-lang');
            jQuery('.menu-item-weglot-270-en').addClass('.active-lang');
        }
    })
    jQuery('.menu-item-weglot-270-pl').on('click', function(){
        if(jQuery('.menu-item-weglot-270-en').hasClass('active-lang')){
            jQuery('.menu-item-weglot-270-en').removeClass('active-lang');
            jQuery('.menu-item-weglot-270-pl').addClass('.active-lang');
        }

    })


 

    jQuery('.video-link').mouseover(function id0_play(e) {  
        jQuery('.id0', this).get(0).play(); 
    });
    
  jQuery('.video-link').mouseout(function id0_pause(e) {
        jQuery('.id0', this).get(0).pause(); 
    });

    jQuery(window).keydown(function(event) {
        if(event.ctrlKey && event.keyCode == 84) { 
          event.preventDefault(); 
          return false;
        }
        if(event.ctrlKey && event.keyCode == 83) { 
          event.preventDefault(); 
          return false;
        }
        if(event.ctrlKey && event.keyCode == 17  && event.keyCode == 16  && event.keyCode == 67) { 
            event.preventDefault(); 
            return false;
          
          }
          if(event.ctrlKey && event.keyCode == 16) { 
            event.preventDefault(); 
            return false;
           
          }
        
       
      });
      
  
    var x=0;
    var max=50;
    jQuery( ".active-films-single" ).each(function() {
        x++;
        if(x<max){
            var hours = parseInt(jQuery('#'+x+' p').text());
            hours+=2;
            if(hours==24){
                hours = 0;
                jQuery('#'+x+' p').text(hours);
            }else if(hours==25){
                hours = 1;
                jQuery('#'+x+' p').text(hours);
            }else{
                jQuery('#'+x+' p').text(hours);
            }
            
        }
        
      });
    
      jQuery(document).ready(function($) {
        $('img[title]').each(function() { $(this).removeAttr('title'); });
        $('video[title]').each(function() { $(this).removeAttr('title'); });
      });
 

})
