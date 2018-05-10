<?php
/*
 *
 * Template for displaying comments
 * @package Swallow Blog
 * @since Swallow Blog 1.0
 *
*/


if ( post_password_required() )
	return;
?>

    <?php if( have_comments() ): ?>
    <hr>
    <button id="comments-sum" class="text-center btn comments-btn"><?php
        printf( _nx( 'Comment (1)', 'Comments (%1$s)', get_comments_number(), 'comments title', 'the-swallow' ),
        number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></button>
    <div class="comment">
        <?php paginate_comments_links(); ?>
        <ol class="comment-list">
        <?php
        wp_list_comments( array(
                        'walker'            => null,
                        'max_depth'         => '',
                        'style'             => 'ul',
                        'callback'          => null,
                        'end-callback'      => null,
                        'type'              => 'all',
                        'reply_text'        => esc_html( __('Reply', 'the-swallow') ),
                        'page'              => '',
                        'per_page'          => '',
                        'avatar_size'       => 64,
                        'reverse_top_level' => null,
                        'reverse_children'  => '',
                        'format'            => 'html5', 
                        'short_ping'        => false,  
                        'echo'              => true   
                ) ); ?>
        
        </ol>
    </div>
<?php endif; ?>
        <?php
       $comments_args = array(
        'label_submit'          => esc_html( __( 'Send a reply', 'the-swallow' )),
        'comment_notes_after'   => '',
        'title_reply_to'        => esc_html( __( 'Reply comment', 'the-swallow') )
         );
        
        comment_form($comments_args);
        ?>