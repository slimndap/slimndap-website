<?php
	$context = Timber::get_context();
	$context['post'] = Timber::get_post(); 
	$context['comment_form'] = TimberHelper::get_comment_form();
	
	Timber::render('single.html', $context);	

?>