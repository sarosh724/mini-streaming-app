
document.addEventListener('DOMContentLoaded', () => {
	let elements = document.querySelectorAll('.list-item');
	Array.prototype.forEach.call(elements, function (el) {
		let all = el.querySelectorAll('a.link-arrow');

		all.forEach((value, key) => {
			value.classList.add('up');
			if (value.classList.contains('link-current')) {
				value.classList.add('active', 'down');
				value.nextElementSibling.style.display = 'block';
			}

			value.addEventListener('click', (event) => {
				event.preventDefault();

				let slideToggle = (target, duration = 500) => {
					if (window.getComputedStyle(target).display === 'none') {
						return slideDown(target, duration);
					} else {
						return slideUp(target, duration);
					}
				};

				slideToggle(value.nextElementSibling, 200);
				if (value.classList.contains('down')) {
					value.classList.toggle('rotate-revert');
				}

				value.classList.add('transition');
				value.classList.toggle('active');
				value.classList.toggle('rotate');

				!(value.classList.contains('link-current'))
					? value.classList.add('link-current')
					: value.classList.remove('link-current');

			});
		});
	});


	let slideUp = (target, duration = 500) => {
		target.style.transitionProperty = 'height, margin, padding';
		target.style.transitionDuration = duration + 'ms';
		target.style.boxSizing = 'border-box';
		target.style.height = target.offsetHeight + 'px';
		target.offsetHeight;
		target.style.overflow = 'hidden';
		target.style.height = 0;
		target.style.paddingTop = 0;
		target.style.paddingBottom = 0;
		target.style.marginTop = 0;
		target.style.marginBottom = 0;
		window.setTimeout(() => {
			target.style.display = 'none';
			target.style.removeProperty('height');
			target.style.removeProperty('padding-top');
			target.style.removeProperty('padding-bottom');
			target.style.removeProperty('margin-top');
			target.style.removeProperty('margin-bottom');
			target.style.removeProperty('overflow');
			target.style.removeProperty('transition-duration');
			target.style.removeProperty('transition-property');
		}, duration);
	}


	let slideDown = (target, duration = 500) => {
		target.style.removeProperty('display');
		let display = window.getComputedStyle(target).display;

		if (display === 'none')
			display = 'block';

		target.style.display = display;
		let height = target.offsetHeight;
		target.style.overflow = 'hidden';
		target.style.height = 0;
		target.style.paddingTop = 0;
		target.style.paddingBottom = 0;
		target.style.marginTop = 0;
		target.style.marginBottom = 0;
		target.offsetHeight;
		target.style.boxSizing = 'border-box';
		target.style.transitionProperty = 'height, margin, padding';
		target.style.transitionDuration = duration + 'ms';
		target.style.height = height + 'px';
		target.style.removeProperty('padding-top');
		target.style.removeProperty('padding-bottom');
		target.style.removeProperty('margin-top');
		target.style.removeProperty('margin-bottom');
		window.setTimeout(() => {
			target.style.removeProperty('height');
			target.style.removeProperty('overflow');
			target.style.removeProperty('transition-duration');
			target.style.removeProperty('transition-property');
		}, duration);
	}

/*
	$('#sidebar').slimScroll({
		height: '100vh'
	});
 */

	var is_mobile = $(window).width() < 767;

	$(".sidebar-toggle").click(function () {
		if ($("body").hasClass('sb-close')) {

			// set display property open ,close sidebar button for only mobile devices
			if(is_mobile){
				$(".sidebar-open-btn").show();
				$(".sidebar-close-btn").hide();
			}
            $(".ipsum-logo-menu-mini").hide();
            $(".ipsum-logo-menu").show();
            $(".ipsum-logo-menu").css('display','inline-block');

            $("body").removeClass('sb-close');
            // $('.active').parent().show();
            localStorage.setItem('is-sidebar-closed', '0');
		} else {

			// set display property open ,close sidebar button for only mobile devices
			if(is_mobile){
				$(".sidebar-close-btn").show();
				$(".sidebar-open-btn").hide();
                $(".ipsum-logo-menu-mini").hide();
			}
            else {
                $(".ipsum-logo-menu-mini").show();
                $(".ipsum-logo-menu").hide();
            }


			$("body").addClass('sb-close');
            // $('.active').parent().hide();
            localStorage.setItem('is-sidebar-closed', '1');
		}
	});

	if(is_mobile){
        $(".mobile-header").show();
        $(".desktop-sidebar-btn").hide();
        $(".desktop-tenant-logo").hide();
    }


	var is_sidebar_closed = localStorage.getItem('is-sidebar-closed');


	if (is_sidebar_closed == '1') {
		$("body").addClass('sb-close');
        $(".ipsum-logo-menu-mini").show();
        $(".ipsum-logo-menu").hide();
    }
	$("#navbar-container").mouseover(function () {
		if (!is_mobile) {
			$("body").removeClass('sb-close');
            // $('.active').parent().show();
            $(".ipsum-logo-menu-mini").hide();
            $(".ipsum-logo-menu").show();

        }
	}).mouseout(function () {
		if (localStorage.getItem('is-sidebar-closed') == '1') {
            if (!is_mobile) {
				$("body").addClass('sb-close');
                $(".ipsum-logo-menu-mini").show();
                $(".ipsum-logo-menu").hide();
                // $('.active').parent().hide();
			}
		}
    });


});





