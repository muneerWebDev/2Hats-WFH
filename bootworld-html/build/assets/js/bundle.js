;(function(window, document, $) {
	var $win = $(window);
	var $doc = $(document);
    var $header = $('.header')
    var $headerHeight = $header.outerHeight();
    var $headerBarHeight = $('.header .header__bar').outerHeight();
    var $headerContentHeight = $('.header .header__content').outerHeight();
    var isMobile = $win.outerWidth() < 768;
    var glossaryItemsHeight = 0;
    var lastActiveSlider;

	$win.on('load', function(){
        navMobileTitle();
        navMobileBtnBack();
        navMobileBtnClose();
        stickyAside();
        startMaps();
	}).on('load scroll',function(){
        fixedBtnOnMobile()
		animateOnScroll();
        stikyHeader();
    }).on('load resize',function(){
        $headerHeight = $header.outerHeight();
        $headerBarHeight = $('.header .header__bar').outerHeight();
        $headerContentHeight = $('.header .header__content').outerHeight();
        isMobile = $win.outerWidth() < 768;
        stickyHeaderSpace();
        listGlossaryHeight()
    })

    $('.dropdown').each(function(){
    	$(this).parent().addClass('hasDropdown');
    })

	var deleteLog = false;
    
    if (!isMobile) {
        var myFullpage = new fullpage('#fullpage', {
        scrollingSpeed: 1700,
        v2compatible: true,
        scrollOverflow: true,
        navigation: true,
        anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage','5thpage', 'footer'],
        menu: '#menu',
        
        onLeave: function(origin, destination, direction){
            deleteLog = true;
            fullPageFixHeader()
            }
        });
    }else {
        var myFullpage = new fullpage('#fullpage', {
        scrollingSpeed: 1700,
        v2compatible: true,
        autoScrolling:false,
        scrollOverflow: false,
        navigation: true,
        anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage','5thpage', 'footer'],
        menu: '#menu',
        
        onLeave: function(origin, destination, direction){
            deleteLog = true;
            fullPageFixHeader()
            }
        });
    }


    function animateOnScroll(){
    	$('.animate').each(function(){
        	$this = $(this);
    
        	if ( ( $this.offset().top + ( $this.outerHeight()*0.2 ) ) < $win.scrollTop() + $win.outerHeight() ) {
        		$this.addClass('animated')
        	}
        })
    }

    function fullPageFixHeader() {
        setTimeout(function(){
            if ( $('body:not(.fp-viewing-firstPage)').length ) {
               $header.css('top', -$headerBarHeight)
            }else {
                $header.css('top', 0)
            }
        }, 500);
    }

    function sliders() {
        $('.list-logos').slick({
            infinite: true,
            slidesToShow: 7,
            slidesToScroll: 1,
            arrows:false,
            responsive: [
            {
                breakpoint: 993,
                settings: {
                    arrows:false,
                    slidesToShow: 7,
                    slidesToScroll: 1,   
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    variableWidth: true,
                    autoSlidesToShow: true,
                    centerMode: true,
                    centerPadding: '0px 0 105px ',
                    autoplay: true,
                    autoplaySpeed: 2000,
                }
            }
            ]
        });

        $('.product-slider .popup-gallery').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows:false,
            dots:true
        });

        $('.slider-primary .slider__slides').slick({
            infinite: true,
            fade: true,
            speed: 0,
            adaptiveHeight: true,
            dots:false,
            nextArrow: '.btn-slider--next',
            prevArrow: '.btn-slider--prev'
        });


        $('.slider-primary .slider__slides').on('beforeChange', function(event, slick, currentSlide, nextSlide){
            var lastActiveSliderIndex =  currentSlide;
            lastActiveSlider = $(this).find($('[data-slick-index = ' +  lastActiveSliderIndex + "]"))
            lastActiveSlider.addClass("slider__last-active").siblings().removeClass('slider__last-active');
        });
    }


    function loadAjax(filePath) {
        return $.ajax({
            'async': false,
            'global': false,
            'url': filePath
        }).responseJSON;
    }

    // Function to initialize maps
    function startMaps() {
        $('[id^="map"]').each(function(){
            var $map = $(this);
            var iBox;
            var mapData = loadAjax($map.data('mapdata'));
            var markers = [];
            var markersLength = mapData.markers.length;
            var content;
            var markerCluster;
            var clusterIsEnabled = mapData.cluster;

            map = new google.maps.Map($map.get(0), mapData.mapOptions);

          
      
        	// console.log(mapData.markers[0].icon)

        	 marker = new google.maps.Marker({
                position: mapData.markers[0].position,
                map: map,
                icon: mapData.markers[0].icon
            });
        });
    }

    if (navigator.userAgent.indexOf('Mac OS X') != -1) {
        $("body").addClass("mac");
    } else {
        $("body").addClass("pc");
    }

    function popups(){
        function popupsAnimate(x) {
            if ( x != 'out') {
                var $this = $(x.container[0]).find('.popup');
                var hasAnimate = $this.hasClass('popup-modal--fadeleft');
                if ( hasAnimate ) {
                    setTimeout(function(){
                        $this.addClass('animated')
                        $(x.container[0]).parent().siblings('.mfp-bg').addClass('animated');
                    }, 300);
                }
            }else {
                $('.popup-modal--fadeleft').removeClass('animated')
                $('.mfp-bg').removeClass('animated');
            }
            
            
        }
        $(function () {
            $('.popup-modal').magnificPopup({
                type: 'inline',
                preloader: false,
                alignTop:true,
                focus: '#username',
                modal: false,
                fixedContentPos:true,
                closeOnBgClick:true,
                removalDelay: 300,

                callbacks: {
                    open: function() {
                        popupsAnimate(this);
                    },
                    beforeClose:function(){
                        popupsAnimate("out");
                    }

                },
            });
            $(document).on('click', '.popup-modal-dismiss', function (e) {
                e.preventDefault();
                $.magnificPopup.close();
            });
        });
    }


    $('.nav-trigger').on('click', function(event) {
        event.preventDefault();
        $(this).toggleClass('nav-trigger--active');
        $header.toggleClass('nav-expanded');
    
    });

    /*Add Arrows To dropdowns on mobile and Tablet*/

    addArrowToDropdown($('.nav ul>li>ul').parent())
    addArrowToDropdown($('.hasDropdown'))

    function addArrowToDropdown(x){
        x.append('<a href="#" class="btn-dropdown visible-xs-block visible-sm-block"></a>')
        x.addClass('hasDropdownArrow')
    }

    function cloneNavSec(){
        $('.nav-secondary').clone().appendTo('.nav__content-mobile');
    }

    function navMobileTitle(){
        var firstDropdown = $('.hasDropdownArrow > a:first-child')
        var otherDropdowns = $('.hasDropdownArrow > h6')

        firstDropdown.each(function(){
            var $this = $(this);
            $this.siblings('.dropdown').children().siblings('ul').addClass("js-appned")
            var prependPlace = $this.siblings('.dropdown').children().siblings('ul');
            $this.clone().prependTo(prependPlace).wrap( '<li class="js-title title-border"></li>' );

        })

        otherDropdowns.each(function(){
            var $this = $(this);
            $this.siblings('ul').addClass("js-appned")
            var prependPlace = $this.siblings('.js-appned')
            $(this).clone().prependTo(prependPlace).wrap( '<li class="js-title title-border"></li>' );

        })
    }

    $doc.on("click",".btn-dropdown ",function() {
        if ($(this).siblings('.dropdown').length) {
            $(this).siblings('.dropdown').children().closest("ul").addClass('expanded');
        }
        else {
            $(this).siblings('ul').addClass('expanded');
        }
    });

    // $doc.on("click",".mfp-bg ",function() {
        // console.log(1);
    // });

    $doc.on("click",".dropdown-back ",function() {
            $(this).closest('ul').removeClass('expanded');
    });

    $doc.on("click",".dropdown-close",function() {
        $('.nav-trigger').click();
    });

    $doc.on("click",".btn--fixNoMobile-cloned",function() {
        $('#section-card').click();
    });

    $('.list-colors li').on("click", function(){
        $(this).addClass('active').siblings().removeClass('active');
    })

    $('.accordion__head').on('click', function(){
        $(this).parent().toggleClass('expanded')
        $(this).siblings('.accordion__body').slideToggle();
    })

    $('.filter-size li').on("click", function (){
        $(this).toggleClass('active');
    })

    $('.btn-filter').on("click", function (){
        $('.section-product').toggleClass('expanded');
    })
    
    function navMobileBtnBack(){
        $('.js-appned').each(function(){
            var $this = $(this);

            $this.append('<a href="#" class="dropdown-back"></a>')
        });
    }

    function navMobileBtnClose(){
        $('.dropdown ul').append('<a href="#" class="dropdown-close"></a>')
        $('.hasDropdown').parent().append('<a href="#" class="dropdown-close"></a>')
    }

    function stickyHeaderSpace(){
        $('.js-header-space').css('padding-top', $headerHeight);
    }

    function stikyHeader (){
        if ($win.scrollTop() > 100) {
            $header.css('top', -$headerBarHeight)
        }else {
            $header.css('top', 0)
        }
    }

    function productSlider (){
        var appendSlider = $('.product-slider')
        $('.section-product-details .popup-gallery').clone().appendTo(appendSlider);
    }

    function fixedBtnOnMobile(){
        var btn = $('.btn--fixNoMobile:not(.btn--fixNoMobile-cloned)')

        if ( btn.length ) {
            var wrapper = $('.wrapper')
            var btnOffseTop = btn.offset().top;

            if (!wrapper.hasClass('hasCloneBtn')) {
                wrapper.addClass('hasCloneBtn')
                btn.clone().appendTo($('.wrapper')).addClass('btn--fixNoMobile-cloned');
            }

            if (true) {
                if ( btnOffseTop < ( $win.scrollTop() + $headerContentHeight) ) {
                    $('.wrapper').addClass('js-fixBtn');
                }else {
                    $('.wrapper').removeClass('js-fixBtn');
                }
            }
        }
    }

    function listGlossaryHeight(){
        glossaryItemsHeight = 0;
        var cols = 3;
        if (!isMobile) {
            $('.list-glossary li').each(function(){
                glossaryItemsHeight += $(this).outerHeight();
            })
            $('.list-glossary').css('height', glossaryItemsHeight/cols);
        }else{
            $('.list-glossary').css('height', 'auto');
        }
    }


   function stickyAside(){
     if (!isMobile) {
        (function() {
          var reset_scroll;

          $(function() {
            return $("[data-sticky_column]").stick_in_parent({
              parent: "[data-sticky_parent]"
          });
        });

          reset_scroll = function() {
            var scroller;
            scroller = $("body,html");
            scroller.stop(true);
            if ($(window).scrollTop() !== 0) {
              scroller.animate({
                scrollTop: 0
            }, "fast");
          }
          return scroller;
      };

      window.scroll_it = function() {
        var max;
        max = $(document).height() - $(window).height();
        return reset_scroll().animate({
          scrollTop: max
      }, max * 3).delay(100).animate({
          scrollTop: 0
      }, max * 3);
    };

    window.scroll_it_wobble = function() {
        var max, third;
        max = $(document).height() - $(window).height();
        third = Math.floor(max / 3);
        return reset_scroll().animate({
          scrollTop: third * 2
      }, max * 3).delay(100).animate({
          scrollTop: third
      }, max * 3).delay(100).animate({
          scrollTop: max
      }, max * 3).delay(100).animate({
          scrollTop: 0
      }, max * 3);
    };

    $(window).on("resize", (function(_this) {
        return function(e) {
          return $(document.body).trigger("sticky_kit:recalc");
      };
    })(this));

    }).call(this);
     }
   }

    

    $doc.ready(function() {
        productSlider ();
        sliders();
        cloneNavSec();
        popups();

        $('.popup-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-img-mobile',
            fixedContentPos:true,
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0,1] // Will preload 0 - before current, and 1 after the current image
            },
        });
    });
})(window, document, window.jQuery);