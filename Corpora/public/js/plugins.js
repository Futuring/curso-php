var $ = jQuery.noConflict();

/* -----------------------------------------
    CAROUSEL SLIDER FOR HOME BLOG POST
----------------------------------------- */

$(".h-posts").owlCarousel({
    items: 4,
    // Responsive Settings
    itemsDesktop: [1170, 4],
    itemsDesktopSmall: [1024, 3],
    itemsTablet: [640, 2],
    itemsTabletSmall: false,
    itemsMobile: [560, 1],
    // End Responsive Settings
    slideSpeed: 400
});


/* -----------------------------------------
    CAROUSEL SLIDER FOR HOME ALBUMS
----------------------------------------- */

$(".b-gal").owlCarousel({
    items: 4,
    // Responsive Settings
    itemsDesktop: [1170, 4],
    itemsDesktopSmall: [1024, 3],
    itemsTablet: [640, 2],
    itemsTabletSmall: false,
    itemsMobile: [560, 1],
    // End Responsive Settings
    slideSpeed: 400
});

/* -----------------------------------------
    CAROUSEL SLIDER FOR PRICING TABLES
----------------------------------------- */

$(".pricing-table").owlCarousel({
    items: 4,
    // Responsive Settings
    itemsDesktop: [1170, 4],
    itemsDesktopSmall: [1024, 3],
    itemsTablet: [640, 2],
    itemsTabletSmall: false,
    itemsMobile: [560, 1],
    // End Responsive Settings
    slideSpeed: 400
});

/* -----------------------------------------
    CAROUSEL SLIDER FOR RELATED PROJECTS
----------------------------------------- */

$("#portfolio_related").owlCarousel({
    items: 4,
    // Responsive Settings
    itemsDesktop: [1170, 4],
    itemsDesktopSmall: [1024, 3],
    itemsTablet: [640, 2],
    itemsTabletSmall: false,
    itemsMobile: [560, 1],
    // End Responsive Settings
    slideSpeed: 400
});


// ******************************** document load for galleries ********************************

