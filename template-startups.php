<?php 
/*
	Template Name: Startups
*/
?>
<?php get_header(); ?>

	<div id="startups">
		
		<?php if(get_field('page_header')): ?>
				<?php get_template_part('content','pageheader' );  ?>
		<?php endif; ?>

		<section class="section">
			<div class="container">
				<div class="slider">
					<?php if(have_rows('slider_content')): while(have_rows('slider_content')): the_row(); ?>
					<div class="slide">
						<div class="inner-container">
							<h2 class="slide-title"><?php the_sub_field('slide_heading') ?></h2>
							<?php the_sub_field('slide_description') ?>
							<figure class="slide-image">
								<?php $image = get_sub_field('slide_image') ?>
								<img src="<?php echo $image['sizes']['slider'] ?>" alt=""> 
							</figure>							
						</div>
					</div>
					<?php endwhile;endif; ?>
				</div>				
			</div>
		</section><!-- .section -->
		
		<section class="startups-list section">
			
		</section><!-- .section -->

	</div><!-- #startups -->

<?php get_footer(); ?>