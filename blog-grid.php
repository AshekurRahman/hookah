<?php
/**
 * Template Name: Blog Grid
 **/
?>
<?php get_header(); ?>

<?php
// Get the current page number
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Define custom query parameters
$args = array(
    'post_type' => 'post', // Change to your desired post type
    'posts_per_page' => 10, // Number of posts to display
    'orderby' => 'date', // Order by date (optional)
    'order' => 'DESC', // Order direction (optional)
    'paged' => $paged // Respect pagination
);

// Create a new instance of WP_Query
$custom_query = new WP_Query($args);
?>

<?php if ($custom_query->have_posts()) : ?>
    <?php get_template_part('components/layouts/site_header'); ?>
    <section class="posts__section section__padding__bottom">
        <div class="container">
            <div class="row g-4 row-cols-1 row-cols-sm-2 row-cols-lg-3">
                <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                <div class="col" >
                    <div <?php post_class('post__box post__grid'); ?>>
                        <?php hookah_post_thumbnail('square'); ?>
                        <div class="post__content">
                            <ul class="post__meta">
                                <?php if (get_the_author()) : ?>
                                    <li class="author"><?php the_author(); ?></li>
                                <?php endif; ?>
                                <?php if ($post_date = hookah_get_post_date()) : ?>
                                    <li><i class="fa-solid fa-circle-small"></i></li>
                                    <li class="date"></i><?php echo wp_kses_post($post_date); ?></li>
                                <?php endif; ?>
                            </ul>
                            <?php if(get_the_title()): ?>
                                <!-- Post Title -->
                                <h4 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>

            <div class="pagination">
                <?php 
                echo paginate_links(array(
                    'total' => $custom_query->max_num_pages,
                    'current' => $paged,
                    'prev_text' => '<i class="fa-regular fa-arrow-left"></i>',
                    'next_text' => '<i class="fa-regular fa-arrow-right"></i>',
                    'screen_reader_text' => ' '
                )); 
                ?>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); // Reset the global post object so that the rest of the page works correctly ?>
<?php else : ?>
    <?php get_template_part('components/post-formats/post', 'none'); ?>
<?php endif; ?>

<?php get_footer(); ?>
