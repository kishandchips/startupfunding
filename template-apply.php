<?php 
/*
	Template Name: Apply
*/
?>
<?php get_header(); ?>

	<div id="apply">
		
		<?php if(have_posts()): ?> 
			<?php while(have_posts()): the_post(); ?>

				<div class="apply-form">
					<?php echo do_shortcode('[gravityform id=2 title=true description=true ajax=true ]' ); ?>						
				</div><!-- .apply-form -->

			<?php endwhile; ?>
		<?php endif; ?>

	</div><!-- #apply\ -->

<?php get_footer(); ?>