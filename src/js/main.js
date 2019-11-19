import 'bootstrap';


jQuery(document).ready(($) => {
	$('#tool-page-up').on('click', () => {
		$('html,body').animate({scrollTop: 0}, 'slow');
	})
})
