<?php
/**
 * electro setup functions
 *
 * @package electro
 */

if ( ! function_exists( 'electro_content_width' ) ) {
	/**
	 * Adjust content_width value for image attachment template.
	 *
	 */
	function electro_content_width() {
		if ( is_attachment() && wp_attachment_is_image() ) {
			$GLOBALS['content_width'] = 1170; /* pixels */
		}
	}
}

if ( ! function_exists( 'electro_setup' ) ) {
	/**
	 * Sets up Electro Wordpress Theme
	 *
	 */
	function electro_setup() {

		// Load Text domain
		electro_load_theme_textdomain();

		// Declare features supported by the theme
		electro_declare_theme_support();

		// Register Nav menus
		electro_register_nav_menus();
	}
}

if ( ! function_exists( 'electro_load_theme_textdomain' ) ) {
	/*
	 * Load Localisation files.
	 *
	 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
	 */
	function electro_load_theme_textdomain() {

		// wp-content/languages/themes/electro-it_IT.mo
		load_theme_textdomain( 'electro', trailingslashit( WP_LANG_DIR ) . 'themes/' );

		// wp-content/themes/electro-child/languages/it_IT.mo
		load_theme_textdomain( 'electro', get_stylesheet_directory() . '/languages' );

		// wp-content/themes/electro/languages/it_IT.mo
		load_theme_textdomain( 'electro', get_template_directory() . '/languages' );
	}
}

if ( ! function_exists( 'electro_declare_theme_support' ) ) {
	/**
	 * Declares support for various features supported by the theme
	 *
	 */
	function electro_declare_theme_support() {

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		/*
		 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'widgets',
		) );

		// Setup the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'electro_custom_background_args', array(
			'default-color' => apply_filters( 'electro_default_background_color', 'fcfcfc' ),
			'default-image' => '',
		) ) );

		// Add support for the Site Logo plugin and the site logo functionality in JetPack
		// https://github.com/automattic/site-logo
		// http://jetpack.me/
		add_theme_support( 'site-logo', array( 'size' => 'full' ) );

		// Declare WooCommerce support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// Declare support for title theme feature
		add_theme_support( 'title-tag' );

		// Declare support for Post formats feature
		add_theme_support( 'post-formats', array(
			'image',
			'gallery',
			'video',
			'audio',
			'quote',
			'link',
			'aside',
			'status'
		) );

		/**
         * Enable support for site logo.
         */
        add_theme_support(
            'custom-logo', apply_filters(
                'electro_custom_logo_args', array(
                    'height'      => 48,
                    'width'       => 145,
                    'flex-width'  => true,
                    'flex-height' => true,
                )
            )
        );
	}
}

if ( ! function_exists( 'electro_register_nav_menus' ) ) {
	/**
	 * Registers all nav menus used by the theme
	 */
	function electro_register_nav_menus() {

		$nav_menus = apply_filters( 'electro_nav_menus', array(
			'topbar-left'					=> esc_html__( 'Top Bar Left', 'electro' ),
			'topbar-right'					=> esc_html__( 'Top Bar Right', 'electro' ),
			'topbar-center'					=> esc_html__( 'Top Bar Center', 'electro' ),
			'header-support'				=> esc_html__( 'Header Support', 'electro' ),
			'primary-nav'					=> esc_html__( 'Primary Nav', 'electro' ),
			'navbar-primary'				=> esc_html__( 'Navbar Primary', 'electro' ),
			'secondary-nav'					=> esc_html__( 'Secondary Nav', 'electro' ),
			'departments-menu'				=> esc_html__( 'Departments Menu', 'electro' ),
			'all-departments-menu'			=> esc_html__( 'All Departments Menu', 'electro' ),
			'blog-menu'						=> esc_html__( 'Blog Menu', 'electro' ),
			'mobile-handheld-department'	=> esc_html__( 'Mobile Handheld Department', 'electro' ),
			'header-v9-navbar'				=> esc_html__( 'Header v9 Navbar', 'electro' ),
		) );

		$handheld_menus = array(
			'hand-held-nav' => esc_html__( 'Off Canvas Menu', 'electro' )
		);

		if ( apply_filters( 'electro_use_menus_for_handheld_footer', false ) ) {
			$handheld_menus['handheld-footer-nav'] = esc_html__( 'Handheld Footer', 'electro' );
		}

		$handheld  = apply_filters( 'electro_handheld_menus', $handheld_menus );
		$nav_menus = wp_parse_args( $nav_menus, $handheld );

		register_nav_menus( $nav_menus );
	}
}

