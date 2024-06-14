<?php
// Include header and site header
get_header();
get_template_part('components/layouts/site_header');
?>

<!-- Post List Area Start -->
<section class="post__single section__padding__bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
            <div class="single__post">
                        <?php
                        // Loop through posts
                        while (have_posts()) : the_post();
                            hookah_post_thumbnail('large');
                            if (get_the_author() || hookah_get_post_date() || hookah_get_comment_count() || get_the_category_list() || get_the_tag_list()) : ?>
                                <ul class="post__meta">
                                    <?php if (get_the_author()) : ?>
                                        <li class="author"><i class="fa-regular fa-user me-2"></i><?php the_author(); ?></li>
                                    <?php endif; ?>
                                    <?php if ($post_date = hookah_get_post_date()) : ?>
                                        <li class="date"><i class="fa-regular fa-calendar-days me-2"></i><?php echo wp_kses_post($post_date); ?></li>
                                    <?php endif; ?>
                                    <?php if (get_the_category_list()) : ?>
                                        <li class="category"><i class="fa-regular fa-folder me-2"></i><?php echo get_the_category_list(', &nbsp;', ' '); ?></li>
                                    <?php endif; ?>
                                </ul>
                            <?php endif; ?>
                            

                            <?php
                            // Display the post content
                            the_content(
                                sprintf(
                                    esc_html__('Continue reading %s', 'hookah'),
                                    the_title('<span class="screen-reader-text">', '</span>', false)
                                )
                            );

                            // Display page links
                            wp_link_pages(array(
                                'before'          => '<div class="pagination"><span class="page-links-title">' . esc_html__('Pages:', 'hookah') . '</span>',
                                'after'           => '</div>',
                                'link_before'     => '<span class="page-numbers" >',
                                'link_after'      => '</span>',
                                'next_or_number'  => 'number',
                                'nextpagelink'    => '<i class="fa-regular fa-arrow-right"></i>',
                                'previouspagelink' => '<i class="fa-regular fa-arrow-left"></i>',
                            ));
                            if(function_exists('codexse_post_share_social')){
                                codexse_post_share_social();
                            }
                            ?>
                            <?php if (get_previous_post() || get_next_post()): ?>
                                <div class="post__navigation">
                                    <div class="nav__prev">
                                        <?php previous_post_link('%link', '<div class="nav__label">' . __('Prev Post', 'hookah') . '</div> <h4 class="post__title">%title</h4>'); ?>
                                    </div>
                                    <div class="nav__next">
                                        <?php next_post_link('%link', '<div class="nav__label">' . __('Next Post', 'hookah') . '</div> <h4 class="post__title">%title</h4>'); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php
                            // If comments are open or there are comments, display the comment template
                            if (comments_open() || get_comments_number()) {
                                comments_template();
                            }

                        endwhile; // End the post loop
                        ?>
                    </div>
            </div>
        </div>
    </div>
</section>
<!-- Post List Area End -->

<?php
// Include the footer template
get_footer();
?>
