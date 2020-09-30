

$(function(){
    'use strict';
    //adjust slider height
   var winH=$(window).height(),
      // upperH =$('.upper-bar').innerHeight(),
       navH =$('.navbar').innerHeight();
       window.scrollTo({ top: 0, behavior: 'smooth' });
   $('.cover, .carousel-item').height(winH - navH);
   
   $('#myModal').on('shown.bs.modal', function () {
       $('#myInput').trigger('focus')
     })
    });   
$('html, body').animate({
    scrollTop: $("#elementID").offset().top
}, 2000);
$(function smoothscroll(){
    var currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
    if (currentScroll > 0) {
         window.requestAnimationFrame(smoothscroll);
         window.scrollTo (0,currentScroll - (currentScroll/5));
    

    }
})();


   
