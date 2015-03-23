$(document).ready(function(){
    $("#hot_cat").click(function(){
        if($("#hot_cat span").hasClass("glyphicon-chevron-down")){
           $("#hot_cat span").removeClass("glyphicon-chevron-down");
           $("#hot_cat span").addClass("glyphicon-chevron-up"); 
        }else{
           $("#hot_cat span").removeClass("glyphicon-chevron-up");
           $("#hot_cat span").addClass("glyphicon-chevron-down"); 
        }
        $('#categories .row').slideToggle();
        
        return false;
    });
    $('.load_tooltip').tooltip();
    $('.btn').tooltip();
    
    function showTopApply(){
        var sTop = $(document).scrollTop();
        if (sTop>=400) {
             $("#topApply").show();
        }
        else {
             $("#topApply").hide();
        }
    }

    $(window).scroll(function(){
          showTopApply();
    });
    
    $("#owl-demo").owlCarousel({
          autoplay: true,
          autoplayTimeout:2000,
          autoplaySpeed:400,
          loop:true,
          items : 2,
          slideBy:2,
          itemsDesktop:[1199,2],
          itemsDesktopSmall:	[979,2],
          itemsMobile	: [767,4],

          responsiveClass:true,
          responsive: {
               // breakpoint from 0 up
              0 : { items : 4, slideBy:4},

              // breakpoint from 768 up
              768 : { items : 2, slideBy:2}
          },
          pagination:false,
          nav:false
      });
    
});
