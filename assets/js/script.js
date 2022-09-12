'use strict'

jQuery(function ($) {
	$(document).ready(function () {
		// on/off search in header
		$('.search-switch').on('click', function () {
			$(this).toggleClass('on')
			$('.search-form-header').toggle(300, function () {
				$('.search-form-header > input').focus()
			})
		})

		if (location.href.includes('/?s=')) {
			$('.search-switch').click()
		}
	})

	$('.card-container').masonry({
		// options
		itemSelector: '.card',
		// columnWidth: '.grid-sizer',
	})

	// main page effects
	$('.front-page-top-section__sitename').addClass('scale-in-center')
	$('.front-page-top-section__type').addClass('scale-in-center-2')

	$(window).scroll(function () {
		var scrollTop = $(window).scrollTop()
		// console.log(scrollTop)
		// $('.front-page-top-secti)on__sitename').css('top', -scrollTop / 2)
		// if (scrollTop <= 320) {
		// 	$('.front-page-top-section__sitename').css({
		// 		top: scrollTop / 5,
		// 		'font-size': scrollTop / 3 + 268,
		// 	})
		// }

		// if (scrollTop <= 300) {
		// 	$('.front-page-top-section__type').css('top', scrollTop / 2)
		// }

		// if (scrollTop <= 500) {
		// 	$('.descr_images img').css('top', scrollTop / 2 - 340)
		// }

		// if (scrollTop >= 150 && scrollTop <= 280) {
		// 	$('.second-main-section__text').css('top', -scrollTop + 150)
		// }
	})
})
