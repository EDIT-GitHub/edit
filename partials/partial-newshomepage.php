<?php
/**
 * The template for News Homepage
 *
 * @package Refriango
 */
?>

<?php 
$arguments = array(
'offset'           => '',
'showposts'        => '3',
'order'            => 'ASC', 
'orderby'          => 'menu_order',
'post_type'        => 'homenews',
'suppress_filters'  => '0'
);      
$newsHomepage = get_posts( $arguments );
?> 

<?php 
if($newsHomepage):
?>
<div class="news-home-block" id="noticias">
    <div class="inner grid-cont">
        <div class="area-marker left">
            <div class="area-marker-inner">
                <span><?php _e('Noticias', 'refriango'); ?></span>
            </div>
        </div>
        <div class="row clearfix">
            <?php 
    foreach($newsHomepage as $post):
        setup_postdata($post);
        $imagem = get_field('imagem');
            ?>
            <a href="<?php the_field('link');?>" class="grid-1-3 f-left home-news-block">
                <div class="image-cont">
                    <div class="image">
                        <div class="backHover"></div>
                        <img alt="<?php echo $imagem['alt']; ?>" src="<?php echo $imagem['url']?>" />
                        <div class="frontHover"></div>
                    </div>
                    <div class="news-icon">
                        <img src="<?php bloginfo('template_url'); ?>/img/marcas/<?php the_field('tipo'); ?>.png" />
                    </div>
                </div>
                <div class="details">

                    <h2><?php the_field('titulo');?></h2>
                    <div class="news-date">
                        <span><?php the_field('data');?></span>
                    </div>
                    <p><?php the_field('description');?></p>
                </div>
            </a>
            <?php 
    endforeach;
            ?>
        </div>
    </div>
</div>
<?php 
endif;
?>