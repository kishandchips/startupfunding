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
		
		
		<?php
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			$args = array(
				'post_type'   => 'startup',
				'post_status' => 'publish',
				'posts_per_page' => 12,
				'paged' => $paged,
			);
		
			$startup_query = new WP_Query( $args );
		 ?>
		 <?php if($startup_query->have_posts()): ?>
		 	<section id="startups-list" class="section alt-section">
		 		<div id="infinity" class="container">
			 		<?php while($startup_query->have_posts()): $startup_query->the_post(); ?>

			 			<article class="column col-1-4">
			 				<div class="inner">
			 					<a href="<?php the_permalink(); ?>">
			 						<div class="valign">
			 							<?php the_post_thumbnail(); ?>
			 						</div>
			 					</a>
			 				</div>
			 			</article>
			 		<?php endwhile; ?>		 			
		 		</div>

				<div class="infinity-nav">
					<?php echo get_next_posts_link('SHOW MORE',$startup_query->max_num_pages) ; ?> 
				</div><!-- #pagination -->
				
			</section><!-- #startups-list -->
		<?php endif; ?>
		<?php wp_reset_query(); ?>



	</div><!-- #startups -->

<?php get_footer(); ?>	