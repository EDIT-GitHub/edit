<!-- PAGE CONTENT WRAPPER -->
<div class="content">
	<h1 class="hidden-title">Disruptive Digital Education</h1>
    <?php get_template_part( 'partials/partial', 'slider' ); ?>
</div>
<script>
    // If exists n+ modules of isomodule call:
    jQuery(document).ready(function( $ ) {
        Edit.pageLoader.totalModules= <?php echo $modulesCount; ?>;
        Edit.modules.isoModuleResponsive.init();
    })
</script>
