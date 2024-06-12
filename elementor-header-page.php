<?php
/**
 * Template Name: Elementor Header Page
 **/

// No need to call get_header() if you don't want the header.

    get_header();

?>
<?php get_template_part('components/layouts/site_header'); ?>
<section class="single_page_area">
    <?php                               
    // Start the loop.
    while(have_posts()){
        the_post();     
        the_content();
    }                        
    ?>
</section>
<!-- Post_List_Area-End -->
<?php get_footer();