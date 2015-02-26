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
				<div class="inner-container center">
					<h2 class="subtitle">
						<?php the_field('section_heading'); ?>
					</h2>
					<div class="subtext">
						<?php the_field('section_text'); ?>
					</div>
				</div>
			</section><!-- .section -->

			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>

		<?php
			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			$args = array(
				'post_type'   => 'event',
				'post_status' => 'publish',
				'posts_per_page' => 4,
				'paged' => $paged,
				'order' => 'ASC',
			);
		
			$event_query = new WP_Query( $args );
		?>
		<?php if($event_query->have_posts()): ?>
			<section class="section-heading section center">
				<div class="inner-container">
					<h2 class="subheading">
						<?php _e("Upcoming Events", 'startup'); ?>
					</h2>					
				</div>
			</section>

			<section id="events-list">
				<div id="infinity">
				<?php while($event_query->have_posts()): $event_query->the_post(); ?>
					
					<article class="event">
						<div class="event-excerpt">
							<div class="inner-container">
								<div class="event-image">
									<?php the_post_thumbnail();?>
								</div>
								<div class="event-info">
									<h2 class="event-title">
										<?php the_title(); ?>	
									</h2>
									<div class="event-meta">
										<?php the_field('event_date'); ?> | <?php the_field('event_times', $post->id) ?>
										<?php the_field('event_location'); ?>
									</div>
									<div class="event-blurb">
										<?php the_excerpt(); ?>
									</div>
								</div>
								<i class="icon-arrow-right" style="color:<?php the_field('event_color'); ?>"></i>
							</div>		
						</div>
						<div class="event-full">
							<?php if(have_rows('content_section')):?>
								<header class="section-heading">
									<div class="inner-container">
										<h2 class="subheading">
											<?php _e("Agenda", 'startup'); ?>
										</h2>					
									</div>
								</header>

								<section class="event-details">
	
									<div class="inner-container">

									<?php while(have_rows('content_section')): the_row(); ?>

										<?php 
											$layout = get_row_layout(); 
											switch($layout):
											case 'text_area':
										?>

										<h2><?php the_sub_field('title'); ?></h2>

										<section class="content">
											<?php the_sub_field('text_area'); ?>
										</section>

										<?php 
											break;
											case 'speakers_list':
										?>

										<h2><?php the_sub_field('title'); ?></h2>
											
										<section class="speaker-list content">
											<?php if(have_rows('speakers')): ?>
												<ul>
													<?php while(have_rows('speakers')): the_row(); ?>
														<li>
															<h4><?php the_sub_field('speaker_name'); ?></h4>
															<a href="<?php the_sub_field('speaker_website'); ?>" target="_blank"><?php the_sub_field('speaker_website'); ?></a>											
														</li>
													<?php endwhile; ?>									
												</ul>
											<?php endif; ?>
										</section>

										<?php 
											break;
											default:
										?>

									<?php endswitch; endwhile; ?>

									</div>
								</section><!-- .event-details -->
							<?php endif; ?>

						</div>
					</article><!-- .event -->
						
				<?php endwhile; ?>						
				</div>
				<?php $next_link = get_next_posts_link('SHOW MORE',$event_query->max_num_pages); ?>
				<?php if($next_link): ?>
					<div class="infinity-nav">
	 					<?php echo $next_link; ?>
					</div><!-- #pagination -->
				<?php endif; ?>

			</section><!-- #events-list -->
		<?php endif; ?>
		<?php wp_reset_query(); ?>

	</div><!-- #events -->

<?php get_footer(); ?>