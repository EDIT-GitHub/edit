<?php
/*
 * Noticias Single
 * @package Refriango
 */
get_header(); 
$backLink = true;
$type = 'news';
?>
<div class="content news-details">
    <div class="content-header generic placeholder">
    </div>
    <div class="content-container">
        <?php get_template_part( 'partials/partial', 'genericblocks' ); ?>
        <div class="share-block generic-block grid-cont">
            <div class="label-marker">
                <h4><?php _e('Partilhar', 'refriango'); ?></h4>
            </div>
            <div class="social-share">
                 <a class="share gPlus" href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" onclick="window.open('https://plus.google.com/share?url=<?php the_permalink() ?>','facebook-share-dialog','width=626,height=436');return false;">
                    <div class="onHover"></div>
                    <img class="svg" src="<?php echo get_bloginfo('template_directory');?>/img/svg/share-news/news-gPlus.svg" />
                </a>
                <a class="share lIn" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>','facebook-share-dialog','width=626,height=436');return false;">
                    <div class="onHover"></div>
                    <img class="svg" src="<?php echo get_bloginfo('template_directory');?>/img/svg/share-news/news-linked-in.svg" />
                </a>
                <a class="share twit" href="http://twitter.com/home?status=Vale a pena ver <?php the_permalink(); ?>" target="_blank" onclick="window.open('http://twitter.com/home?status=Vale a pena ver <?php the_permalink() ?>','facebook-share-dialog','width=626,height=436');return false;">
                    <div class="onHover"></div>
                    <img class="svg" src="<?php echo get_bloginfo('template_directory');?>/img/svg/share-news/news-twitter.svg" />
                </a>
                <a class="share fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>','facebook-share-dialog','width=626,height=436');return false;">
                    <div class="onHover"></div>
                    <img class="svg" src="<?php echo get_bloginfo('template_directory');?>/img/svg/share-news/news-fb.svg" />
                </a>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

<script>

    Modernizr.load([
        {
            test: window.matchMedia,
            nope: "<?php echo get_bloginfo('template_directory');?>/scripts/libs/polyfills.js"
        },
    "<?php echo get_bloginfo('template_directory');?>/scripts/libs/enquire.js",
    {
        load: "<?php echo get_bloginfo('template_directory');?>/scripts/project/refriango.js",
        complete: function () {
            replaceSvg();
            App.init();
            App.pages.init();
            App.pages.generic.init();
        }
    },

    ]);
    BrowserDetect.init();
    if (BrowserDetect.BROWSER_NAME == "Explorer" && BrowserDetect.BROWSER_VERSION < 10) {
        Modernizr.load([
            "<?php bloginfo('template_url'); ?>/css/ie.css"
        ])
    }
</script>