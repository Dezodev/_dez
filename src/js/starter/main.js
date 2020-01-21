/**
 * Global scripts
 */

import 'bootstrap';

jQuery(document).ready(($) => {
	// Header
	$('.extra-links .search-link, #header-right .search-close').on('click', () => {
		$('#header-right').toggleClass('open-search');
	})

	// Back to top button
	$('#page-up-tool').on('click', () => {
		$('html,body').animate({scrollTop: 0}, 'slow');
	})

	// Reduce tools bar
	$("#reduce-tools").on('click', () => {
		$('#dezo-site-tools').toggleClass('reduce')
		$('#reduce-tools .fa-angle-double-left').toggleClass('fa-flip-horizontal')
	})

	// Social sharing
	let socialWindow = (url) => {
		var left = (screen.width - 700) / 2;
		var top = (screen.height - 450) / 2;
		var params = "menubar=no,toolbar=no,status=no,width=700,height=450,top=" + top + ",left=" + left;
		window.open(url, "NewWindow", params);
	}

	let pageUrl = encodeURIComponent(document.URL);
	let pageTitle = encodeURIComponent(document.title);
	let tweetContent = $("meta[property='og:description']").attr("content");
	let sperationTxt = encodeURIComponent(' - ');

	if (tweetContent) {
		tweetContent = encodeURIComponent(tweetContent)
	} else {
		tweetContent = pageTitle
	}

	$(".share-icon-fb .fab").on("click", () => {
		let url = `https://www.facebook.com/sharer.php?u=${pageUrl}`;
		socialWindow(url);
	});

	$(".share-icon-tw .fab").on("click", () => {
		let url = `https://twitter.com/intent/tweet?url=${pageUrl}&text=${tweetContent}`;
		socialWindow(url);
	});

	$(".share-icon-wh .fab").on("click", () => {
		let url = `https://api.whatsapp.com/send?text=${pageTitle}${sperationTxt}${pageUrl}`;
		var win = window.open(url, '_blank');
		win.focus();
	})

	$(".share-icon-ld .fab").on("click", () => {
		let url = `https://www.linkedin.com/shareArticle?mini=true&url=${pageUrl}`;
		socialWindow(url);
	})

	// Comments drawer
	let toggleComments = () => {
		$('#comments-drawer').toggleClass('open')
		$('#comments-overlay').toggleClass('show')
	}

	$('#comments-tool, .comments-block, #comments-drawer .close-btn').on('click', () => toggleComments());
	$('#comments-overlay.show').on('click', () => toggleComments()); // FIXME: when I click on overlay, the event not fire up.

	// Add Deep Anchor Links
	$('.entry-content').find('h1, h2, h3, h4, h5, h6').each(function () {

		//create id from heading text
		var id = $(this).attr('id') || $(this).text().toLowerCase().replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '').replace(/ +/g, '-');

		//add id to heading
		$(this).attr('id', id);

		//append parent class to heading
		$(this).addClass('anchor-heading');

		//create anchor
		var anchor = $('<a class="anchor-link" href="#' + id + '">#</a>');

		//append anchor link after heading text
		$(this).append(anchor);
	});

	//add smooth scroll for anchor links
	$(document).on('click', 'a.anchor-link', function (e) {
		e.preventDefault();
		$('html, body').stop().animate({
			scrollTop: $($(this).attr('href')).offset().top - 50
		}, 500, 'linear');
	});

	//navigate to anchor if available
	if (window.location.hash.length > 0) {
		$('a[href="' + window.location.hash + '"]').trigger('click');
	}
})
