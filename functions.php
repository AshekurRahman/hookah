<?php
// hookah Theme Setup
if( !function_exists('hookah_setup_theme') ){
	function hookah_setup_theme(){
		/*
		* Make theme available for translation.
		* If you're building a theme based on hookah, use a find and replace
		* to change 'hookah' to the name of your theme in all the template files
		*/
		load_theme_textdomain( 'hookah', get_theme_file_path('/languages/') );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );
		
		/*
		* Enable support for custom logo.
		*/
		add_theme_support( 'custom-logo', array(
			'flex-height' => true
		) );

		/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		*/
		add_theme_support( 'post-thumbnails' );
        // add_image_size( 'full', 570, 410, true );


		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary_menu' => esc_html__( 'Primary Menu', 'hookah' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'assets/css/editor-style.css' ) );

		// Indicate widget sidebars can use selective refresh in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		
		// Disables the block editor from managing widgets in the Gutenberg plugin.
		add_filter( 'gutenberg_use_widgets_block_editor', '__return_false', 100 );
		// Disables the block editor from managing widgets.
		add_filter( 'use_widgets_block_editor', '__return_false' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for HTML5.
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );

		// Add support for custom spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom line height.
		add_theme_support( 'custom-line-height' );
        
        // Used for OnePage Template Back Link 
        if( !function_exists('hookah_detect_homepage') ){
            function hookah_detect_homepage() {
                $onepage = get_post_meta( get_the_ID(), '_codexse_one_page_scrolling_effect', true );
                /*If front page is set to display a static page, get the URL of the posts page.*/
                $homepage_id = get_option( 'page_on_front' );
                /*current page id*/
                $current_page_id = ( is_page( get_the_ID() ) ) ? get_the_ID() : '';
                if( $homepage_id == $current_page_id or $onepage != 'yes'  ) {
                    return true;
                } else {
                    return false;
                }
            }
        }
	}
}
add_action( 'after_setup_theme', 'hookah_setup_theme' );


/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since hookah 1.0.0
 */
