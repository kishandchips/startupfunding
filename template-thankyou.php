<?php 
/*
	Template Name: Thank you
*/
?>
<?php get_header(); ?>

	<div id="thanks">
		
		<?php if(have_posts()): ?> 
			<?php while(have_posts()): the_post(); ?>

				<div class="thank-you">
					<div class="gform_wrapper">
						<?php the_content(); ?>	
					</div>
				</div><!-- .thank-you -->

			<?php endwhile; ?>
		<?php endif; ?>

	</div><!-- #thanks -->

<?php get_footer(); ?>