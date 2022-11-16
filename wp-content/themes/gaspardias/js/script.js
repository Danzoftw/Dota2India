jQuery(document).ready(function($){
	AOS.init();

	$("#country, #state , #city").change(function(){
		var country = $("#country").val();
		var state = $("#state").val();
		var city = $("#city").val();
		if(country && state && city ){
      $( ".affiliation" ).each(function() {
 				if( $( this ).attr('city') == city && $( this ).attr('state') == state && $( this ).attr('country') == country  ){
 			 		$( this ).removeClass( "d-none" );
 				}else{
		 			if( !($( this ).hasClass( "d-none" ))){
 						$( this ).addClass( "d-none" );
 					}
 				}
			});
		}
  });

 	$("#country").change(function(){
		var country = $("#country").val();
		 $( ".single-state" ).each(function() {
		 	if( $( this ).attr('parent') == country){
		 		$( this ).removeClass( "d-none" );
		 	}else{
 				if( !($( this ).hasClass( "d-none" ))){
 					$( this ).addClass( "d-none" );
 				}
 			}
		 });
  });

  $("#state").change(function(){
		var state = $("#state").val();
		$( ".single-city" ).each(function() {
		 	if( $( this ).attr('parent') == state){
		 		$( this ).removeClass( "d-none" );
		 	}else{
 				if( !($( this ).hasClass( "d-none" ))){
 					$( this ).addClass( "d-none" );
 				}
 			}
		});
  });

	//members page member type selection
	$( window ).on( "load", function() {
		$('.img-shellfield_oau23-0').addClass('selected');
		$('.img-shellfield_oau23-0').parent().addClass('background');
		var test = $('.frm_opt_container .frm_radio .background').text();
		var ret = test.split(" ");
		var str1 = ret[1];

		var originalData = $('#field_ocfup12').val();
		$("#field_ocfup12").val(function() {
		    return this.value = str1+' '+originalData;
		});
    });

	$('.frm_radio').click(function(){
		$('.frm_radio').removeClass('active');
		$('.frm_radio').find('.img-shell').removeClass('selected');
		$('.frm_radio').find('.img-shell').parent().removeClass('background');

		$(this).addClass('active');
		$(this).find('.img-shell').addClass('selected');
		$(this).find('.img-shell').parent().addClass('background');

		var test = $('.frm_opt_container .frm_radio .background').text();
		var ret = test.split(" ");
		var str1 = ret[1];

		var test1 = $( "#field_ocfup12").val();
		var ret1 = test1.split(" ");
		var str2 = ret1[1];

		$("#field_ocfup12").val(function() {
		    return this.value = str1+' '+str2;
		});
	});


	if($(".offset-calc").length == 0) {

	}else {
		var offset = $(".offset-calc").offset();
		$('.slide-count-wrap').css("left", offset.left+20);
		$(window).resize(function(){
			var offset = $(".offset-calc").offset();
			$('.slide-count-wrap').css("left", offset.left+25);
		});
	}

	$('.wrapper-menu').click(function(){
		$(this).toggleClass('open');
	});

	var $banner = jQuery('.slider-holder');
	var slideCount = null;
	$banner.on("init", function(event, slick, currentSlide, nextSlide) {
		var slideCount = slick.slideCount;
		jQuery(".slide-count-wrap").find(".total").text(slideCount);
		jQuery(".slide-count-wrap").find(".current").text('1');
	});
	$banner.slick({
		speed: 250,
		autoplay: false,
		fade: true,
		cssEase: 'linear',
		swipe: true,
		swipeToSlide: true,
		touchThreshold: 10,
		infinite: true,
		arrows: false,
	  slidesToShow: 1,
	  slidesToScroll: 1,
	});
	$banner.on("beforeChange", function(event, slick, currentSlide, nextSlide) {
		setCurrentSlideNumber(nextSlide);
	});

	//Services slider
	jQuery('.services-slider').slick({
		infinite: true,
		arrows: false,
		dots: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
		{
			breakpoint: 992,
			settings: {
				arrows: false,
				slidesToShow: 2
			}
		},
		{
			breakpoint: 768,
			settings: {
				arrows: false,
				slidesToShow: 1
			}
		}]
  });

	jQuery('.gallery_slider_for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.gallery_slider_nav'
	});

	jQuery('.gallery_slider_nav').slick({
	  slidesToShow: 4,
	  slidesToScroll: 1,
	  asNavFor: '.gallery_slider_for',
	  dots: false,
		arrows: false,
	  centerMode: false,
	  focusOnSelect: true
	});

	//events banner slider
	jQuery('.upcoming_events_slider').slick({
		infinite: true,
		arrows: false,
		dots: false,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 4000
  });

	jQuery('.show-button a').click(function() {
    jQuery('.commitee_images .hidden_section').slideToggle();
    if (jQuery(this).text() == "LOAD MORE") {
      jQuery(this).text("SHOW LESS");
    } else {
      jQuery(this).text("LOAD MORE");
    }
  });

	jQuery(function () {
		jQuery(window).scroll(function () {
			var winTop = jQuery(window).scrollTop();
			if (winTop >= 30) {
				jQuery("header").addClass("sticky-header");
			} else {
				jQuery("header").removeClass("sticky-header");
			}//if-else
		});//win func.
	});//ready func.

	//gallery slider
	jQuery('.gallery-slider').slick({
			infinite: false,
			dots: true,
    	slidesPerRow: 3,
    	rows: 2,
			responsive: [
				{
					breakpoint: 576,
					settings: {
						slidesPerRow: 1,
        		rows: 1,
						autoplay: true,
				    autoplaySpeed: 4000,
						arrows: false
					}
				}
			]
	});

	//magnific popup

	$('.gallery-container .custom-width').magnificPopup({
		delegate: 'a', // child items selector, by clicking on it popup will open
		type: 'image',
		gallery:{enabled:true}
		// other options
	});

});

function setCurrentSlideNumber(currentSlide) {
  var $el = jQuery(".slide-count-wrap").find(".current");
  $el.text(currentSlide + 1);
}
