$(document).ready(function() {


    $("li:first-child").addClass("first");
    $("li:last-child").addClass("last");
    
    $('[href="#"]').attr("href", "javascript:;");
    $('.menu-Bar').click(function() {
        $(this).toggleClass('open');
        $('.menuWrap').toggleClass('open');
        $('body').toggleClass('ovr-hiddn');
        $('body').toggleClass('overflw');
    });

    $('.index-slider').slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
        {
            breakpoint: 825,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: false,
                arrows:false
            }
        },
        ]
    });

    $('.test').slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 825,
                settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: false,
                arrows:false
                }
            },
        ]
    });

   function myFunction() {
  var x = document.getElementById("myVideo").autoplay;
  document.getElementById("demo").innerHTML = x;
}

    // $('.faqAccordian>li.first').addClass('active');
    $('.faqAccordian>li').click(function(){
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
    });

    $('.fancybox-media').fancybox({
        openEffect: 'none',
        closeEffect: 'none',
        helpers: {
            media: {}
        }
    });

    $('.searchBtn').click(function() {
        $('.searchWrap').addClass('active');
        $('.overlay').fadeIn('active');
        $('.searchWrap input').focus();
        $('.searchWrap input').focusout(function(e) {
            $(this).parents().removeClass('active');
            $('.overlay').fadeOut('active');
            $('body').removeClass('ovr-hiddn');

        });
    });
    //$('#soundbtn').click();
    

});

 
 // function disableMute() 
 // { 
 //    vid.muted = false;
 // }  




$(window).on('load', function() {
    var currentUrl = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
    $('ul.menu li a').each(function() {
        var hrefVal = $(this).attr('href');
        if (hrefVal == currentUrl) {
            $(this).removeClass('active');
            $(this).closest('li').addClass('active')
            $('ul.menu li.first').removeClass('active');
             
        }
    });
    
});

    function handleScroll() {
       
      // Check if the scroll position is greater than a certain value
      if ($(window).scrollTop() > 10) {
        // Add the class 'scrolled' to the div
        $('#myDiv').addClass('scrolled');
      } else {
        // Remove the class if the scroll position is less than the specified value
        $('#myDiv').removeClass('scrolled');
      }
    }

    // Listen for the scroll event and call the handleScroll function
    $(window).scroll(handleScroll);
