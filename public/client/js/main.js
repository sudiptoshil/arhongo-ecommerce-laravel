$(document).ready(function(){
	 //$(function(){
        //$('.dropdown').hover(function() {
             //$(this).addClass('open');
        //},
        ///function() {
             //$(this).removeClass('open');
        //});
    //});

    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).addClass('open');     
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
           $(this).removeClass('open');       
        }
    );

	$('.carousel').carousel(); 


	//function toggleIcon(e) {
        //$(e.target)
            //.prev('.panel-heading')
            //.find(".more-less")
            //.toggleClass('glyphicon-plus glyphicon-minus');
        //}
        //$('.panel-group').on('hidden.bs.collapse', toggleIcon);
        //$('.panel-group').on('shown.bs.collapse', toggleIcon);

    /*****************************************
                ## Preloader
    *****************************************/
      var $window = $(window),
          $preloader = $('#preloader');
    
      $window.on( 'load', function(){
        
          $preloader.delay(500).fadeOut('slow',function(){
            $preloader.remove();
          });    

      }); // $(window).on end
    

});