if ( ! function_exists( 'electro_setup_sidebars' ) ) {
	/**
	 * Setup Sidebars available in Electro
	 */
	function electro_setup_sidebars() {

		// Home Sidebar
		register_sidebar( apply_filters( 'electro_register_home_sidebar_args', array(
			'name'          => esc_html__( 'Home Sidebar', 'electro' ),
			'id'            => 'home-sidebar-widgets',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) ) );

		// Shop Sidebar
		register_sidebar( apply_filters( 'electro_register_shop_sidebar_args', array(
			'name'          => esc_html__( 'Shop Sidebar', 'electro' ),
			'id'            => 'shop-sidebar-widgets',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) ) );

		// Product Filters Sidebar
		register_sidebar( apply_filters( 'electro_register_product_filters_sidebar_args', array(
			'name'          => esc_html__( 'Product Filters', 'electro' ),
			'id'            => 'product-filters-widgets',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) ) );

		// Single Product Sidebar
		if ( apply_filters( 'electro_enable_single_product_sidebar', false ) ) {
			register_sidebar( apply_filters( 'electro_register_single_product_sidebar_args', array(
				'name'          => esc_html__( 'Single Product Sidebar', 'electro' ),
				'id'            => 'single-product-sidebar-widgets',
				'description'   => '',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) ) );
		}

		// Blog Sidebar
		register_sidebar( apply_filters( 'electro_register_blog_sidebar_args', array(
			'name'          => esc_html__( 'Blog Sidebar', 'electro' ),
			'id'            => 'blog-sidebar-widgets',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) ) );

		// Footer Widgets
		register_sidebar( apply_filters( 'electro_register_footer_widgets_args', array(
			'name' 			=> esc_html__( 'Footer Widgets', 'electro' ),
			'id' 			=> 'footer-widgets',
			'description' 	=> '',
			'before_widget' => '<div class="widget-column col mb-lg-5 mb-xl-0"><aside id="%1$s" class="widget clearfix %2$s"><div class="body">',
			'after_widget' 	=> '</div></aside></div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',
		) ) );

		// Footer Bottom Widgets
		register_sidebar( apply_filters( 'electro_register_footer_bottom_widgets_args', array(
			'name' 			=> esc_html__( 'Footer Bottom Widgets', 'electro' ),
			'id' 			=> 'footer-bottom-widgets',
			'description' 	=> '',
			'before_widget' => '<div class="columns col"><aside id="%1$s" class="widget clearfix %2$s"><div class="body">',
			'after_widget' 	=> '</div></aside></div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',
		) ) );

		// Mobile Footer Bottom Widgets
		register_sidebar( apply_filters( 'electro_register_mobile_footer_bottom_widgets_args', array(
			'name' 			=> esc_html__( 'Mobile Footer Bottom Widgets', 'electro' ),
			'id' 			=> 'mobile-footer-bottom-widgets',
			'description' 	=> '',
			'before_widget' => '<div class="columns"><aside id="%1$s" class="widget %2$s"><div class="body">',
			'after_widget' 	=> '</div></aside></div>',
			'before_title' 	=> '<h4 class="widget-title">',
			'after_title' 	=> '</h4>',
		) ) );
	}
}

