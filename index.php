<?php
	$context = Timber::get_context();
	$context['posts'] = Timber::get_posts(); 

	$context['left_sidebar'] = Timber::get_widgets('home_left_sidebar');
	
	Timber::render('index.html', $context);	

?>