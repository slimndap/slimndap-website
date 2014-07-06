<?php
	add_action('wp_enqueue_scripts', 'slimndap_scripts');
	add_action('init', 'slimndap_init');	
	add_filter('jpeg_quality', 'slimndap_jpeg_quality'); // Set JPG compression

	/* Timber */
	add_filter('timber_context', 'timber_add_to_context'); // Add your own data to Timber's context object

	function slimndap_scripts() {
		wp_enqueue_style( 'google-webfonts', 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Open+Sans:300,300italic,700' );	 
		wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' );	    
		wp_enqueue_script( 'slimndapscript', get_template_directory_uri().'/script.js', array('jquery'), false, true );	    

	}    

	function slimndap_init() {
		global $no_of_footer_menus;
		add_theme_support('html5', array('search-form'));
		add_theme_support('post-thumbnails');
		register_nav_menu('header_menu','Header menu');
		register_nav_menu('sidebar_menu','English menu');
		register_nav_menu('left_menu','Linker kolom menu');
		register_nav_menu('home_sidebar_menu','Sidebar menu (home)');
		add_theme_support( 'woocommerce' );
		
		for ($m=0;$m<$no_of_footer_menus;$m++) {
			register_nav_menu('footer_menu_'.$m,'Footer menu ('.($m+1).'e kolom)');
		}
	}

	function slimndap_jpeg_quality($arg) {
		return 40;
	}


	/**
	 * Timber
	 * 
	 */
	
	function timber_add_to_context($context){
		global $no_of_footer_menus;

		$args = array(
			'exclude'=>1,
			'orderby'=>'term_order'
		);
		$context['categories'] = get_categories($args);

		$context['nieuwsbrief'] = new TimberPost(64);
		$context['agenda'] = new TimberPost(94);
		$context['nieuws'] = new TimberPost(402);

		$context['header_menu'] = new TimberMenu('header_menu');
		$context['sidebar_menu'] = new TimberMenu('sidebar_menu');
		$context['left_menu'] = new TimberMenu('left_menu');
		$context['footer_menus'] = array();
		for ($m=0;$m<$no_of_footer_menus;$m++) {
			$context['footer_menus'][] = new TimberMenu('footer_menu_'.$m);
		}

		if ( function_exists('yoast_breadcrumb') ) {
			$context['breadcrumbs'] = yoast_breadcrumb("","",false);	
		}
		return $context;
	}

	add_action( 'wp_enqueue_scripts', 'change_woo_styles', 99 );
	function change_woo_styles() {
		/*
			Add responsiveness to WooCommerce
			See: http://alexis.nomine.fr/en/blog/2013/04/27/a-bit-of-responsiveness-for-woocommerce-2-0-default-stylesheet/
		*/
		wp_dequeue_style( 'woocommerce_frontend_styles' );
		wp_enqueue_style( 'woocommerce_responsive_frontend_styles', get_stylesheet_directory_uri()."/woocommerce.css" );
	}

?>