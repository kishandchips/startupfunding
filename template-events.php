<?php 
/*
	Template Name: Events
*/
?>
<?php get_header(); ?>

	<div id="events">
		
		<?php if(get_field('page_header')): ?>
				<?php get_template_part('content','pageheader' );  ?>
		<?php endif; ?>
		
		<?php if(have_posts()): ?> 
			<?php while(have_posts()): the_post(); ?>

		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full' ); ?>
		
		<header class="image-header" style="background-image:url(<?php echo $image[0]; ?>)">
			
		</header><!-- .image-header -->

			<section class="section">
				<div class="inner-container">
					<h2 class="section-heading">
						<?php the_field('section_heading'); ?>
					</h2>
					<div class="med-font">
						<?php the_field('section_text'); ?>
					</div>
				</div>
			</section><!-- .section -->

			<?php endwhile; ?>
		<?php endif; ?>

		<?php
			$args = array(
				'post_type'   => 'events',
				'post_status' => 'publish',
				'posts_per_page' => 4,
				'order' => 'ASC'
			);
		
			$event_query = new WP_Query( $args );
		?>
		<?php if($event_query->have_posts()): ?>
			<section class="events-heading section">
				<h2 class="subheading">
					<?php _e("Upcoming Events", 'startup'); ?>
				</h2>
			</section>

			<section id="events-list">
				
				<?php while($event_query->have_posts()): $event_query->the_post(); ?>
				<div class="row">
					<a href="<?php the_permalink(); ?>">
						<div class="container">
							<article class="event clearfix">
								<div class="event-image">
									<?php the_post_thumbnail();?>
								</div>
								<div class="event-details">
									<h2 class="event-title">
										<?php the_title(); ?>	
									</h2>
									<div class="event-meta">
										<?php the_field('event_date'); ?> | <?php the_field('event_times', $post->id) ?>
									</div>
									<div class="event-blurb">
										<?php the_excerpt(); ?>
									</div>
								</div>
								<i class="icon-arrow-right" style="color:<?php the_field('event_color'); ?>"></i>
							</article>
						</div>
					</a>
				</div>
				<?php endwhile; ?>

			</section><!-- #events-list -->
		<?php endif; ?>
		<?php wp_reset_query(); ?>

	</div><!-- #events -->

<?php get_footer(); ?>