if ( ! function_exists( 'electro_register_widgets' ) ) {
	/**
	 * Register Widgets for Electro
	 */
	function electro_register_widgets() {

		// Electro Recent Posts Widget
		include_once get_template_directory() . '/inc/widgets/class-electro-recent-posts-widget.php';
		register_widget( 'Electro_Recent_Posts_Widget' );

		// Electro Posts Carousel Widget
		include_once get_template_directory() . '/inc/widgets/class-electro-posts-carousel-widget.php';
		register_widget( 'Electro_Posts_Carousel_Widget' );

		if ( apply_filters( 'electro/woocommerce/enable_widgets', true ) && is_woocommerce_activated() ) {

			// Electro Display Product Filter Widget
			include_once get_template_directory() . '/inc/widgets/class-electro-product-filter-widget.php';
			register_widget( 'Electro_Products_Filter_Widget' );

			// Electro Display Product 6-1 Widget
			include_once get_template_directory() . '/inc/widgets/class-electro-products-6-1-widget.php';
			register_widget( 'Electro_Products_6_1_Widget' );

			// Electro Display Product 2-1-2 Widget
			include_once get_template_directory() . '/inc/widgets/class-electro-products-2-1-2-widget.php';
			register_widget( 'Electro_Products_2_1_2_Widget' );

			// Electro Display Products Cards Carousel Widget
			include_once get_template_directory() . '/inc/widgets/class-electro-products-cards-carousel-widget.php';
			register_widget( 'Electro_Products_Cards_Carousel_Widget' );

			// Electro Display Products Carousel Widget
			include_once get_template_directory() . '/inc/widgets/class-electro-products-carousel-widget.php';
			register_widget( 'Electro_Products_Carousel_Widget' );

			// Electro Display Product List Categories Widget
			include_once get_template_directory() . '/inc/widgets/class-electro-product-list-categories.php';
			register_widget( 'Electro_Product_List_Catgories_Widget' );

			// Electro Display Product Brand Carousel Widget
			include_once get_template_directory() . '/inc/widgets/class-electro-brands-carousel.php';
			register_widget( 'Electro_Product_Brand_Carousel_Widget' );

			// Electro Display Products Tabs Carousel Widget
			include_once get_template_directory() . '/inc/widgets/class-electro-products-carousel-tabs.php';
			register_widget( 'Electro_Products_Tabs_Carousel_Widget' );

			// Electro Display Products Tabs Widget
			include_once get_template_directory() . '/inc/widgets/class-electro-products-tabs.php';
			register_widget( 'Electro_Products_Tabs_Widget' );

			// Electro Onsale Product Widget
			include_once get_template_directory() . '/inc/widgets/class-electro-onsale-product.php';
			register_widget( 'Electro_Onsale_Product_Widget' );

			// Electro Onsale Product Carousel Widget
			include_once get_template_directory() . '/inc/widgets/class-electro-onsale-products-carousel.php';
			register_widget( 'Electro_Onsale_Product_Carousel_Widget' );

			// Electro Banner Ad Widget
			include_once get_template_directory() . '/inc/widgets/class-electro-banner-ad-widget.php';
			register_widget( 'Electro_Banner_Ad_Widget' );

			// Electro Ads Block Widget
			include_once get_template_directory() . '/inc/widgets/class-electro-ads-block-widget.php';
			register_widget( 'Electro_Ads_Block_Widget' );

			// Electro Features Block Widget
			include_once get_template_directory() . '/inc/widgets/class-electro-features-block-widget.php';
			register_widget( 'Electro_Features_Block_Widget' );

			// Electro Product Categories Widget
			include_once get_template_directory() . '/inc/widgets/class-electro-product-catgories-widget.php';
			register_widget( 'Electro_Product_Categories_Widget' );
		}
	}
}

