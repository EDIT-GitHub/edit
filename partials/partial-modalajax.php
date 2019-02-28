<?php
/**
 * The template for Faqs Results
 *
 * @package Oasis
 */


//Partil Elements
$videoIcon = '<img class="svg" src="'. get_bloginfo('template_directory') .'/img/svg/campanhas-video-icon.svg" />';
$imageIcon = ' <img class="svg" src="'. get_bloginfo('template_directory') .'/img/svg/campanhas-image-icon.svg" />';
$videoFilter = '<div class="filter"></div>';
$bigPlayBtn = '<div class="big-play-btn"><div class="icon"><img src="'. get_bloginfo('template_directory') .'/img/svg/play-icon.svg" /></div></div>';
//Partial Elements End

global $post;
$counter = 0;
$id = $_POST['id'];
$post = get_post( $id );
$youtube = '';
setup_postdata( $post ); 
$blockType = 'video';
?>
<div class="content-block clearfix">
    <?php if($blockType == 'video'): 
        $youtube = ''; 
        if (strpos(get_field('video_link'), 'youtu')) { $youtube = 'youtube';}      
    ?>
    <div class="block full double-h centered video-holder animate animate-toBottom">
        <div class="flip-block">
            <div class="media-player">
                <div class="video-poster" style="background-image:url('<?php the_field('video_imagem');?>');">
                    
                </div>
                <video width="2" height="1" tabindex="4000" poster="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" class="video" data-type="<?php echo $youtube; ?>" preload="auto" x-webkit-airplay="allow" src="<?php get_field('video_link') ? the_field('video_link') : the_field('video');?>"></video>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="block full modal-image">
        <img src="<?php the_field('imagem_campanha'); ?>"/>
    </div>
    <?php endif; ?>
    <div class="subtitle">
        <h4><?php the_field('video_titulo'); ?></h4>
    </div>
    <div class="desc">
        <p><?php the_field('video_subtitulo'); ?></p>
    </div>
</div>
