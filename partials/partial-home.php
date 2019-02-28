<?php
/**
 * The template for Home
 *
 * @package Edit
 */
?>
<?php
$arguments = array(
  'offset'           => '',
  'showposts'        => '0',
  'order'            => 'ASC',
  'orderby'          => 'menu_order',
  'post_type'        => 'homeblocks',
  'suppress_filters'  => '0'
);
$GLOBALS['homeblocks'] = get_posts( $arguments );
$homeblocks = $GLOBALS['homeblocks'];
$modulesCount = count($homeblocks)-1; //Modules + 1 slider
?>
<!-- PAGE CONTENT WRAPPER -->
<div class="content">
  <h1 class="hidden-title">Disruptive Digital Education</h1>
  <?php
  get_template_part( 'partials/partial', 'slider' );
  get_template_part( 'partials/partial', 'blocoshomepage' );
  ?>
</div>
<script>
// If exists n+ modules of isomodule call:
jQuery(document).ready(function( $ ) {
  Edit.pageLoader.totalModules="<?php echo $modulesCount; ?>";
  Edit.modules.isoModuleResponsive.init();
});
</script>