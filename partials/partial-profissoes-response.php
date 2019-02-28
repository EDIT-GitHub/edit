<?php
/**
* Template Name: Profissoes Results
* The template for Profissoes Results
*
* @package Edit
*/
$blockPaginator=0;
$firstTime = true;
$totalPages = '';
$pages = '';
$showposts = 6;
$category = '';
$tag = '';
$order = 'ASC';
$orderBy = 'menu_order';
$include = '';
$exclude = '';
$meta_key = '';
$meta_value = '';
$post_type = 'profissoes';
$post_mime_type = '';
$post_parent = '';
$post_status = 'publish';
$supress_filters = true;
$search = '';
$itemNumber = '';
$special = '';
//Products Stuff
$meta_query = '';
$ano = '';
$profissao = '';

    //Count Number of Pages
    $args = array(
        'offset'           => '',
        'showposts'        => '-1',
        's'                => $search,
        'category'         => $category,
        'tag'              => $tag,
        'include'          => $include,
        'exclude'          => $exclude,
        'order'            => $order,
        'orderby'          => $orderBy,
        'meta_query' => $meta_query,
        'post_type'        => $post_type,
        'post_mime_type'   => $post_mime_type,
        'post_parent'      => $post_parent,
        'post_status'      => $post_status,
        'suppress_filters' => $supress_filters
    );
    $myposts = get_posts( $args );
$myposts = get_posts( $args );
if ($myposts):
    ?>
    <?php
    foreach ( $myposts as $post ) :
        setup_postdata( $post );
        //var_dump($post);
        $size = 'medium';
        $fundo_amarelo = '';
        if (get_field('fundo_amarelo')) {
            $fundo_amarelo = 'fundo-amarelo';
        }

        if(get_field('tipo_destaque_homepage')){
            $size = get_field('tipo_destaque_homepage');
        }

//profissao
        $profissao = get_field('profissao');
        if($profissao)
$profissao = $profissao[0];//First
//End profissao
$image = '';
switch($size){
    case 'small':
    $image = get_field('home_image_small');
    break;
    case 'medium':
    $image = get_field('home_image');
    break;
    case 'full':
    $image = get_field('home_image_big');
    break;
}
?>
<div class="block-<?php echo $size; ?> iso-block profissao grid-1-2 <?php echo $fundo_amarelo; ?>" data-old="block-<?php echo $size; ?>">
    <a href="<?php echo str_replace( home_url(), '', get_permalink() ); ?>" class="filter-linker">
        <div class="block-content">
            <div class="image">
                <img alt="<?php echo $image['alt']; ?>" draggable="false" src="<?php echo $image['url'] ?>" />
                <div class="block-hover">
                    <div class="border"></div>
                    <div class="bg"></div>
                </div>
            </div>
            <div class="block-description">
                <div class="block-title">
                    <div class="project-logo">
                        <img class="project-logo-image" src="<?php the_field('imagem', $profissao); ?>" />
                    </div>
                    <h2><?php the_field('home_titulo'); ?></h2>
                    <h3><?php the_field('home_subtitulo'); ?></h3>
                    <div class="hide">
                        <span class="button">
                            <?php dictionary("button_saber_mais") ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
<?php
endforeach;
?>
<?php else:?>
    <div class="block iso-block block-full">
        <div class="not-found">
            <h3>Não foram encontradas profissões!</h3>
        </div>
    </div>
    <script>
        jQuery(document).ready(function( $ ) {
            Edit.contentTotalpages = "1";
        })
    </script>
    <?php
endif;
wp_reset_postdata();
?>
<?php if($totalPages != ''): ?>
    <script>
        jQuery(document).ready(function( $ ) {
            Edit.contentTotalpages = "<?php print(intval($totalPages)); ?>";
        })
    </script>
    <?php endif; ?>