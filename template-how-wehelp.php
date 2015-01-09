<?php 
/*
	Template Name: How We Help
*/
?>
<?php get_header(); ?>

	<div id="about">
		
		<?php if(get_field('page_header')): ?>
				<?php get_template_part('content','pageheader' );  ?>
		<?php endif; ?>
		
		<?php if(have_rows('services')): $i = 1; ?> 
			<?php while(have_rows('services')): the_row(); ?>

			<section class="section">
				
				<div class="inner-container">
					<span class="number"><?php echo $i; ?></span>
					<h2 class="subheading">
						<?php the_sub_field('service_heading') ?>
					</h2>
					
					<div class="med-font">
						<?php the_sub_field('service_description') ?>	
					</div>

					<?php if(get_sub_field('service_illustration')): ?>
					<figure>
						<?php $image = get_sub_field('service_illustration'); ?>
						<img src="<?php echo $image['url']; ?>" alt="">
					</figure>
					<?php endif; ?>					
				</div>

			</section><!-- .section -->

			<?php $i++ ?>
			<?php endwhile; ?>
		<?php endif; ?>
		
		<?php get_template_part('content','cta' );  ?>

	</div><!-- #about -->

<?php get_footer(); ?>