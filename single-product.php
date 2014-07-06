<?php
	$context = Timber::get_context();

	$context['post'] = Timber::get_post(); 
	$context['product'] = $product;

	$featured = array();
	$gallery_attachments= $product->get_gallery_attachment_ids();
	foreach($gallery_attachments as $attachment_id) {
		$featured[] = new TimberImage($attachment_id);
	}
	$context['featured'] = $featured;
	
	$context['left_sidebar'] = Timber::get_widgets('home_left_sidebar');

	Timber::render('single-product.html', $context);	

?>