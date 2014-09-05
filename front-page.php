<?php
	$context = Timber::get_context();
	$context['posts'] = Timber::query_posts(); 

	Timber::render('front-page.html', $context);	

?>