$(document).ready(function(){
	$(window).load(function() {

    "use strict";

    var $container_2c = null;
    var $container_4c = null;
    var $container_masonry = null;
    var $container_blog_2 = null;
    var $container_blog = null;
    var $container_blog_masonry = null;
	
	

/* -----------------------------------------
    PORTFOLIO 2c ITEMS
----------------------------------------- */


    $container_2c = $('#portfolio_2c');

    $container_2c.isotope({
        masonry: { columnWidth: 400, isFitWidth: true, gutter: 20 },
        itemSelector : '.item' ,
    });

    $("#load_more_2_columns").click(function(){
        $.ajax({
            url: '2-columns-get.html',
            type: 'GET',
            data: {},
            success: function (msg) {
                var $newEls = $(msg);
                $container_2c.isotope('insert', $newEls);
            },
            error: function (xhr, msg, e) {alert(msg);}
        });
    });


		      
    var $optionSets_2c = $('.option-set'),
    $optionLinks_2c = $optionSets_2c.find('a');

    $optionLinks_2c.click(function(){

        var $this = $(this);

        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
            return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
		  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
        key = $optionSet.attr('data-option-key'),
        value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
            // changes in layout modes need extra logic
            changeLayoutMode( $this, options )
        } else {
            // otherwise, apply new options
            $container_2c.isotope( options );
        }
		        
        return false;

    });

/* -----------------------------------------
    PORTFOLIO 4c ITEMS
----------------------------------------- */

    $container_4c = $('#portfolio_4c');

    $container_4c.isotope({
        masonry: { columnWidth: 262, isFitWidth: true, gutter: 20 },
        itemSelector : '.item' 
    });

    $("#load_more_4_columns").click(function(){
        $.ajax({
            url: '4-columns-get.html',
            type: 'GET',
            data: {},
            success: function (msg) {
                var $newEls = $(msg);
                $container_4c.isotope('insert', $newEls);
            },
            error: function (xhr, msg, e) {alert(msg);}
        });
    });

    $("#load_more_4g_columns").click(function(){
        $.ajax({
            url: 'g-columns-get.html',
            type: 'GET',
            data: {},
            success: function (msg) {
                var $newEls = $(msg);
                $container_4c.isotope('insert', $newEls);
            },
            error: function (xhr, msg, e) {alert(msg);}
        });
    });


		      
    var $optionSets_4c = $('.option-set-2'),
    $optionLinks_4c = $optionSets_4c.find('a');

    $optionLinks_4c.click(function(){

        var $this = $(this);

        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
            return false;
        }
        var $optionSet_4c = $this.parents('.option-set-2');
        $optionSet_4c.find('.selected').removeClass('selected');
        $this.addClass('selected');
		  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options_4c = {},
        key = $optionSet_4c.attr('data-option-key'),
        value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options_4c[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
            // changes in layout modes need extra logic
            changeLayoutMode( $this, options_4c )
        } else {
            // otherwise, apply new options
            $container_4c.isotope( options_4c );
        }
		        
        return false;

    });


/* -----------------------------------------
    PORTFOLIO ITEMS MASONRY
----------------------------------------- */

    $container_masonry = $('#masonry');

    $container_masonry.isotope({
        masonry: { columnWidth: 300, isFitWidth: true },
        itemSelector : '.item'
    });

    $("#load_more_masonry").click(function(){
        $.ajax({
            url: 'masonry-get.html',
            type: 'GET',
            data: {},
            success: function (msg) {
                var $newEls = $(msg);
                $container_masonry.isotope('insert', $newEls);
            },
            error: function (xhr, msg, e) {alert(msg);}
        });
    });


    var $optionSets_masonry = $('.option-set-3'),
    $optionLinks_masonry = $optionSets_masonry.find('a');

    $optionLinks_masonry.click(function(){
        var $this = $(this);

        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
            return false;
        }
        var $optionSet_masonry = $this.parents('.option-set-3');
        $optionSet_masonry.find('.selected').removeClass('selected');
        $this.addClass('selected');
		  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options_masonry = {},
        key = $optionSet_masonry.attr('data-option-key'),
        value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options_masonry[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
            // changes in layout modes need extra logic
            changeLayoutMode( $this, options_masonry )
            } else {
        // otherwise, apply new options
        $container_masonry.isotope( options_masonry );
        }
		        
        return false;
    });

/* -----------------------------------------
    BLOG STANDARD ITEMS
----------------------------------------- */

    $container_blog = $('#blog_standard');

    $container_blog.isotope({
        //masonry: { },
        itemSelector : '.post' ,
    });

    $("#load_more_blog_standard").click(function(){
        $.ajax({
            url: 'blog-standard-get.html',
            type: 'GET',
            data: {},
            success: function (msg) {
                var $newEls = $(msg);
                $container_blog.isotope('insert', $newEls);
            },
            error: function (xhr, msg, e) {alert(msg);}
        });
    });
    
		      
        var $optionSets_blog = $('.option-set-blog'),
            $optionLinks_blog = $optionSets_blog.find('a');

        $optionLinks_blog.click(function(){
            var $this = $(this);

		        // don't proceed if already selected
		        if ( $this.hasClass('selected') ) {
		          return false;
		        }
		        var $optionSet_blog = $this.parents('.option-set-blog');
		        $optionSet_blog.find('.selected').removeClass('selected');
		        $this.addClass('selected');
		  
		        // make option object dynamically, i.e. { filter: '.my-filter-class' }
		        var options_blog = {},
		            key = $optionSet_blog.attr('data-option-key'),
		            value = $this.attr('data-option-value');
		        // parse 'false' as false boolean
		        value = value === 'false' ? false : value;
		        options_blog[ key ] = value;
		        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
		          // changes in layout modes need extra logic
		          changeLayoutMode( $this, options_blog )
		        } else {
		          // otherwise, apply new options
		          $container_blog.isotope( options_blog );
		        }
		        
		        return false;
		    });




