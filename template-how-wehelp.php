<?php 
/*
	Template Name: How We Help
*/
?>
<?php get_header(); ?>

	<div id="help">
		
		<?php if(get_field('page_header')): ?>
				<?php get_template_part('content','pageheader' );  ?>
		<?php endif; ?>
		
		<?php if(have_rows('services')):?> 
			<?php while(have_rows('services')): the_row(); ?>

			<section class="section">
				
				<div class="inner-container center">
					<h2 class="subtitle">
						<?php the_sub_field('service_heading') ?>
					</h2>
					<div class="subtext">
						<?php the_sub_field('service_description') ?>	
					</div>
					<?php if(get_sub_field('service_illustration')): ?>
					<figure class="illustration">
						<?php $image = get_sub_field('service_illustration'); ?>
						<img src="<?php echo $image['url']; ?>" alt="">
					</figure>
					<?php endif; ?>					
				</div>

			</section><!-- .section -->

			<?php endwhile; ?>
		<?php endif; ?>
		
		<?php get_template_part('content','cta' );  ?>

	</div><!-- #help -->

<?php get_footer(); ?>