jQuery(document).ready(function ($) {
	'use strict';

	function equalHeight() {
		$('.page-content.column-img-bkg *[class*="custom-col-padding"]').each(function () {
			var maxHeight = $(this).outerHeight();
			$('.page-content.column-img-bkg *[class*="img-bkg"]').height(maxHeight);
		});
	};

	$(document).ready(equalHeight);
	$(window).resize(equalHeight);

	// MASTER SLIDER START
	var slider = new MasterSlider();
	slider.setup('masterslider', {
		width: 1140, // slider standard width
		height: 854, // slider standard height
		space: 0,
		speed: 50,
		layout: "fullwidth",
		centerControls: false,
		loop: true,
		autoplay: true,
		/*
		filters: {
			grayscale: 1,
			opacity: 0.5,
			brightness: 2
		} */
		// more slider options goes here...
		// check slider options section in documentation for more options.
	});
	// adds Arrows navigation control to the slider.
	slider.control('arrows');

	// slider paragraph attribute set
	$(".ms-slide").find('p').attr({
		'class': 'ms-layer pi-text',
		'data-type': 'text',
		'data-effect': 'top(short)',
		'data-duration': '300',
		'data-hide-effect': 'fade',
		'data-delay': '600'
	}).css({
		'left': '0',
		'right': '0'
	});


	// CLIENTS CAROUSEL START
	$('#sector-carousel').owlCarousel({
		items: 2,
		loop: true,
		margin: 30,
		responsiveClass: true,
		mouseDrag: true,
		dots: false,
		responsive: {
			0: {
				items: 2,
				nav: true,
				loop: true,
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: true,
				responsiveClass: true
			},
			600: {
				items: 2,
				nav: true,
				loop: true,
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: true,
				responsiveClass: true
			},
			1000: {
				items: 4,
				nav: true,
				loop: true,
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: true,
				responsiveClass: true,
				mouseDrag: true
			}
		}
	});

	// CLIENTS CAROUSEL START
	$('#client-carousel').owlCarousel({
		items: 6,
		loop: true,
		margin: 30,
		responsiveClass: true,
		mouseDrag: true,
		dots: false,
		responsive: {
			0: {
				items: 2,
				nav: true,
				loop: true,
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: true,
				responsiveClass: true
			},
			600: {
				items: 3,
				nav: true,
				loop: true,
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: true,
				responsiveClass: true
			},
			1000: {
				items: 6,
				nav: true,
				loop: true,
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: true,
				responsiveClass: true,
				mouseDrag: true
			}
		}
	});

	// TESTIMONIAL CAROUSELS START
	$('#testimonial-carousel').owlCarousel({
		items: 1,
		loop: true,
		margin: 30,
		responsiveClass: true,
		mouseDrag: true,
		dots: false,
		autoheight: true,
		responsive: {
			0: {
				items: 1,
				nav: true,
				loop: true,
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: true,
				responsiveClass: true,
				autoHeight: true
			},
			600: {
				items: 1,
				nav: true,
				loop: true,
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: true,
				responsiveClass: true,
				autoHeight: true
			},
			1000: {
				items: 1,
				nav: true,
				loop: true,
				autoplay: true,
				autoplayTimeout: 3000,
				autoplayHoverPause: true,
				responsiveClass: true,
				mouseDrag: true,
				autoHeight: true
			}
		}
	});


	/**============ collapse menu customization */

	var addActiveClass = false;
	$("#mainMenu li.dropdown > a, #mainMenu li.dropdown-submenu > a").on("click", function (e) {

		if ($(window).width() > 979) return;

		e.preventDefault();

		addActiveClass = $(this).parent().hasClass("resp-active");

		$("#mainMenu").find(".resp-active").removeClass("resp-active");

		if (!addActiveClass) {
			$(this).parents("li").addClass("resp-active");
		}

		return;

	});

	// Submenu Check Visible Space
	$("#mainMenu li.dropdown-submenu").hover(function () {

		if ($(window).width() < 767) return;

		var subMenu = $(this).find("ul.dropdown-menu");

		if (!subMenu.get(0)) return;

		var screenWidth = $(window).width(),
			subMenuOffset = subMenu.offset(),
			subMenuWidth = subMenu.width(),
			subMenuParentWidth = subMenu.parents("ul.dropdown-menu").width(),
			subMenuPosRight = subMenu.offset().left + subMenu.width();

		if (subMenuPosRight > screenWidth) {
			subMenu.css("margin-left", "-" + (subMenuParentWidth + subMenuWidth + 10) + "px");
		} else {
			subMenu.css("margin-left", 0);
		}

	});

	// Mega Menu
	$(document).on("click", ".mega-menu .dropdown-menu", function (e) {
		e.stopPropagation()
	});

	/** dynamic search bar  */
	var searchEl = $("#headerSearch .search-input"),
		searchSubmit = searchEl.find("button");

	$(document).on("click", function (e) {
		if ($(e.target).closest("#headerSearch").length === 0) {
			searchEl.removeClass("active");
			setTimeout(function () {
				searchEl.hide();
			}, 250);
		}
	});

	$("#headerSearchOpen").on("click", function (e) {
		e.preventDefault();

		searchEl.show();

		setTimeout(function () {
			searchEl.addClass("active");
		}, 50);

		setTimeout(function () {
			searchEl.find("input").focus();
		}, 250);
	});

	searchSubmit.on("click", function (e) {
		$("#headerSearchForm").submit();
	});


});

