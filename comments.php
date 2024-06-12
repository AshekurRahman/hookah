<?php
if (post_password_required()) return;
?>

<div class="comments__section">
    <?php
    if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
    ?>
        <p class="alert alert-warning py-2 mb-4"><?php esc_html_e('Comments are closed.', 'hookah'); ?></p>
    <?php endif; ?>

    <?php if (have_comments()) : ?>
        <div class="comments__list__area">
            <h3 class="comment__title">
                <?php
                $comments_number = get_comments_number();
                printf(
                    _nx('%1$s Comment', '%1$s Comments', $comments_number, 'comments title', 'hookah'),
                    number_format_i18n($comments_number),
                    get_the_title()
                );
                ?>
            </h3>
            <ol class="comments__list">
                <?php wp_list_comments(['style' => 'ul+', 'short_ping' => true, 'avatar_size' => 100]); ?>
            </ol>
            <?php
            the_comments_pagination([
                'prev_text' => '<i class="fa-light fa-angle-left"></i>',
                'next_text' => '<i class="fa-light fa-angle-right"></i>',
                'screen_reader_text' => ' ',
                'type' => 'array',
                'show_all' => true,
            ]);
            ?>
        </div>
    <?php endif;

    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : '');
    $consent = empty($commenter['comment_author_email']) ? '' : ' checked="checked"';
    $hookah_comment_fields =  array(
        'author' => '<div class="col-lg-6"><p class="input__control"><input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" ' . $aria_req . ' placeholder="' . esc_attr__('Type your name...', 'hookah') . '"></p></div>',
        'email' => '<div class="col-lg-6"><p class="input__control"><input id="email" name="email" type="email" size="30" value="' . esc_attr($commenter['comment_author_email']) . '" ' . $aria_req . ' placeholder="' . esc_attr__('Type your email...', 'hookah') . '" ></p></div>',
        'url' => '<div class="col-lg-12"><p class="input__control"><input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" placeholder="' . esc_attr__('Type your url...', 'hookah') . '" ></p></div>',
        'cookies' => '<div class="col-lg-12"><p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . ' <label for="wp-comment-cookies-consent">' . esc_html__('Save my name, email, and website in this browser for the next time I comment.', 'hookah') . '</label></p></div>'
    );
    comment_form([
        'fields' => apply_filters('comment_form_default_fields', $hookah_comment_fields),
        'comment_field' => '<div class="col-lg-12"><p class="input__control"><textarea id="comment" name="comment" cols="45" rows="8" required="required" placeholder="' . esc_attr__('Type your comment...', 'hookah') . '"></textarea></p></div>',
        'class_submit' => 'accent__button',
        'class_form' => 'comment__form row g-3',
        'logged_in_as' => '<div class="col-lg-12"><p class="logged-in-as">' . esc_html__('Logged in as ', 'hookah') . sprintf('<a href="%1$s">%2$s</a>. <a href="%3$s" title="' . esc_attr__('Log out of this account', 'hookah') . '">' . esc_html__('Log out?', 'hookah') . '</a>', admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink()))) . '</p></div>',
        'title_reply' => esc_html__('Post Comment', 'hookah')
    ]);

    ?>
</div>
