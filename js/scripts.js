$(document).ready(function() {
    // left: 37, up: 38, right: 39, down: 40,
    // spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
    var keys = {37: 1, 38: 1, 39: 1, 40: 1};

    function preventDefault(e) {
      e = e || window.event;
      if (e.preventDefault)
          e.preventDefault();
      e.returnValue = false;  
    }

    function preventDefaultForScrollKeys(e) {
        if (keys[e.keyCode]) {
            preventDefault(e);
            return false;
        }
    }

    var scrollenabled = true;
    function disableScroll() {
        console.log('Scroll desativado');

      if (window.addEventListener) // older FF
          window.addEventListener('DOMMouseScroll', preventDefault, false);
      window.onwheel = preventDefault; // modern standard
      window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
      window.ontouchmove  = preventDefault; // mobile
      document.onkeydown  = preventDefaultForScrollKeys;
    }

    function enableScroll() {
        console.log('Scroll ativado');
        
        if (window.removeEventListener)
            window.removeEventListener('DOMMouseScroll', preventDefault, false);
        window.onmousewheel = document.onmousewheel = null; 
        window.onwheel = null; 
        window.ontouchmove = null;  
        document.onkeydown = null;  
    }
    
    $('#warehouse').smoothZoom({
        width: document.body.innerWidth,
        height: 620,
        zoom_BUTTONS_SHOW: 'NO',
        pan_BUTTONS_SHOW: 'NO',
        pan_LIMIT_BOUNDARY: 'NO',
        container: 'zoom_container',
        mouse_WHEEL: false,
        mouse_DOUBLE_CLICK: false,
        zoom_MAX: 100,
        mouse_WHEEL_CURSOR_POS: true,
        on_ZOOM_PAN_COMPLETE: function(data) {            
            //enableScroll(); 
        },
        on_ZOOM_PAN_UPDATE: function(data) {                        
            //disableScroll();            
        },
    });

    $('body').mousewheel(function(event, delta, deltaX, deltaY) {

        var zoomData = $('#warehouse').smoothZoom('getZoomData');
        
        if (delta < 0) {             
            $('#warehouse').smoothZoom('Reset');
        }
        
    });


    $('#slider-warehouse').carousel({
        interval: false
    });

    $("#slider-navigation li").on('mouseover', 'a', function(event) {
        event.preventDefault();
    });
    // Cycles the carousel to a particular frame 
    $("#slider-navigation li").hover(function() {

        var xpos = $(this).data('position-x');
        var ypos = $(this).data('position-y');
        var zpos = $(this).data('zoom');

        // SmoothZoom 
        // $('#warehouse').smoothZoom('focusTo', {
        //     x: xpos,
        //     y: ypos,
        //     zoom: 25,
        //     speed: 2
        // });
        // setTimeout(function() {
        //     $('#warehouse').smoothZoom('focusTo', {
        //         x: xpos,
        //         y: ypos,
        //         zoom: zpos,
        //         speed: 2
        //     });
        // }, 700);

        // $('#warehouse').smoothZoom('focusTo', {
        //     x: xpos,
        //     y: ypos,
        //     zoom: zpos,
        //     speed: 2
        // });

        $('#warehouse').smoothZoom('focusTo', {
            x: xpos,
            y: ypos,
            zoom: zpos - 15,
            speed: 3
        });
        setTimeout(function() {
            $('#warehouse').smoothZoom('focusTo', {
                x: xpos,
                y: ypos,
                zoom: zpos,
                speed: 3
            });
        }, 700);

        /* SHOW THE RELATED INFOBOX */

        /* Act on the event */
        $("#slider-navigation li.active").removeClass('active');
        $(this).parent('li').addClass('active');

        var slide = $(this).parent('li').attr('data-slide-to');
        $("#slider-warehouse").carousel(Number(slide));

    }, function() {
        /* Stuff to do when the mouse leaves the element */
        /* HIDE THE INFOBOXES */
    });


    /**
     *  GALERIA DE IMAGENS
     */
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        slideBy:1,
        dots: false,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:3,
                nav:true
            },
            1000:{
                items:4,
                nav:true,
                loop:true
            }
        },    
        navText: [
          "<i class='ion-android-arrow-dropleft-circle'></i>",
          "<i class='ion-android-arrow-dropright-circle'></i>"
          ],
    });

    
    /**
     *  FOOTER HEIGHT
     */
    $( window ).on('resize load', function() {
        var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
        if( w > 480 ){
            $('body').css('margin-bottom', $('.footer').height());                        
        }else {
            $('body').css('marginBottom', 0);
        }
    });



});