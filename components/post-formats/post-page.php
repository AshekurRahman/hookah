<div <?php post_class('page__wrapper'); ?> >  

    <?php

        the_content();

        wp_link_pages( array(

            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'hookah' ) . '</span>',

            'after'       => '</div>',

            'link_before' => '<span class="page-numbers" >',

            'link_after'  => '</span>',

            'next_or_number' => 'number',

            'nextpagelink'     => '<i class="fa-regular fa-arrow-right"></i>',

            'previouspagelink' => '<i class="fa-regular fa-arrow-left"></i>',

        ) );

    ?>

</div>