if( !function_exists('hookah_widgets_init') ){
    function hookah_widgets_init() {

        if ( class_exists( 'Redux' ) ) {
            global $hookah_opt;
        }else{
            $hookah_opt['nav_toggle_sidebar'] = '0';
        }

        register_sidebar( array(
            'name'          => esc_html__( 'Sidebar', 'hookah' ),
            'id'            => 'main_sidebar',
            'description'   => esc_html__( 'This sidebar appears in the blog pages on the website.', 'hookah' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="widget__title">',
            'after_title'   => '</h5>',
        ) );
        

        if($hookah_opt['nav_toggle_sidebar'] == '1'){
            register_sidebar( array(
                'name'          => esc_html__( 'Navbar Toggle Sidebar', 'hookah' ),
                'id'            => 'navbar_toggle_sidebar',
                'description'   => esc_html__( 'This sidebar appears in the toggle navigation menu on the website.', 'hookah' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widget__title">',
                'after_title'   => '</h5>',
            ) );
        }        

        register_sidebar( array(
            'name'          => esc_html__( 'Footer Widget', 'hookah' ),
            'id'            => 'footer_sidebar',
            'description'   => esc_html__( 'This sidebar appears in the footer on the website.', 'hookah' ),
            'before_widget' => '<div id="%1$s" class="widget footer_widget %2$s col-xl-3 col-lg-4 col-sm-6">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="widget__title">',
            'after_title'   => '</h5>',
        ) );
    }
}
add_action( 'widgets_init', 'hookah_widgets_init' );


if ( !function_exists( 'hookah_fonts_url' ) ) {
    /**
     * Register Google fonts for hookah.
     *
     * Create your own hookah_fonts_url() function to override in a child theme.
     *
     * @since hookah 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    
    function hookah_fonts_url() {
        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';
        /* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
        $fonts[] = 'Inter:wght@300;400;500;600;700;800&display=swap';

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' =>  implode( '|', $fonts ),
                'subset' =>  $subsets,
            ), 'https://fonts.googleapis.com/css2' );
        }
        return esc_url_raw($fonts_url);
    }
}

/**
 * Enqueue scripts and styles.
 */
function hookah_scripts() {
	// Add google fonts, used in the main stylesheet.
	wp_enqueue_style( 'hookah-custom-fonts', hookah_fonts_url(), array(), null );   
	// Add Bootstrap, Used for default grid system.
	wp_enqueue_style( 'bootstrap', get_theme_file_uri('/assets/css/bootstrap-min.css'), array(), '5.1.1' );  
	wp_enqueue_style( 'hookah-root', get_theme_file_uri('/assets/css/root.css'), array(), wp_get_theme()->get( 'Version' )  );	                
	// Add Normalizer, Used for remove default tag style.
	wp_enqueue_style( 'normalizer', get_theme_file_uri('/assets/css/normalize.css'), array(), '8.0.1' );           
	// Add FontAwesome, Used for font icons.
	wp_enqueue_style( 'fontawesome', get_theme_file_uri('/assets/css/fontawesome-min.css'), array(), '5.8.1' );

	// Add hookah Theme CSS, Used for important structure style.
	wp_enqueue_style( 'hookah-theme', get_theme_file_uri('/assets/css/theme.css'), array(), wp_get_theme()->get( 'Version' )  );	
	// Theme stylesheet.
	wp_enqueue_style( 'hookah-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
	wp_style_add_data( 'hookah-style', 'rtl', 'replace' );	
	// Add responsive, Used for mobile style.
	wp_enqueue_style( 'hookah-responsive', get_theme_file_uri('/assets/css/responsive.css'), array(), '1.0.0' );
	
	
	// Add html5shiv. Used for support html5 tag.
	wp_enqueue_script( 'html5shiv', get_theme_file_uri('/assets/js/vendor/html5shiv-min.js'), array(), '3.7.2' );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
	// Add respond. A polyfill is a browser fallback, made in JavaScript work in older browsers.
	wp_enqueue_script( 'respond', get_theme_file_uri('/assets/js/vendor/respond-min.js'), array(), '1.4.2' );
	wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
	// Add jQuery-Fitvids, Used for responsive Video.
	wp_enqueue_script( 'jquery-fitvids', get_theme_file_uri('/assets/js/fitvids.js'), array('jquery'), '1.1.0', true );    
	// Add jQuery-Fitvids, Used for responsive Video.
	wp_enqueue_script( 'jquery-prefixfree', get_theme_file_uri('/assets/js/prefixfree-min.js'), array('jquery'), '1.1.0', true ); 
	wp_enqueue_script( 'animatenumber', get_theme_file_uri('/assets/js/animatenumber-min.js'), array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'jquery-appear', get_theme_file_uri('/assets/js/jquery-appear.js'), array('jquery'), '0.3.3', true );
	// Add Bootstrap, Used for default normal effect.
	wp_enqueue_script( 'bootstrap', get_theme_file_uri('/assets/js/bootstrap-bundle-min.js'), array('jquery'), '5.1.1', true );		

	wp_enqueue_script( 'hookah-scripts', get_theme_file_uri('/assets/js/scripts.js'), array('jquery','jquery-masonry','imagesloaded'), wp_get_theme()->get( 'Version' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    
}
add_action( 'wp_enqueue_scripts', 'hookah_scripts', 99999999999999999999999999 );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function hookah_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
<script>
    /(trident|msie)/i.test(navigator.userAgent) && document.getElementById && window.addEventListener && window.addEventListener("hashchange", function() {
        var t, e = location.hash.substring(1);
        /^[A-z0-9_-]+$/.test(e) && (t = document.getElementById(e)) && (/^(?:a|select|input|button|textarea)$/i.test(t.tagName) || (t.tabIndex = -1), t.focus())
    }, !1);
</script>
<?php
}
add_action( 'wp_print_footer_scripts', 'hookah_skip_link_focus_fix' );

// hookah All Function Pack.
require get_theme_file_path('/inc/theme-functions.php');

// Install Required Plugin.
require get_theme_file_path('/inc/theme-plugin-activation.php');

// Customizer Add Option.
require get_theme_file_path('/inc/customizer.php');

// OnePage Nav Waker Function.
require get_theme_file_path('/inc/nav-menu-walker.php');

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );