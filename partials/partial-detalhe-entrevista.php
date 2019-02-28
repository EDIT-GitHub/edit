<?php
/**
* The template for Entrevista Detalhe
*
* @package Edit
*/
?>
<div class="content">
	<!-- HEADER MODULE -->
	<div class="header js-header flex full">
		<div class="header-item entrevista">
			<?php
			$responsiveClass = "";
			if(get_field('fundo_header_responsive') != ''){
				$responsiveClass = "responsive-image";
			}
			?>
			<div class="background <?php echo $responsiveClass; ?>">
				<div class="img" draggable="false" style="background-image:url(<?php the_field('fundo_header');?>)"></div>
				<div class="img-overlay"></div>
				<?php if(get_field('fundo_header_responsive') != ''){ ?>
					<div class="img-smartphone" draggable="false" style="background-image:url(<?php the_field('fundo_header_responsive');?>)"></div>
				<?php } ?>
				<div class="pixels" style="background-image:url(<?php bloginfo('template_url');?>/images/dummy/formacao/header/pixel.png)"></div>
			</div>
			<div class="grid-cont">
				<div class="header-description">
					<div class="square">
						<svg version="1.1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						viewBox="0 0 280 280" enable-background="new 0 0 280 280" xml:space="preserve">
						<polygon fill="#FFFFFF" points="53.9,276 4,276 4,4 276,4 276,49.2 280,49.2 280,0 0,0 0,280 53.9,280 "/>
					</svg>
				</div>
				<div class="summary">
					<h2><?php the_field('titulo'); ?></h2>
					<p class="subtitulo"><?php the_field('subtitulo'); ?></p>
				</div>
				<div class="icon-cont">
					<div class="icon">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						width="50px" height="50px" viewBox="0 0 50 50" enable-background="new 0 0 50 50" xml:space="preserve">
						<path stroke="#FFFFFF" d="M0,0v50h50V0H0z M2,48V12V2h46v46H2 M2,48 M48,48"/>
						<rect x="7" fill="#FFFFFF" y="7" width="36" height="11"/>
						<rect x="7" fill="#FFFFFF" y="23" width="36" height="2"/>
						<rect x="7" fill="#FFFFFF" y="29" width="36" height="2"/>
						<rect x="7" fill="#FFFFFF" y="35" width="36" height="2"/>
						<rect x="7" fill="#FFFFFF" y="41" width="36" height="2"/>
					</svg>
				</div>
				<?php if(get_field('ingles')): ?>
					<span class="icon-label">Interview</span>
					<?php else: ?>
						<span class="icon-label"><?php the_field('tipo'); ?></span>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<script>
		jQuery(document).ready(function( $ ) {
			Edit.modules.collection.push({type:'header',instance:new Edit.modules.smallHeader('.js-header')})
		})
	</script>
</div>
<!-- END HEADER MODULE -->
<!-- ENTREVISTA MODULE -->
	<div class="entrevista pt-50">
	
		<div class="block-content">
		<div class="sticky disable-md">
			<?php
			if ( is_plugin_active( 'clap-post/clap-post.php' ) ):
				$votes = get_post_meta($post->ID, "votes", true);
				$votes = ($votes == "") ? 0 : $votes;
				?>
				<div class="vote hide-md">
					<p class="vote__number vote__number--count-votes"></p>
					<p class="vote__number vote__number--count">
						<?php echo $votes . '&nbsp;votos'; ?>
					</p>
					<?php
					$nonce = wp_create_nonce("user_vote_nonce");
					$link = admin_url('admin-ajax.php?action=user_vote&post_id='.$post->ID.'&nonce='.$nonce);
					?>
					<button class="vote__button vote__button--click no-route" onmousedown="mouseDown()" onmouseup="mouseUp()" data-nonce="<?php echo $nonce; ?>"
						data-post_id="<?php echo $post->ID; ?>">
						<svg class="vote__svg default-state" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60.44 65.06"><path d="M51.8 5.94a1.1 1.1 0 1 0-1.28-1.8l-2.76 2a1.11 1.11 0 0 0 .64 2 1.18 1.18 0 0 0 .6-.24zM44.48 5.31a1.07 1.07 0 0 0 .39.07 1.12 1.12 0 0 0 1-.72l1.23-3.17A1.1 1.1 0 1 0 45 .72l-1.16 3.16a1.11 1.11 0 0 0 .64 1.43zM53.17 10.14h-3.38a1.08 1.08 0 0 0-1.09 1.09 1.12 1.12 0 0 0 1.11 1.09l3.38-.06a1.1 1.1 0 0 0 1.09-1.11 1.08 1.08 0 0 0-1.11-1zM52.5 31.82a4.49 4.49 0 0 0-1.94-.9c0-.09.09-.17.13-.26l.44-.44a4.72 4.72 0 0 0 .42-6.22 4.67 4.67 0 0 0-2.73-1.68c.08-.14.14-.28.21-.43a4.7 4.7 0 0 0-.15-5.58 4.64 4.64 0 0 0-2.73-1.68A4.67 4.67 0 0 0 39 8.83a4.42 4.42 0 0 0-.92-2 4.68 4.68 0 0 0-7-.41L14.2 23.24v-1.5a4.65 4.65 0 0 0-9.3-.14L2.62 37.87.78 40A3.27 3.27 0 0 0 1 44.43l2.73 2.73a3.26 3.26 0 0 0 .41 4.09l12.79 12.82a3.23 3.23 0 0 0 2.29 1 3.31 3.31 0 0 0 2-.67l2.68-2.06a25.39 25.39 0 0 0 8.45-4.11c2.65-1.86 5.52-4.33 4.9-3.71l12-12c4.58-4.58 5.08-5.88 5-7.21a4.66 4.66 0 0 0-1.77-3.4zM40.33 10.6a2.47 2.47 0 0 1 3.68.22 2.52 2.52 0 0 1-.25 3.32l-1.14 1.14a4.4 4.4 0 0 0-.5.38A4.67 4.67 0 0 0 38.89 12zm-7.69-2.67a2.47 2.47 0 0 1 3.68.22 2.52 2.52 0 0 1-.25 3.32L17.34 30.06v-1.49A4.65 4.65 0 0 0 15.58 25zM2.51 42.86a1 1 0 0 1 0-1.41l2.26-2.63 2.35-17a2.44 2.44 0 0 1 4.88 0V24a4.66 4.66 0 0 0-4 4.44L5.76 44.7l-.65.76zm45.2-2l-12 12c-1.81 1.81-7.51 6.19-12.51 7.28a.9.9 0 0 0-.42.19l-2.93 2.27a1.06 1.06 0 0 1-.63.21 1 1 0 0 1-.73-.3L5.65 49.69a1 1 0 0 1-.05-1.41l2.26-2.63 2.35-17a2.44 2.44 0 1 1 4.88 0l.11 4a1.14 1.14 0 0 0 1.15 1.11 1.13 1.13 0 0 0 .79-.34l18.64-18.66a2.45 2.45 0 0 1 1.74-.76 2.48 2.48 0 0 1 1.94.93 2.53 2.53 0 0 1-.25 3.33L26.63 30.87a1.2 1.2 0 0 0 0 1.68 1.2 1.2 0 0 0 1.71 0l15.13-15.13a2.45 2.45 0 0 1 1.74-.72 2.49 2.49 0 0 1 1.94.94A2.52 2.52 0 0 1 46.9 21L31.82 36a1.2 1.2 0 0 0 0 1.7 1.17 1.17 0 0 0 .84.35 1.14 1.14 0 0 0 .84-.35l12.63-12.59a2.48 2.48 0 0 1 3.69.22 2.52 2.52 0 0 1-.25 3.32L37 41.2a1.23 1.23 0 0 0 0 1.74 1.13 1.13 0 0 0 .8.33 1.15 1.15 0 0 0 .81-.33l9.16-9.16a2.57 2.57 0 0 1 1.87-.78 2.38 2.38 0 0 1 1.49.51 2.48 2.48 0 0 1 .22 3.68z"/><path fill="none" d="M5.66 4.81h54.78l-5.66 60.25H0L5.66 4.81z"/></svg>
						<svg class="vote__svg active-state" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60.16 64.75"><path d="M51.55 5.91a1.1 1.1 0 0 0-1.27-1.79l-2.75 1.94a1.1 1.1 0 0 0-.26 1.54 1.09 1.09 0 0 0 .9.46 1 1 0 0 0 .63-.2zM44.27 5.28a1.07 1.07 0 0 0 .39.07 1.11 1.11 0 0 0 1-.71l1.18-3.15a1.09 1.09 0 0 0-.61-1.42 1.11 1.11 0 0 0-1.42.64l-1.18 3.15a1.09 1.09 0 0 0 .64 1.42zM52.92 10.09h-3.37a1.07 1.07 0 0 0-1.08 1.08 1.11 1.11 0 0 0 1.1 1.09l3.36-.06A1.09 1.09 0 0 0 54 11.13a1.07 1.07 0 0 0-1.1-1zM52.25 31.67a4.51 4.51 0 0 0-1.93-.9l.13-.25.44-.45a4.65 4.65 0 0 0-2.3-7.9c.07-.14.14-.28.2-.42a4.63 4.63 0 0 0-2.86-7.23 4.65 4.65 0 0 0-7.14-5.73 4.58 4.58 0 0 0-.92-2 4.67 4.67 0 0 0-6.95-.4L14.13 23.13v-1.49a4.63 4.63 0 0 0-9.26-.14L2.61 37.69.78 39.82a3.25 3.25 0 0 0 .16 4.4l2.73 2.71a3.24 3.24 0 0 0 .4 4.07l12.78 12.77a3.2 3.2 0 0 0 2.28.94 3.25 3.25 0 0 0 2-.67L23.76 62a25.18 25.18 0 0 0 8.42-4.09c2.63-1.85 5.49-4.3 4.88-3.69l12-12c4.56-4.56 5.05-5.85 5-7.18a4.66 4.66 0 0 0-1.76-3.38zM40.13 10.55a2.47 2.47 0 0 1 3.67.21 2.51 2.51 0 0 1-.25 3.31l-1.13 1.13a3.83 3.83 0 0 0-.51.39 4.51 4.51 0 0 0-.91-2.05A4.69 4.69 0 0 0 38.71 12zm-7.65-2.66a2.47 2.47 0 0 1 3.66.22 2.51 2.51 0 0 1-.24 3.31l-18.64 18.5v-1.49a4.61 4.61 0 0 0-1.72-3.56zM2.5 42.66a1 1 0 0 1 0-1.4l2.2-2.62L7 21.67a2.43 2.43 0 1 1 4.86 0l.14 2.21a4.63 4.63 0 0 0-4 4.41l-2.27 16.2-.64.75zm45-2l-12 12c-1.8 1.8-7.5 6.16-12.5 7.24a1 1 0 0 0-.41.19l-2.83 2.21a1.06 1.06 0 0 1-.63.21 1 1 0 0 1-.73-.3L5.62 49.45a1 1 0 0 1 0-1.4l2.25-2.62 2.33-17a2.43 2.43 0 0 1 4.86 0l.11 4a1.14 1.14 0 0 0 1.14 1.1 1.11 1.11 0 0 0 .79-.34l18.51-18.5a2.41 2.41 0 0 1 1.73-.69 2.45 2.45 0 0 1 1.93.93 2.51 2.51 0 0 1-.27 3.28L26.51 30.73a1.18 1.18 0 0 0 0 1.67 1.2 1.2 0 0 0 1.69 0l15.06-15.06a2.45 2.45 0 0 1 3.66.22 2.5 2.5 0 0 1-.24 3.3l-15 15a1.19 1.19 0 0 0 0 1.69 1.16 1.16 0 0 0 .84.35 1.14 1.14 0 0 0 .83-.35L45.91 25a2.49 2.49 0 0 1 1.74-.71 2.45 2.45 0 0 1 1.93.93 2.51 2.51 0 0 1-.25 3.31L36.85 41a1.23 1.23 0 0 0 0 1.74 1.13 1.13 0 0 0 1.6 0l9.12-9.11a2.56 2.56 0 0 1 1.82-.76 2.38 2.38 0 0 1 1.49.51 2.45 2.45 0 0 1 .21 3.66z"/><path fill="#fcd81e" d="M40.13 10.55a2.47 2.47 0 0 1 3.67.21 2.51 2.51 0 0 1-.25 3.31l-1.13 1.13a3.83 3.83 0 0 0-.51.39 4.51 4.51 0 0 0-.91-2.05A4.69 4.69 0 0 0 38.71 12zM32.48 7.89a2.47 2.47 0 0 1 3.66.22 2.51 2.51 0 0 1-.24 3.31l-18.64 18.5v-1.49a4.61 4.61 0 0 0-1.72-3.56zM2.5 42.66a1 1 0 0 1 0-1.4l2.2-2.62L7 21.67a2.43 2.43 0 1 1 4.86 0l.14 2.21a4.63 4.63 0 0 0-4 4.41l-2.27 16.2-.64.75z"/><path fill="#fcd81e" d="M47.48 40.67l-12 12C33.7 54.46 28 58.82 23 59.9a1 1 0 0 0-.41.19l-2.83 2.21a1.06 1.06 0 0 1-.63.21 1 1 0 0 1-.73-.3L5.62 49.45a1 1 0 0 1 0-1.4l2.25-2.62 2.33-17a2.43 2.43 0 0 1 4.86 0l.11 4a1.14 1.14 0 0 0 1.14 1.1 1.11 1.11 0 0 0 .79-.34l18.51-18.5a2.41 2.41 0 0 1 1.73-.69 2.45 2.45 0 0 1 1.93.93 2.51 2.51 0 0 1-.27 3.28L26.51 30.73a1.18 1.18 0 0 0 0 1.67 1.2 1.2 0 0 0 1.69 0l15.06-15.06a2.45 2.45 0 0 1 3.66.22 2.5 2.5 0 0 1-.24 3.3l-15 15a1.19 1.19 0 0 0 0 1.69 1.16 1.16 0 0 0 .84.35 1.14 1.14 0 0 0 .83-.35L45.91 25a2.49 2.49 0 0 1 1.74-.71 2.45 2.45 0 0 1 1.93.93 2.51 2.51 0 0 1-.25 3.31L36.85 41a1.23 1.23 0 0 0 0 1.74 1.13 1.13 0 0 0 1.6 0l9.12-9.11a2.56 2.56 0 0 1 1.82-.76 2.38 2.38 0 0 1 1.49.51 2.45 2.45 0 0 1 .21 3.66z"/><path fill="none" d="M5.63 4.79h54.53l-5.64 59.96H0L5.63 4.79z"/></svg>
					</button>
				</div>
			<?php endif; ?>
			
		</div>
      <?php
      get_template_part( 'partials/partial', 'genericblocks');
      ?>
    </div>
  </div>