if ( ! function_exists( 'electro_register_required_plugins' ) ) {
	/**
	 * Registers all required/recommended plugins for the theme
	 *
	 */
	function electro_register_required_plugins() {
		global $electro_version;
		$plugins = apply_filters( 'ec_tgmpa_plugins', array(

			array(
				'name'					=> 'Electro Extensions',
				'slug'					=> 'electro-extensions',
				'source'				=> 'https://transvelo.github.io/electro/assets/plugins/electro-extensions.zip',
				'required'				=> false,
				'version'				=> $electro_version,
				'force_activation'		=> false,
				'force_deactivation'	=> false,
				'external_url'			=> '',
			),

			array(
				'name'					=> 'Envato Market',
				'slug'					=> 'envato-market',
				'source'				=> 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
				'required'				=> false,
				'version'				=> '2.0.6',
				'force_activation'		=> false,
				'force_deactivation'	=> false,
				'external_url'			=> '',
			),

			array(
                'name'                  => 'MAS Brands for WooCommerce',
                'slug'                  => 'mas-woocommerce-brands',
                'required'              => false,
                'version'               => '1.0.4',
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => '',
            ),

            array(
                'name'                  => 'MAS Static Content',
                'slug'                  => 'mas-static-content',
                'required'              => false,
                'version'               => '1.0.3',
                'force_activation'      => false,
                'force_deactivation'    => false,
                'external_url'          => '',
            ),

			array(
				'name'					=> 'One Click Demo Import',
				'slug'					=> 'one-click-demo-import',
				'required'				=> false,
				'version'				=> '2.6.1',
				'force_activation'		=> false,
				'force_deactivation'	=> false,
				'external_url'			=> '',
			),

			array(
				'name'					=> 'Redux Framework',
				'slug'					=> 'redux-framework',
				'required'				=> false,
				'version'				=> '4.2.6',
				'force_activation'		=> false,
				'force_deactivation'	=> false,
				'external_url'			=> '',
			),

			array(
				'name'					=> 'Revolution Slider',
				'slug'					=> 'revslider',
				'source'				=> 'https://transvelo.github.io/included-plugins/revslider.zip',
				'required'				=> false,
				'version'				=> '6.5.3',
				'force_activation'		=> false,
				'force_deactivation'	=> false,
				'external_url'			=> '',
			),

			array(
				'name'					=> 'WooCommerce',
				'slug'					=> 'woocommerce',
				'required'				=> false,
				'version'				=> '4.8.0',
				'force_activation'		=> false,
				'force_deactivation'	=> false,
				'external_url'			=> '',
			),

			array(
				'name'					=> 'WPBakery Page Builder',
				'slug'					=> 'js_composer',
				'source'				=> 'https://transvelo.github.io/included-plugins/js_composer.zip',
				'required'				=> false,
				'version'				=> '6.7.0',
				'force_activation'		=> false,
				'force_deactivation'	=> false,
				'external_url'			=> '',
			),

			array(
				'name'					=> 'WPForms Lite',
				'slug'					=> 'wpforms-lite',
				'required'				=> false,
				'version'				=> '1.6.4',
				'force_activation'		=> false,
				'force_deactivation'	=> false,
				'external_url'			=> '',
			),

			array(
				'name'					=> 'YITH Woocommerce Compare',
				'slug'					=> 'yith-woocommerce-compare',
				'required'				=> false,
				'version'				=> '2.4.3',
				'force_activation'		=> false,
				'force_deactivation'	=> false,
				'is_callable'			=> array( 'YITH_Woocompare', 'is_frontend' ),
				'external_url'			=> '',
			),

			array(
				'name'					=> 'YITH WooCommerce Wishlist',
				'slug'					=> 'yith-woocommerce-wishlist',
				'required'				=> false,
				'version'				=> '3.0.17',
				'force_activation'		=> false,
				'force_deactivation'	=> false,
				'is_callable'			=> array( 'YITH_WCWL', 'get_instance' ),
				'external_url'			=> '',
			)

		) );

		$config = apply_filters( 'ec_tgmpa_config', array(
			'domain'			=> 'electro',
			'default_path' 		=> '',
			'parent_slug' 		=> 'themes.php',
			'menu'				=> 'install-required-plugins',
			'has_notices'		=> true,
			'is_automatic'		=> false,
			'message'			=> '',
			'strings'			=> array(
				'page_title'								=> esc_html__( 'Install Required Plugins', 'electro' ),
				'menu_title'								=> esc_html__( 'Install Plugins', 'electro' ),
				'installing'								=> esc_html__( 'Installing Plugin: %s', 'electro' ),
				'oops'										=> esc_html__( 'Something went wrong with the plugin API.', 'electro' ),
				'notice_can_install_required'				=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'electro' ),
				'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'electro' ),
				'notice_cannot_install'						=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'electro' ),
				'notice_can_activate_required'				=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'electro' ),
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'electro' ),
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'electro' ),
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'electro' ),
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'electro' ),
				'install_link' 								=> _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'electro'  ),
				'activate_link' 							=> _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'electro'  ),
				'return'									=> esc_html__( 'Return to Required Plugins Installer', 'electro' ),
				'plugin_activated'							=> esc_html__( 'Plugin activated successfully.', 'electro' ),
				'complete' 									=> esc_html__( 'All plugins installed and activated successfully. %s', 'electro' ),
				'nag_type'									=> 'updated'
			)
		) );
		tgmpa( $plugins, $config );
	}
}
