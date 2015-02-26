<?php 
/*
	Template Name: Apply
*/
?>
<?php get_header(); ?>

	<div id="apply">

		<?php if(get_field('page_header')): ?>
				<?php get_template_part('content','pageheader' );  ?>
		<?php endif; ?>
		
		<?php if(have_posts()): ?> 
			<?php while(have_posts()): the_post(); ?>

				<div class="apply-form">
					<?php echo do_shortcode('[gravityform id=2 title=false description=false ajax=true ]' ); ?>
				</div><!-- .apply-form -->

			<?php endwhile; ?>
		<?php endif; ?>

	</div><!-- #apply\ -->

<?php get_footer(); ?>