<?php
if(have_rows('tags')):
	?>
	<div class="block-news-details">
		<div class="bg"></div>
		<div class="grid-cont">
			<div class="tags">
				<?php
				while ( have_rows('tags') ):
					the_row(); ?>
					<a href="/?s=<?php the_sub_field('tag'); ?>" class="tag no-route">
						<span></span><?php the_sub_field('tag'); ?></a>
						<?php
					endwhile;
					?>
				</div>
			</div>
			<?php
		endif;
    ?>
    <?php
            if ( is_plugin_active( 'clap-post/clap-post.php' ) ):
            $votes = get_post_meta($post->ID, "votes", true);
            $votes = ($votes == "") ? 0 : $votes;
        ?>

        <div class="vote vote--show-md d-none m-auto">
        <p class="vote__number vote__number--count-votes"></p>
        <p class="vote__number vote__number--count">
                <?php echo $votes . '&nbsp;votos'; ?>
        </p>
        <?php
            $nonce = wp_create_nonce("user_vote_nonce");
            $link = admin_url('admin-ajax.php?action=user_vote&post_id='.$post->ID.'&nonce='.$nonce);
        ?>
        <a class="vote__button vote__button--click no-route" onmousedown="mouseDown()" onmouseup="mouseUp()" data-nonce="<?php echo $nonce; ?>"
            data-post_id="<?php echo $post->ID; ?>" href="<?php echo $link; ?>">
            <svg class="vote__svg default-state" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60.44 65.06"><path d="M51.8 5.94a1.1 1.1 0 1 0-1.28-1.8l-2.76 2a1.11 1.11 0 0 0 .64 2 1.18 1.18 0 0 0 .6-.24zM44.48 5.31a1.07 1.07 0 0 0 .39.07 1.12 1.12 0 0 0 1-.72l1.23-3.17A1.1 1.1 0 1 0 45 .72l-1.16 3.16a1.11 1.11 0 0 0 .64 1.43zM53.17 10.14h-3.38a1.08 1.08 0 0 0-1.09 1.09 1.12 1.12 0 0 0 1.11 1.09l3.38-.06a1.1 1.1 0 0 0 1.09-1.11 1.08 1.08 0 0 0-1.11-1zM52.5 31.82a4.49 4.49 0 0 0-1.94-.9c0-.09.09-.17.13-.26l.44-.44a4.72 4.72 0 0 0 .42-6.22 4.67 4.67 0 0 0-2.73-1.68c.08-.14.14-.28.21-.43a4.7 4.7 0 0 0-.15-5.58 4.64 4.64 0 0 0-2.73-1.68A4.67 4.67 0 0 0 39 8.83a4.42 4.42 0 0 0-.92-2 4.68 4.68 0 0 0-7-.41L14.2 23.24v-1.5a4.65 4.65 0 0 0-9.3-.14L2.62 37.87.78 40A3.27 3.27 0 0 0 1 44.43l2.73 2.73a3.26 3.26 0 0 0 .41 4.09l12.79 12.82a3.23 3.23 0 0 0 2.29 1 3.31 3.31 0 0 0 2-.67l2.68-2.06a25.39 25.39 0 0 0 8.45-4.11c2.65-1.86 5.52-4.33 4.9-3.71l12-12c4.58-4.58 5.08-5.88 5-7.21a4.66 4.66 0 0 0-1.77-3.4zM40.33 10.6a2.47 2.47 0 0 1 3.68.22 2.52 2.52 0 0 1-.25 3.32l-1.14 1.14a4.4 4.4 0 0 0-.5.38A4.67 4.67 0 0 0 38.89 12zm-7.69-2.67a2.47 2.47 0 0 1 3.68.22 2.52 2.52 0 0 1-.25 3.32L17.34 30.06v-1.49A4.65 4.65 0 0 0 15.58 25zM2.51 42.86a1 1 0 0 1 0-1.41l2.26-2.63 2.35-17a2.44 2.44 0 0 1 4.88 0V24a4.66 4.66 0 0 0-4 4.44L5.76 44.7l-.65.76zm45.2-2l-12 12c-1.81 1.81-7.51 6.19-12.51 7.28a.9.9 0 0 0-.42.19l-2.93 2.27a1.06 1.06 0 0 1-.63.21 1 1 0 0 1-.73-.3L5.65 49.69a1 1 0 0 1-.05-1.41l2.26-2.63 2.35-17a2.44 2.44 0 1 1 4.88 0l.11 4a1.14 1.14 0 0 0 1.15 1.11 1.13 1.13 0 0 0 .79-.34l18.64-18.66a2.45 2.45 0 0 1 1.74-.76 2.48 2.48 0 0 1 1.94.93 2.53 2.53 0 0 1-.25 3.33L26.63 30.87a1.2 1.2 0 0 0 0 1.68 1.2 1.2 0 0 0 1.71 0l15.13-15.13a2.45 2.45 0 0 1 1.74-.72 2.49 2.49 0 0 1 1.94.94A2.52 2.52 0 0 1 46.9 21L31.82 36a1.2 1.2 0 0 0 0 1.7 1.17 1.17 0 0 0 .84.35 1.14 1.14 0 0 0 .84-.35l12.63-12.59a2.48 2.48 0 0 1 3.69.22 2.52 2.52 0 0 1-.25 3.32L37 41.2a1.23 1.23 0 0 0 0 1.74 1.13 1.13 0 0 0 .8.33 1.15 1.15 0 0 0 .81-.33l9.16-9.16a2.57 2.57 0 0 1 1.87-.78 2.38 2.38 0 0 1 1.49.51 2.48 2.48 0 0 1 .22 3.68z"/><path fill="none" d="M5.66 4.81h54.78l-5.66 60.25H0L5.66 4.81z"/></svg>
            <svg class="vote__svg active-state" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60.16 64.75"><path d="M51.55 5.91a1.1 1.1 0 0 0-1.27-1.79l-2.75 1.94a1.1 1.1 0 0 0-.26 1.54 1.09 1.09 0 0 0 .9.46 1 1 0 0 0 .63-.2zM44.27 5.28a1.07 1.07 0 0 0 .39.07 1.11 1.11 0 0 0 1-.71l1.18-3.15a1.09 1.09 0 0 0-.61-1.42 1.11 1.11 0 0 0-1.42.64l-1.18 3.15a1.09 1.09 0 0 0 .64 1.42zM52.92 10.09h-3.37a1.07 1.07 0 0 0-1.08 1.08 1.11 1.11 0 0 0 1.1 1.09l3.36-.06A1.09 1.09 0 0 0 54 11.13a1.07 1.07 0 0 0-1.1-1zM52.25 31.67a4.51 4.51 0 0 0-1.93-.9l.13-.25.44-.45a4.65 4.65 0 0 0-2.3-7.9c.07-.14.14-.28.2-.42a4.63 4.63 0 0 0-2.86-7.23 4.65 4.65 0 0 0-7.14-5.73 4.58 4.58 0 0 0-.92-2 4.67 4.67 0 0 0-6.95-.4L14.13 23.13v-1.49a4.63 4.63 0 0 0-9.26-.14L2.61 37.69.78 39.82a3.25 3.25 0 0 0 .16 4.4l2.73 2.71a3.24 3.24 0 0 0 .4 4.07l12.78 12.77a3.2 3.2 0 0 0 2.28.94 3.25 3.25 0 0 0 2-.67L23.76 62a25.18 25.18 0 0 0 8.42-4.09c2.63-1.85 5.49-4.3 4.88-3.69l12-12c4.56-4.56 5.05-5.85 5-7.18a4.66 4.66 0 0 0-1.76-3.38zM40.13 10.55a2.47 2.47 0 0 1 3.67.21 2.51 2.51 0 0 1-.25 3.31l-1.13 1.13a3.83 3.83 0 0 0-.51.39 4.51 4.51 0 0 0-.91-2.05A4.69 4.69 0 0 0 38.71 12zm-7.65-2.66a2.47 2.47 0 0 1 3.66.22 2.51 2.51 0 0 1-.24 3.31l-18.64 18.5v-1.49a4.61 4.61 0 0 0-1.72-3.56zM2.5 42.66a1 1 0 0 1 0-1.4l2.2-2.62L7 21.67a2.43 2.43 0 1 1 4.86 0l.14 2.21a4.63 4.63 0 0 0-4 4.41l-2.27 16.2-.64.75zm45-2l-12 12c-1.8 1.8-7.5 6.16-12.5 7.24a1 1 0 0 0-.41.19l-2.83 2.21a1.06 1.06 0 0 1-.63.21 1 1 0 0 1-.73-.3L5.62 49.45a1 1 0 0 1 0-1.4l2.25-2.62 2.33-17a2.43 2.43 0 0 1 4.86 0l.11 4a1.14 1.14 0 0 0 1.14 1.1 1.11 1.11 0 0 0 .79-.34l18.51-18.5a2.41 2.41 0 0 1 1.73-.69 2.45 2.45 0 0 1 1.93.93 2.51 2.51 0 0 1-.27 3.28L26.51 30.73a1.18 1.18 0 0 0 0 1.67 1.2 1.2 0 0 0 1.69 0l15.06-15.06a2.45 2.45 0 0 1 3.66.22 2.5 2.5 0 0 1-.24 3.3l-15 15a1.19 1.19 0 0 0 0 1.69 1.16 1.16 0 0 0 .84.35 1.14 1.14 0 0 0 .83-.35L45.91 25a2.49 2.49 0 0 1 1.74-.71 2.45 2.45 0 0 1 1.93.93 2.51 2.51 0 0 1-.25 3.31L36.85 41a1.23 1.23 0 0 0 0 1.74 1.13 1.13 0 0 0 1.6 0l9.12-9.11a2.56 2.56 0 0 1 1.82-.76 2.38 2.38 0 0 1 1.49.51 2.45 2.45 0 0 1 .21 3.66z"/><path fill="#fcd81e" d="M40.13 10.55a2.47 2.47 0 0 1 3.67.21 2.51 2.51 0 0 1-.25 3.31l-1.13 1.13a3.83 3.83 0 0 0-.51.39 4.51 4.51 0 0 0-.91-2.05A4.69 4.69 0 0 0 38.71 12zM32.48 7.89a2.47 2.47 0 0 1 3.66.22 2.51 2.51 0 0 1-.24 3.31l-18.64 18.5v-1.49a4.61 4.61 0 0 0-1.72-3.56zM2.5 42.66a1 1 0 0 1 0-1.4l2.2-2.62L7 21.67a2.43 2.43 0 1 1 4.86 0l.14 2.21a4.63 4.63 0 0 0-4 4.41l-2.27 16.2-.64.75z"/><path fill="#fcd81e" d="M47.48 40.67l-12 12C33.7 54.46 28 58.82 23 59.9a1 1 0 0 0-.41.19l-2.83 2.21a1.06 1.06 0 0 1-.63.21 1 1 0 0 1-.73-.3L5.62 49.45a1 1 0 0 1 0-1.4l2.25-2.62 2.33-17a2.43 2.43 0 0 1 4.86 0l.11 4a1.14 1.14 0 0 0 1.14 1.1 1.11 1.11 0 0 0 .79-.34l18.51-18.5a2.41 2.41 0 0 1 1.73-.69 2.45 2.45 0 0 1 1.93.93 2.51 2.51 0 0 1-.27 3.28L26.51 30.73a1.18 1.18 0 0 0 0 1.67 1.2 1.2 0 0 0 1.69 0l15.06-15.06a2.45 2.45 0 0 1 3.66.22 2.5 2.5 0 0 1-.24 3.3l-15 15a1.19 1.19 0 0 0 0 1.69 1.16 1.16 0 0 0 .84.35 1.14 1.14 0 0 0 .83-.35L45.91 25a2.49 2.49 0 0 1 1.74-.71 2.45 2.45 0 0 1 1.93.93 2.51 2.51 0 0 1-.25 3.31L36.85 41a1.23 1.23 0 0 0 0 1.74 1.13 1.13 0 0 0 1.6 0l9.12-9.11a2.56 2.56 0 0 1 1.82-.76 2.38 2.38 0 0 1 1.49.51 2.45 2.45 0 0 1 .21 3.66z"/><path fill="none" d="M5.63 4.79h54.53l-5.64 59.96H0L5.63 4.79z"/></svg>
        </a>
    </div>
    <?php endif; ?>
		<div class="block-share">
			<div class="content-share">
				<div>
					<?php if(get_field('ingles')) : ?>
						Share this post
						<?php else: ?>
							<?php dictionary("QUERO_PARTILHAR_ESTA_PAGINA") ?>
						<?php endif; ?>
						
						<div class="share-icon btn-icon">
							<div class="inner">
								<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
									<path fill="#fff" d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
									c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
									c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z"></path>
								</svg>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			if(get_field('artigos_relacionados')):
				get_template_part( 'partials/partial', 'artigos-relacionados');
			endif;
			?>
			<div class="shareLightbox">
				<div class="btn-close">
					<?php if(get_field('ingles')): ?>
						Share this post
						<?php else: ?>
							<?php dictionary("QUERO_PARTILHAR_ESTA_PAGINA") ?>
						<?php endif; ?>
						
						<div class="icon-close">
							<svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
								<path fill="#fff" d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
								c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
								c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z"></path>
							</svg>
							<svg version="1.0" id="invert" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
								<path fill="#fff" d="M18.639,13.664l-5.656-5.656c-0.586-0.586-1.536-0.586-2.121,0c-0.586,0.586-0.586,1.536,0,2.121l4.733,4.733l-4.733,4.733
								c-0.586,0.586-0.586,1.535,0,2.121c0.293,0.293,0.677,0.439,1.061,0.439s0.768-0.146,1.061-0.439l5.656-5.656
								c0.329-0.329,0.453-0.769,0.413-1.198C19.092,14.433,18.968,13.993,18.639,13.664z"></path>
							</svg>
						</div>
					</div>
					<div class="grid-cont">
						<div class="content-valign">
							<div class="share-content">
								<a href="javascript:Edit.modules.windowpop('https://twitter.com/share?url=<?php the_permalink() ?>',600,400);" target="">
									<div class="icon twitter">
										<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										width="60" height="60" viewBox="-3.5 -3.5 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
										<path fill="#cccccc" d="M25.5,11.81c-0.629,0.27-1.301,0.46-2,0.54c0.721-0.42,1.27-1.1,1.529-1.9c-0.67,0.4-1.42,0.68-2.219,0.83
										c-0.631-0.66-1.541-1.08-2.541-1.08c-1.93,0-3.49,1.54-3.49,3.43c0,0.27,0.03,0.53,0.09,0.79c-2.9-0.15-5.47-1.51-7.19-3.59
										c-0.3,0.51-0.47,1.1-0.47,1.73c0,1.18,0.62,2.24,1.55,2.85c-0.57-0.01-1.11-0.17-1.58-0.43v0.05c0,1.66,1.2,3.05,2.8,3.361
										c-0.29,0.08-0.6,0.119-0.92,0.119c-0.22,0-0.44-0.02-0.65-0.06c0.44,1.36,1.73,2.36,3.25,2.39c-1.19,0.92-2.69,1.46-4.33,1.46
										c-0.28,0-0.56-0.01-0.83-0.04c1.54,0.971,3.38,1.54,5.35,1.54c6.41,0,9.919-5.229,9.919-9.77l-0.01-0.44
										C24.439,13.1,25.029,12.5,25.5,11.81z"/>
									</svg>
								</div>
							</a>
							<a href="javascript:Edit.modules.windowpop('https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>',600,400);" target="">
								<div class="icon facebook">
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									width="60" height="60" viewBox="-3.5 -3.5 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
									<path fill="#cccccc" d="M12.75,14.12h1.82v-1.71c0-0.75,0.02-1.91,0.59-2.63c0.6-0.76,1.41-1.28,2.82-1.28
									c2.299,0,3.27,0.32,3.27,0.32l-0.46,2.6c0,0-0.75-0.21-1.46-0.21s-1.35,0.24-1.35,0.93v1.98h2.911l-0.201,2.55H17.98v8.83h-3.41
									v-8.83h-1.82V14.12z"/>
								</svg>
							</div>
						</a>
						<a href="javascript:Edit.modules.windowpop('https://www.linkedin.com/cws/share?url=<?php the_permalink() ?>',600,400);" target="">
							<div class="icon in">
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								width="60" height="60" viewBox="-3.5 -3.5 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
								<path fill-rule="evenodd" clip-rule="evenodd" fill="#cccccc" d="M25.5,24.65h-3.76v-5.38c0-1.41-0.58-2.37-1.881-2.37
								c-0.989,0-1.539,0.649-1.789,1.28c-0.1,0.22-0.08,0.529-0.08,0.85v5.62h-3.73c0,0,0.05-9.53,0-10.391h3.73v1.63
								c0.22-0.72,1.41-1.729,3.31-1.729c2.351,0,4.2,1.49,4.2,4.71V24.65z M10.5,12.96h-0.02c-1.2,0-1.98-0.8-1.98-1.81
								c0-1.021,0.8-1.801,2.02-1.801c1.23,0,1.98,0.78,2,1.801C12.52,12.16,11.75,12.96,10.5,12.96z M12.24,24.65H8.93V14.26h3.31V24.65z"
								/>
							</svg>
						</div>
					</a>
					<a href="javascript:Edit.modules.windowpop('http://pinterest.com/pin/create/link/?url=<?php the_permalink() ?>',600,400);" target="">
						<div class="icon pinterest">
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							width="60" height="60" viewBox="-4.5 -4.5 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
							<path fill="#cccccc" d="M17,8.5c-4.69,0-8.5,3.8-8.5,8.5c0,3.479,2.09,6.47,5.09,7.78c-0.03-0.59-0.01-1.311,0.15-1.95l1.09-4.63
							c0,0-0.27-0.551-0.27-1.35c0-1.26,0.73-2.2,1.64-2.2c0.77,0,1.14,0.58,1.14,1.28c0,0.78-0.49,1.94-0.75,3.01
							c-0.21,0.91,0.46,1.64,1.35,1.64c1.61,0,2.69-2.069,2.69-4.52c0-1.86-1.25-3.25-3.54-3.25c-2.57,0-4.18,1.92-4.18,4.06
							c0,0.75,0.22,1.27,0.56,1.67c0.16,0.189,0.18,0.26,0.12,0.48l-0.17,0.68c-0.06,0.21-0.23,0.29-0.43,0.21
							c-1.18-0.479-1.74-1.78-1.74-3.25c0-2.41,2.04-5.31,6.08-5.31c3.24,0,5.38,2.35,5.38,4.87c0,3.339-1.86,5.83-4.59,5.83
							c-0.92,0-1.78-0.5-2.07-1.06c0,0-0.5,1.96-0.6,2.34c-0.18,0.649-0.54,1.31-0.86,1.819C15.36,25.37,16.16,25.5,17,25.5
							c4.689,0,8.5-3.81,8.5-8.5C25.5,12.3,21.689,8.5,17,8.5z"/>
						</svg>
					</div>
				</a>
				<a href="javascript:Edit.modules.windowpop('https://plus.google.com/share?url=<?php the_permalink() ?>',600,400);">
					<div class="icon g_plus">
						<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
						width="60" height="60" viewBox="2 2 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
						<g>
							<path fill="#FFFFFF" d="M12.922,20.576c-1.471,0-2.534-0.931-2.534-2.05c0-1.097,1.318-2.009,2.79-1.993
							c0.343,0.004,0.663,0.059,0.953,0.152c0.798,0.557,1.371,0.87,1.533,1.503c0.031,0.128,0.048,0.259,0.048,0.396
							C15.712,19.703,14.991,20.576,12.922,20.576 M13.308,14.016c-0.986-0.03-1.926-1.105-2.096-2.401
							c-0.17-1.298,0.493-2.29,1.48-2.261c0.987,0.03,1.926,1.07,2.096,2.367C14.958,13.018,14.296,14.045,13.308,14.016 M15.356,15.937
							c-0.346-0.246-1.008-0.842-1.008-1.193c0-0.411,0.117-0.613,0.735-1.096c0.634-0.496,1.083-1.192,1.083-2.002
							c0-0.964-0.43-1.904-1.235-2.214h1.215l0.856-0.62H13.17c-1.718,0-3.336,1.302-3.336,2.809c0,1.542,1.172,2.786,2.921,2.786
							c0.121,0,0.239-0.003,0.354-0.011c-0.113,0.216-0.195,0.462-0.195,0.715c0,0.429,0.231,0.776,0.522,1.06
							c-0.219,0-0.432,0.007-0.663,0.007c-2.129,0-3.768,1.356-3.768,2.762c0,1.384,1.797,2.25,3.925,2.25
							c2.426,0,3.767-1.376,3.767-2.762C16.697,17.316,16.37,16.651,15.356,15.937 M20.934,14.128h-1.492v-1.492H18.24v1.492h-1.492
							v1.201h1.492v1.492h1.201V15.33h1.492V14.128z"/>
						</g>
					</svg>
				</div>
			</a>
		</div>
	</div>
