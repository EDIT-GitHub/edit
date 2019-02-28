<?php
/**
 * The Template for Equipa
 * 
 * @package Edit
 */
?>

<?php 
$curso = '';
$area = '';
?>

<?php 
$offset = '';
$numberOfItens = '-1';
$search = '';
$category = '';
$tag = '';
$include = '';
$exclude = '';
$order = 'DESC';
$orderBy = 'date';
$meta_query = '';
$post_type = 'equipa';
$post_mime_type = '';
$post_parent = '';
$post_status = 'publish';
$supress_filters = '0';

if(isset($_REQUEST['curso']) && $_REQUEST['curso'] != '') {
    $curso = $_REQUEST['curso'];
}

if(isset($_REQUEST['area']) && $_REQUEST['area'] != '') {
    $area = $_REQUEST['area'];
}

$category = $curso . ',' . $area;
$args = array(
    'offset'           => $offset,
    'showposts'        => $numberOfItens,
    's'                => $search,
    'category'         => $category,
    'tag'              => $tag,
    'include'          => $include,
    'exclude'          => $exclude,
    'order'            => $order,
    'orderby'          => $orderBy,
    'meta_query'       => $meta_query,
    'post_type'        => $post_type,
    'post_mime_type'   => $post_mime_type,
    'post_parent'      => $post_parent,
    'post_status'      => $post_status,
    'suppress_filters' => $supress_filters
);

$myposts = get_posts($args);

if($myposts):
    $counter = 1;
?>

<?php 
    foreach($myposts as $post):  
?>

<?php 
        if($counter == 2):
            $counter = -1;
        endif;
        $counter++;
    endforeach;
?>
<?php endif; ?>

<script>
    var numberOfArticles = <?php echo count($myposts); ?>;
</script>
