<?php
	$context = Timber::get_context();
	$context['posts'] = Timber::get_posts(); 

	if (is_tag()) {
		$context['term'] = $wp_query->get_queried_object();
	}

	$context['left_sidebar'] = Timber::get_widgets('home_left_sidebar');
	
	Timber::render('index.html', $context);	

?>