/* -----------------------------------------
    BLOG STANDARD_2 ITEMS
----------------------------------------- */

    $container_blog_2 = $('#blog_standard_2');

    $container_blog_2.isotope({
        masonry: { columnWidth: 260, isFitWidth: true, gutter: 20 },
        itemSelector : '.item' ,
    });

    $("#load_more_blog_standard_2").click(function(){
        $.ajax({
            url: 'blog-standard-2-get.html',
            type: 'GET',
            data: {},
            success: function (msg) {
                var $newEls = $(msg);
                $container_blog_2.isotope('insert', $newEls);
            },
            error: function (xhr, msg, e) {alert(msg);}
        });
    });
    
		      
        var $optionSets_blog_2 = $('.option-set-blog-2'),
            $optionLinks_blog_2 = $optionSets_blog_2.find('a');

        $optionLinks_blog_2.click(function(){
            var $this = $(this);

		        // don't proceed if already selected
		        if ( $this.hasClass('selected') ) {
		          return false;
		        }
		        var $optionSet_blog_2 = $this.parents('.option-set-blog-2');
		        $optionSet_blog_2.find('.selected').removeClass('selected');
		        $this.addClass('selected');
		  
		        // make option object dynamically, i.e. { filter: '.my-filter-class' }
		        var options_blog_2 = {},
		            key = $optionSet_blog_2.attr('data-option-key'),
		            value = $this.attr('data-option-value');
		        // parse 'false' as false boolean
		        value = value === 'false' ? false : value;
		        options_blog_2[ key ] = value;
		        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
		          // changes in layout modes need extra logic
		          changeLayoutMode( $this, options_blog_2 )
		        } else {
		          // otherwise, apply new options
		          $container_blog_2.isotope( options_blog_2 );
		        }
		        
		        return false;
		    });


/* -----------------------------------------
    BLOG MASONRY ITEMS
----------------------------------------- */

		$container_blog_masonry = $('#blog_masonry');

        $container_blog_masonry.isotope({
            masonry: { columnWidth: 255, gutter: 20 },
            itemSelector : '.item-m' ,
        });

        $("#load_more_blog_masonry").click(function(){
            $.ajax({
                url: 'blog-masonry-get.html',
                type: 'GET',
                data: {},
                success: function (msg) {
                    var $newEls = $(msg);
                    $container_blog_masonry.isotope('insert', $newEls);
                },
                error: function (xhr, msg, e) {alert(msg);}
            });
        });
        
		      
		    var $optionSets_blog_masonry = $('.option-set-blog-m'),
		          $optionLinks_blog_masonry = $optionSets_blog_masonry.find('a');

		    $optionLinks_blog_masonry.click(function(){
		        var $this = $(this);

		        // don't proceed if already selected
		        if ( $this.hasClass('selected') ) {
		          return false;
		        }
		        var $optionSet_blog_masonry = $this.parents('.option-set-blog-m');
		        $optionSet_blog_masonry.find('.selected').removeClass('selected');
		        $this.addClass('selected');
		  
		        // make option object dynamically, i.e. { filter: '.my-filter-class' }
		        var options_blog_masonry = {},
		            key = $optionSet_blog_masonry.attr('data-option-key'),
		            value = $this.attr('data-option-value');
		        // parse 'false' as false boolean
		        value = value === 'false' ? false : value;
		        options_blog_masonry[ key ] = value;
		        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
		          // changes in layout modes need extra logic
		          changeLayoutMode( $this, options_blog_masonry )
		        } else {
		          // otherwise, apply new options
		          $container_blog_masonry.isotope( options_blog_masonry );
		        }
		        
		        return false;
		    });



    });
});


// ****************************************************************************************

/* -----------------------------------------
    PRETTY PHOTO
----------------------------------------- */

	jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({
    	theme: "light_square",
    	default_width: 700,
		default_height: 400,
	});


/* -----------------------------------------
    ANIMATED ITEMS
----------------------------------------- */

$('.animated').appear(function () {
    var elem = $(this);
    var animation = elem.data('animation');
    if (!elem.hasClass('visible')) {
        var animationDelay = elem.data('animation-delay');
        if (animationDelay) {
            setTimeout(function () {
                elem.addClass(animation + " visible");
            }, animationDelay);
        } else {
            elem.addClass(animation + " visible");
        }
    }
});


