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

						<div class="center">
							<a href="<?php bloginfo('home'); ?>" title="Back to Homepage" class="button primary">Go to homepage</a>	
						</div>
					</div>
				</div><!-- .thank-you -->

			<?php endwhile; ?>
		<?php endif; ?>

	</div><!-- #thanks -->

<?php get_footer(); ?>