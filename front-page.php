<?php
	$context = Timber::get_context();
	$context['posts'] = Timber::get_posts(); 

	Timber::render('front-page.html', $context);	

?>