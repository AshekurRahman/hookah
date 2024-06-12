<?php
get_header();
?>

<section class="page__section">
    <?php                               
    // Start the loop.
    if (have_posts()) {
        while (have_posts()) {
            the_post();                                    
            the_content();
        }

        // Get the current project's categories.
        $categories = get_the_category();
        $category_ids = array();
        foreach ($categories as $category) {
            $category_ids[] = $category->term_id;
        }

        // Query related projects based on categories.
        $related_projects_args = array(
            'post_type' => 'project', // Change 'project' to your custom post type name
            'posts_per_page' => 4, // Number of related projects to display
            'post__not_in' => array(get_the_ID()), // Exclude the current project
            'category__in' => $category_ids, // Only show projects from the same categories
        );

        $related_projects_query = new WP_Query($related_projects_args);

        // Output swiper slider if related projects exist.
        if ($related_projects_query->have_posts()) {
            echo '<div class="releted__project">';
            echo '<div class="container">';
            echo '<div class="section__badge__title"> <span class="text">'.__('Similar Projects','hookah').'</span> <span class="devider"></span> </div>';
            echo '<div class="swiper-container">';
                echo '<div class="swiper-wrapper">';
                while ($related_projects_query->have_posts()) {
                    $related_projects_query->the_post();
                    $output = '<div class="swiper-slide">';
                    $output .= '<div class="project__item">';
                        if (has_post_thumbnail()) {
                            $output .= '<div class="project__thumbnail">';
                            $output .= get_the_post_thumbnail(get_the_ID(), 'large');
                            $output .= '</div>';
                        }
                        $output .= '<h4 class="project__title"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></h4>';
                        $output .= '<div class="project__content">';
                            $output .= get_the_excerpt();
                        $output .= '</div>';
                        $output .= '<a href="'.get_the_permalink().'" class="project__button" >'.__('View More','codexse').'</a>';
                    $output .= '</div>';
                    $output .= '</div>';
                    echo $output; // Return the generated HTML
                }
                echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        wp_reset_postdata(); // Reset post data
    } else {
        // If no content, include the "No posts found" template.
        get_template_part('components/post-formats/post', 'none');
    }
    ?>
</section>

<?php
get_footer();
?>