</div>
<?php
    /**
     * Detect plugin. For use on Front End only.
     */
    // check for plugin using plugin name
    if ( is_plugin_active( 'clap-post/clap-post.php' ) ): ?>
    <script type="text/javascript">
        /* <![CDATA[ */
        var myAjax = {
            "ajaxurl": "<?php echo admin_url('admin-ajax.php'); ?>"
        };
        /* ]]> */
    </script>
    <script type="text/javascript" src="<?php echo plugins_url();?>/clap-post/voter_script.js?ver=5.0.3"></script>
    <?php endif; ?>

</div>
</div>
<script>
	jQuery(document).ready(function( $ ) {
		<?php
		if(get_next_post()){
			$next_post = get_next_post();
			$next_post_url = get_permalink($next_post->ID);
			$next_post_url = str_replace(home_url(),"",$next_post_url);
		}else{
			$next_post_url = 'undefined';
		}
		if(get_adjacent_post()){
			$prev_post = get_adjacent_post();
			$prev_post_url = get_permalink($prev_post->ID);
			$prev_post_url = str_replace(home_url(),"",$prev_post_url);
		}else{
			$prev_post_url = 'undefined';
		}
		$parent = get_post(13);
		$parent_url = get_permalink($parent->ID);
		$currentUrl = $_SERVER['REQUEST_URI'];
		$arr = explode('?ajax=true',$currentUrl);
		$filter= '';
		if(sizeof($arr) > 1){
			$filter = '?'.$arr[1];
			$filter = str_replace('&inputSobre=0',"",$filter);
			$filter = str_replace('&inputTipo=0',"",$filter);
			$filter = str_replace('&inputArea=0',"",$filter);
			$filter = str_replace('?&',"?",$filter);
		}
								//$parent_url = str_replace(home_url(),"",$parent_url.$filter);
		$meta_query = array('relation' => 'AND');
		$tipo = '';
		$sobre = '';
		$area = '';
		$queryString = '';
		if(isset($_REQUEST['inputTipo'])) {
			$tipo = $_REQUEST['inputTipo'];
			if($queryString == ''){
				$queryString = $queryString . '?inputTipo=' . $tipo;
			}else{
				$queryString = $queryString . '&inputTipo=' . $tipo;
			}
		}
		if(isset($_REQUEST['inputSobre'])) {
			$sobre = $_REQUEST['inputSobre'];
			if($queryString == ''){
				$queryString = $queryString . '?inputSobre=' . $sobre;
			}else{
				$queryString = $queryString . '&inputSobre=' . $sobre;
			}
		}
		if(isset($_REQUEST['inputArea'])) {
			$area = $_REQUEST['inputArea'];
			if($queryString == ''){
				$queryString = $queryString . '?inputArea=' . $area;
			}else{
				$queryString = $queryString . '&inputArea=' . $area;
			}
		}
		if($tipo != '0' && $tipo != ''):
			array_push(
				$meta_query,
				array(
								'key'   => 'tipo', // name of custom field
								'value' => $tipo
							)
			);
		endif;
		
		if($sobre != '0' && $sobre != ''):
			array_push(
				$meta_query,
				array(
								'key' => 'sobre', // name of custom field
								'value' => $sobre
							)
			);
		endif;
		
		if($area != '0' && $area != ''):
			array_push(
				$meta_query,
				array(
								'key' => 'area', // name of custom field
								'value' => '"' . $area . '"',
								'compare' => 'LIKE'
							)
			);
		endif;
		$order = 'ASC';
		$orderBy = 'menu_order';
		$post_type = 'entrevista';
		$postId = $wp_query->post->ID;
		$links = getNextAndPreviousLinks($order,$orderBy,$post_type,$meta_query, $postId, $queryString);
		$parent_url = str_replace(home_url(),"",$parent_url.$queryString);
		?>
		Edit.modules.collection.push({type:'innerNavigation',instance:new Edit.modules.innerNavigation('<?php echo $links['next'];?>','<?php echo $links['prev']; ?>','<?php echo $parent_url; ?>')})
		Edit.pageLoader.totalModules = 1;
		Edit.modules.shareLightbox('.block-share');
		Edit.modules.isoModuleResponsive.init();
	})
</script>