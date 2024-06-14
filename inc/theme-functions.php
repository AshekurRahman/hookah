<?php
/*----------------------
WP_Kses-SVG-Tags-Allowed
-----------------------*/
if (!function_exists('hookah_kses_svg_allowed')) {
    function hookah_kses_svg_allowed($tags) {
        $args = array(
            'svg'   => array(
                'class'           => true,
                'aria-hidden'     => true,
                'aria-labelledby' => true,
                'role'            => true,
                'xmlns'           => true,
                'width'           => true,
                'height'          => true,
                'viewbox'         => true // <= Must be lower case!
            ),
            'g'     => array('fill' => true),
            'title' => array('title' => true),
            'path'  => array(
                'd'    => true,
                'fill' => true
            ),
            'use'   => array(
                'xlink:href' => true,
            )
        );
        $allowed = array_merge($tags, $args);
        return $allowed;
    }

    add_filter('wp_kses_allowed_html', 'hookah_kses_svg_allowed', 10, 2);
}

/*----------------
Add Body Class
-----------------*/
function hookah_body_classes( $classes ) {
    $theme_mode_setting = get_theme_mod( 'theme_mode_setting', 'light' );
    $transparent_menu_setting = get_theme_mod( 'transparent_menu_setting', 'static' );

    if ( $theme_mode_setting === 'dark' ) {
        $classes[] = 'dark__theme';
    }

    if ( $transparent_menu_setting === 'static' ) {
        $classes[] = 'static__menu';
    } elseif ( $transparent_menu_setting === 'transparent_light' ) {
        $classes[] = 'trans__light__menu';
    } elseif ( $transparent_menu_setting === 'transparent_dark' ) {
        $classes[] = 'trans__dark__menu';
    } else {
        $classes[] = 'default__menu';
    }

    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }    

    return $classes;
}
add_filter( 'body_class', 'hookah_body_classes' );




/*-------------------------------------------------------------------------------
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 --------------------------------------------------------------------------------*/
function hookah_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'hookah_pingback_header' );
/*------------------------------------------
Comment-Form-Field-Position-Change-Function 
-------------------------------------------*/
function hookah_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
} 
add_filter( 'comment_form_fields', 'hookah_move_comment_field_to_bottom' );


// Page Title Generator
function hookah_page_title() {
    if (class_exists('Redux')) {
        global $hookah_opt;
        $blog_title = $hookah_opt['blog_page_title'];
        $search_title = $hookah_opt['search_page_title'];
    } else {
        // Default Values Set In Variables
        $blog_title   = esc_html__('Blog List', 'hookah');
        $search_title = esc_html__('Search', 'hookah');
    }

    $data = '';

    // Declare Variable
    if (is_home()) {
        $data .= esc_html($blog_title);
    } elseif (is_single() && 'post' == get_post_type()) {
        $data .= get_the_title();
    } elseif (is_single()) {
        $data .= get_the_title();
    } elseif (is_search()) {
        $data .= esc_html($search_title) . ' : <span class="search_select">' . esc_html(get_search_query()) . '</span>';
    } elseif (is_archive()) {
        if (class_exists('WooCommerce') && is_shop()) {
            $data .= woocommerce_page_title(false);
        } else {
            $data .= get_the_archive_title('', '');
        }
    } elseif (class_exists('WooCommerce') && is_woocommerce()) {
        if (class_exists('WooCommerce') && is_shop()) {
            $data .= esc_html__('Shop Page', 'hookah');
        } else {
            $data .= woocommerce_page_title(false);
        }
    } elseif (is_404()) {
        $data .= esc_html__('Error Page', 'hookah');
    } else {
        $data .= single_post_title('', false);
    }

    // Data Return
    if (empty($data)) {
        return false;
    } else {
        return wp_kses($data, wp_kses_allowed_html('post'));
    }
}

/*----- Post_Thumbnail_Function -----*/
if (!function_exists('hookah_post_thumbnail')) :
    function hookah_post_thumbnail($thumb_size = 'large') {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_single()) {
            // Single Page Attachment Content.
            printf('<figure class="post__media">%1$s</figure>', get_the_post_thumbnail('', $thumb_size));
        } else {
            // Post Page Attachment Content.
            printf(
                '<figure class="post__media"><a href="%1$s" aria-hidden="true">%2$s</a></figure>',
                esc_url(get_the_permalink()),
                get_the_post_thumbnail('', $thumb_size)
            );
        }
    }
endif;



/*----- Post_Date_Function_Modify -----*/
if (!function_exists('hookah_get_post_date')) {
    function hookah_get_post_date($format = 'j F, Y') {
        $time_string = sprintf(
            wp_kses(
                '<time class="entry-date published updated" datetime="%1$s">%2$s</time>',
                wp_kses_allowed_html('post')
            ),
            esc_attr(get_the_date('c')),
            esc_html(get_the_date($format))
        );

        if (get_the_date('Y/m/d')) {
            $data = '<a href="' . get_day_link(get_the_date('Y'), get_the_date('m'), get_the_date('d')) . '">' . $time_string . '</a>';
            return $data;
        } else {
            return false;
        }
    }
}

/*----- Post_Comments_Function_Modify -----*/
if (!function_exists('hookah_get_comment_count')) {
    function hookah_get_comment_count() {
        if (!post_password_required() && (comments_open() || get_comments_number()) && get_comments_number() > 0) {
            $comment_count = get_comments_number_text(
                esc_html__('No comment', 'hookah'),
                esc_html__('1 Comment', 'hookah'),
                esc_html__('% Comments', 'hookah')
            );
            $data = esc_html($comment_count);
            return $data;
        } else {
            return false;
        }
    }
}

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Post title array
if (!function_exists('hookah_get_post_title')) {
    function hookah_get_post_title($postType = 'post') {
        $post_type_query = new WP_Query(array('post_type' => $postType, 'posts_per_page' => -1));

        $post_title_array = array();

        if ($post_type_query->have_posts()) {
            $posts_array = $post_type_query->posts;
            $post_title_array = wp_list_pluck($posts_array, 'post_title', 'ID');
        }

        // Add "Default" as the first option
        $post_title_array = array('default' => esc_html__('Default', 'hookah')) + $post_title_array;

        return $post_title_array;
    }
}
/**
 * Filter the categories archive widget to add a span around post count
 */
function hookah_cat_count_span($links) {
    $links = str_replace('</a> (', '<span class="post__count">(', $links);
    $links = str_replace(')', ')</span></a>', $links);
    return $links;
}
add_filter('wp_list_categories', 'hookah_cat_count_span');

/**
 * Filter the archives widget to add a span around post count
 */
function hookah_archive_count_span($links) {
    $links = str_replace('</a>&nbsp;(', '<span class="post__count">(', $links);
    $links = str_replace(')', ')</span></a>', $links);
    return $links;
}
add_filter('get_archives_link', 'hookah_archive_count_span');

/**
 * Add a demo content link to the main menu for users with edit_theme_options capability
 */
function hookah_mainmenu_demo_content() {
    if (!current_user_can('edit_theme_options')) {
        return;
    }

    printf(
        wp_kses('<a class="primary__button" href="%s">%s</a>', wp_kses_allowed_html('post')),
        esc_url(admin_url('nav-menus.php')),
        esc_html__('Setup a menu', 'hookah')
    );
}