/* -----------------------------------------
    PAGE LOADER
----------------------------------------- */


	$(window).load(function(){
		$('#loader-wrapper').fadeOut('slow',function(){$(this).remove();});
	});


/* -----------------------------------------
    TWITTER CONFIGURATION
----------------------------------------- */
$(document).ready(function() {

    "use strict";

    function dateFormatter(date) {
        return date.toTimeString();
    }

    twitterFetcher.fetch('521192861014835200', 'twitter', 2, false, false, true, 'default', false);

});


/* -----------------------------------------
    SMOOTH SCROLL
----------------------------------------- */
smoothScroll.init({
    speed: 500, // Integer. How fast to complete the scroll in milliseconds
    easing: 'easeInOutCubic', // Easing pattern to use
    updateURL: false, // Boolean. Whether or not to update the URL with the anchor hash on scroll
    offset: 0, // Integer. How far to offset the scrolling anchor location in pixels
    callbackBefore: function ( toggle, anchor ) {}, // Function to run before scrolling
    callbackAfter: function ( toggle, anchor ) {} // Function to run after scrolling
});	



/* -----------------------------------------
    COUNDOWN
----------------------------------------- */
if($.find('#counter')[0]) {
			$('#counter').countdown('2014/12/06 12:00:00').on('update.countdown', function(event) {
				var $this = $(this).html(event.strftime(''
					+ '<div class="counter-container"><div class="counter-box first"><div class="number">%-D</div><span>Day%!d<span></div>'
					+ '<div class="counter-box"><div class="number">%H</div><span>Hours</span></div>'
					+ '<div class="counter-box"><div class="number">%M</div><span>Minutes</span></div>'
					+ '<div class="counter-box last"><div class="number">%S</div><span>Seconds</span></div></div>'
				));
			});
		};		
		
		
// ----------------------------- GOOGLE MAP

// ------------------------------------------------------------------


			// Map Coordination
			var latlng = new google.maps.LatLng(51.498609000000000000,-0.133906000000024500);

			// Map Options
			var myOptions = {
				zoom: 15,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				disableDefaultUI: true,
				scrollwheel: false,
				// Google Map Color Styles
				styles: [{featureType:"landscape",stylers:[{saturation:-100},{lightness:65},{visibility:"on"}]},{featureType:"poi",stylers:[{saturation:-100},{lightness:51},{visibility:"simplified"}]},{featureType:"road.highway",stylers:[{saturation:-100},
				{visibility:"simplified"}]},{featureType:"road.arterial",stylers:[{saturation:-100},{lightness:30},{visibility:"on"}]},{featureType:"road.local",stylers:[{saturation:-100},{lightness:40},{visibility:"on"}]},{featureType:"transit",stylers:[{saturation:-100},
				{visibility:"simplified"}]},{featureType:"administrative.province",stylers:[{visibility:"off"}]/**/},{featureType:"administrative.locality",stylers:[{visibility:"off"}]},{featureType:"administrative.neighborhood",stylers:[{visibility:"on"}
				]/**/},{featureType:"water",elementType:"labels",stylers:[{visibility:"on"},{lightness:-25},{saturation:-100}]},{featureType:"water",elementType:"geometry",stylers:[{hue:"#ffff00"},{lightness:-25},{saturation:-97}]}]
			};

            var map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);

			// Marker Image
			var image = 'images/pin.png';
			

		  	// -------------------------- First Marker

		  	// Marker Coordination
			var myLatlng = new google.maps.LatLng(51.498609000000000000,-0.133906000000024500);

			// Your Texts 
			 var contentString = '<div id="content">'+
			  '<div id="siteNotice">'+
			  '</div>'+
			  '<h4>' +

			  'Office 1'+

			  '</h4>'+
			  '<p>' +

			  'Your description is here.' +

			  '</p>'+
			  '</div>';
			

			var marker = new google.maps.Marker({
				  position: myLatlng,
				  map: map,
				  title: 'Hello World!',
				  icon: image
			  });


			var infowindow = new google.maps.InfoWindow({
			  content: contentString
			  });

			  
			 google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			  });

            // --------------------------
