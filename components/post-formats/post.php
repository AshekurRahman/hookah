<div <?php post_class('post__box'); ?>>
    <?php hookah_post_thumbnail('large'); ?>
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
            <h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php endif; ?>	
    </div>
</div>
