<?php 
/////////////////////////////////////////
// Comments Walker
////////////////////////////////////////
class comment_walker extends Walker_Comment {
    var $tree_type = 'comment';
    var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
    
    // constructor -> wrapper for the comments list
    function __construct() { ?>

<div class="comments-list">
    <div class="grid-cont">
        <div class="block-coments">
            <?php }

    // start_lvl -> wrapper for child comments list
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 2; ?>

            <div class="child-comments comments-list">

                <?php }
    
    // end_lvl -> closing wrapper for child comments list
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 2; ?>

            </div>
            <?php }

    // start_el -> HTML for comment template
    function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); 
        
        if ( 'article' == $args['style'] ) {
            $tag = 'article';
            $add_below = 'comment';
        } else {
            $tag = 'article';
            $add_below = 'comment';
        } ?>

            <div <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemprop="comment" itemscope itemtype="http://schema.org/Comment">
                <div class="sidebar-photo">
                    <div class="image avatar">
                        <?php echo get_avatar( $comment, 110, 'retro', 'Author\'s gravatar' ); ?>
                    </div>
                </div>
                <div class="block-text-coments">
                    <!-- Imagem ou SVG ? -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                        width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
                        <g>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.012,30V15.703C0.937,13.65,1.226,11.719,1.87,9.9
		c0.644-1.8,1.559-3.384,2.725-4.763C5.761,3.778,7.15,2.653,8.783,1.744C10.398,0.834,12.161,0.262,14.074,0v6.3
		c-2.361,0.834-3.984,2.062-4.852,3.675c-0.877,1.622-1.296,3.619-1.296,5.962h6.148V30H1.012z" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.94,30V15.703c-0.075-2.053,0.214-3.984,0.857-5.803
		c0.644-1.8,1.559-3.384,2.725-4.763c1.166-1.359,2.556-2.484,4.188-3.394C25.325,0.834,27.089,0.262,29,0v6.3
		c-2.359,0.834-3.982,2.062-4.852,3.675c-0.878,1.622-1.296,3.619-1.296,5.962H29V30H15.94z" />
                        </g>
                    </svg>

                    <div class="comment-content post-content" itemprop="text">
                        <?php comment_text() ?>
                        <?php /*comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) */?>
                    </div>
                    <div class="comment-meta post-meta" role="complementary">
                        <div class="comment-author">
                            <?php comment_author(); ?>

                        </div>
                        <time class="comment-meta-item" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('d/m/Y') ?> - <?php comment_time() ?></time>
                        <?php edit_comment_link('<p class="comment-meta-item">Edit this comment</p>','',''); ?>
                        <?php if ($comment->comment_approved == '0') : ?>
                        <p class="comment-meta-item">Your comment is awaiting moderation.</p>
                        <?php endif; ?>
                    </div>

                </div>
                <?php }

    // end_el -> closing HTML for comment template
    function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

            </div>

            <?php }

    // destructor â€“ closing wrapper for the comments list
    function __destruct() { ?>
        </div>
    </div>
</div>
<?php }

}
?>
