;(function ($) {
	$(document).ready(function () {
		/**
		 * Init Slick
		 */

		;(function () {
			var $postSlider = $('.post-slider'),
				i = 0

			$postSlider
				.slick({
					fade: true,
					speed: 1500,
					autoplay: true,
					autoplaySpeed: 7000,
					pauseOnFocus: false,
					pauseOnHover: false,
					prevArrow:
						'<div class="slider__arrow slider__arrow_position_left"></div>',
					nextArrow:
						'<div class="slider__arrow slider__arrow_position_right"></div>',
				})
				.each(function () {
					var $postSlider = $(this)

					$postSlider.slick('slickPause')

					setTimeout(function () {
						$postSlider.slick('slickPlay')
					}, 1000 * i++)
				})

			$postSlider.on(
				'beforeChange',
				function (event, slick, currentSlide, nextSlide) {
					var $postSlider = $(this),
						animationClass =
							nextSlide < currentSlide ? 'fadeInLeft' : 'fadeInRight'

					$postSlider
						.find('.post-slider__item')
						.find('.post-slider__item-left, .post-slider__item-right')
						.removeClass('fadeInLeft fadeInRight')
						.addClass(animationClass)
				}
			)
		})()

		// $('.partners').slick({
		// 	slidesToShow: 8,
		// 	autoplay: true,
		// 	autoplaySpeed: 3000,
		// 	pauseOnFocus: false,
		// 	pauseOnHover: false,
		// 	swipeToSlide: true,
		// 	prevArrow:
		// 		'<div class="slider__arrow slider__arrow_position_left"></div>',
		// 	nextArrow:
		// 		'<div class="slider__arrow slider__arrow_position_right"></div>',
		// 	responsive: [
		// 		{
		// 			breakpoint: 992,
		// 			settings: {
		// 				slidesToShow: 6,
		// 			},
		// 		},
		// 		{
		// 			breakpoint: 768,
		// 			settings: {
		// 				slidesToShow: 4,
		// 			},
		// 		},
		// 		{
		// 			breakpoint: 480,
		// 			settings: {
		// 				slidesToShow: 2,
		// 			},
		// 		},
		// 	],
		// })

		/**
		 * Init Colorbox
		 */

		// (function() {
		//     var selector = 'a[href$=".jpg"]';

		//     $(selector).colorbox({
		//         rel: selector,
		//         maxWidth: '90%',
		//         maxHeight: '90%'
		//     });
		// })();

		/**
		 * Navbar toggle
		 */

		$('.navbar-toggle').on('click', function () {
			$('.navbar').slideToggle()

			$(this).toggleClass('navbar-toggle_active')
		})

		/**
		 * Wrap content images
		 */

		$('.text-block img')
			.not('.alignleft, .alignright, .aligncenter')
			.wrap('<span class="rounded-block-with-shadow"></span>')
			.not(':not(.alignnone)')
			.parent('.rounded-block-with-shadow')
			.css({
				display: 'inline-block',
			})

		/**
		 * Wrap content iframes
		 */

		$('.text-block iframe')
			.addClass('embed-responsive-item')
			.wrap('<span class="embed-responsive embed-responsive-16by9"></span>')

		/**
		 * Bootstrap
		 */

		bootstrap()

		$(window).on('scroll', function () {
			bootstrap()
		})

		$(window).on('resize', function () {
			bootstrap()
		})
	})

	// $(window).load(function () {
	// 	/**
	// 	 * Init Masonry
	// 	 */

	// 	;(function () {
	// 		var containerSelector = '.gallery',
	// 			itemSelector = containerSelector + ' > *'

	// 		$(containerSelector).masonry({
	// 			columnWidth: itemSelector,
	// 			itemSelector: itemSelector,
	// 		})
	// 	})()
	// })

	/**
	 * Functions
	 */

	function bootstrap() {
		pressFooter()
		animation()
		fixNavbarWrap()
		fixCategoriesList()
	}

	function pressFooter() {
		var $footer = $('.footer')

		$('.wrap').css({
			position: 'relative',
			minHeight: $(window).outerHeight(),
			paddingBottom: $footer.outerHeight(),
		})

		$footer.css({
			position: 'absolute',
			left: 0,
			bottom: 0,
			width: '100%',
		})
	}

	function fixNavbarWrap() {
		var windowScrollTop = $(window).scrollTop(),
			headerHeight = $('.header').outerHeight(),
			$navbarWrap = $('.navbar-wrap'),
			fixedClass = 'navbar-wrap_fixed'

		if (windowScrollTop > headerHeight + $navbarWrap.outerHeight()) {
			$navbarWrap.addClass(fixedClass)
		} else if (windowScrollTop <= headerHeight) {
			$navbarWrap.removeClass(fixedClass)
		}
	}

	function fixCategoriesList() {
		var windowScrollTop = $(window).scrollTop(),
			$categoriesList = $('.categories-list'),
			fixedClass = 'categories-list_fixed'

		if (isMobile()) {
			$categoriesList
				.css({
					width: 'auto',
				})
				.removeClass(fixedClass)

			return
		}

		if (
			windowScrollTop >
			$('.header').outerHeight() + $('.category-image-wrap').outerHeight()
		) {
			$categoriesList
				.css({
					width: $categoriesList.parent().width(),
				})
				.addClass(fixedClass)
		} else {
			$categoriesList
				.css({
					width: 'auto',
				})
				.removeClass(fixedClass)
		}
	}

	function animation() {
		$('.animation').each(function () {
			var $animation = $(this),
				offset = 100

			if (typeof $animation.data('offset') !== 'undefined') {
				offset = parseInt($animation.data('offset'))
			}

			if (isInViewport($animation, offset)) {
				$animation.addClass($animation.data('animation') + ' animated')
			}
		})
	}

	function isInViewport(element, offset) {
		if (!$(element).length) {
			return false
		}

		if (typeof offset === 'undefined') {
			offset = 0
		}

		var $window = $(window),
			$element = $(element),
			scrollTop = $window.scrollTop(),
			elementTop = $element.offset().top

		if (
			scrollTop + $window.outerHeight() > elementTop + offset &&
			scrollTop - $element.outerHeight() < elementTop - offset
		) {
			return true
		}

		return false
	}

	function isMobile() {
		return matchMedia('(max-width: 767px)').matches
	}
})(jQuery)
