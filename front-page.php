<?php get_header(); ?>

	<div id="home">

		<?php get_template_part('content','pageheader' ); ?>
		
		<?php if(get_field('display_startups')): ?>
			<section class="startups section">
				<div class="inner-container center">
					<h2 class="subtitle">
						<?php _e("We work with companies like", 'startup'); ?>
					</h2>				
					<p><?php the_field('startup_text') ?></p>
					<a href="<?php bloginfo('url' ); ?>/startups" class="primary button">
						View all startups
					</a>
				</div>
				<div class="container">
					<div class="slider">
						<?php if(have_rows('startup_slider')): while(have_rows('startup_slider')): the_row(); ?>
						<?php $startup = get_sub_field('startup'); ?>
						<div class="slide">
							<div class="inner-container center">
								<figure class="slide-image">
									<a href="<?php echo get_the_permalink($startup->ID); ?>" title="<?php echo get_the_title($startup->ID ); ?>">
										<?php echo get_the_post_thumbnail($startup->ID); ?>
									</a> 
								</figure>							
							</div>
						</div>
						<?php wp_reset_postdata(); ?>
						<?php endwhile;endif; ?>
					</div>				
				</div>
			</section><!-- .startups .section -->			
		<?php endif; ?>

		<?php if(get_field('display_mentors')): ?>
			<section class="mentors section alt-section">
				<div class="inner-container center">
					<h2 class="subtitle">
						<?php _e("Our Mentors", 'startup'); ?>
					</h2>				
					<p><?php the_field('mentors_textarea') ?></p>
					<a href="<?php bloginfo('url' ); ?>/mentors" class="primary button">
						More about our mentors
					</a>
				</div>
				<div class="container center">
					<div class="row">
					<?php if(have_rows('mentors')): ?>
						<?php while(have_rows('mentors')): the_row(); ?>
						<?php $mentor = get_sub_field('mentor') ?>
						
						<div class="mentor column col-1-4">
							<a href="<?php echo get_the_permalink($mentor->ID) ?>" title="<?php echo get_the_title($mentor->ID); ?>">
								<?php echo get_the_post_thumbnail($mentor->ID); ?>

								<h3><?php echo get_the_title($mentor->ID); ?></h3>
								<span class="mentor-cat">
									<?php 
									$terms = get_the_terms( $mentor->ID, 'mentor-category' );
									$categories_array = array();

									foreach ($terms as $term){
										$categories_array[] = $term->name;
									}

									$categories = join(' & ', $categories_array);
									?>

									<?php echo $categories; ?>
								</span>
							</a>
							<?php wp_reset_postdata(); ?>
						</div>

						<?php endwhile; ?>
					<?php endif; ?>
					</div>
				</div>
			</section><!-- .mentors .section -->			
		<?php endif; ?>


		<?php if(get_field('display_events')): ?>
			<?php 
				$args = array(
					'post_type' => 'event',
					'posts_per_page' => 5,
				) 
			?>
			<?php $event_query = new WP_Query($args); ?>
			
			<section class="events section">
				<div class="inner-container center">
					<h2 class="subtitle">
						<?php _e("Our Events", 'startup'); ?>
					</h2>
					<p><?php the_field('upcoming_events_text') ?></p>
					<a href="<?php bloginfo('url' ); ?>/events" class="primary button">
						View All events
					</a>
				</div>
				
				<?php $image = get_field('upcoming_events_image') ?>
				<div class="events-wrapper">
					<div class="events-image" style="background-image:url(<?php echo $image['url']; ?>)">
					</div><!-- .events-image -->

					<div class="events-list">
						<h3 class="subheading">
							<?php _e("Upcoming Events", 'startup'); ?>
						</h3>
						<?php if($event_query->have_posts()): ?>
							<ul>
								<?php while($event_query->have_posts()): $event_query->the_post(); ?>
									<li>
									<a href="<?php echo get_the_permalink($post->ID); ?>">
										<h3>
											<?php the_title(); ?>
										</h3>

										<?php if(get_field('event_date', $post->ID)): ?>
											<p><?php the_field('event_date', $post->ID); ?>	</p>
										<?php endif; ?>

										<i class="icon-arrow-right" style="color:<?php the_field('event_color', $post->ID); ?>"></i>
									</a>
									</li>
								<?php endwhile; ?>							
							</ul>
						<?php endif; ?>
						<?php wp_reset_query(); ?>					
					</div><!-- .events-list -->

				</div>
			</section><!-- .events .section -->
		<?php endif; ?>
		
		<?php if(get_field('display_quotes')): ?>
			<section class="quotes section alt-section" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/slider-bg.jpg)">
				<div class="container">
					<div class="slider">
						<?php if(have_rows('quote_slider')): while(have_rows('quote_slider')): the_row(); ?>
						<div class="slide">
							<div class="inner-container">
								<div class="quote-wrapper">
									<?php $image = get_sub_field('quote_image') ?>
									<img src="<?php echo $image['sizes']['slider'] ?>" alt="">

									<div class="quote-details">
										<h3 class="name"><?php the_sub_field('quote_name') ?></h3>
										<p class="title"><?php the_sub_field('quote_title') ?></p>
										<p class="startup"><?php the_sub_field('quote_startup') ?></p>
										
										<p><?php the_sub_field('quote_text') ?></p>
									</div>

								</div><!-- .quote-wrapper -->
							</div>
						</div>
						<?php endwhile;endif; ?>
					</div>	
				</div>
			</section><!-- .quotes .section -->			
		<?php endif; ?>

		<?php if(get_field('display_posts')): ?>
			<?php 
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 3,
				) 
			?>
			<?php $post_query = new WP_Query($args); ?>

			<section class="posts section">
				<div class="inner-container center">
					<h2 class="subtitle">
						<?php _e("Clubroom", 'startup'); ?>
					</h2>
					<p><?php the_field('clubroom_text') ?></p>
					<a href="<?php bloginfo('url' ); ?>/clubroom" class="primary button">
						Go to clubroom
					</a>
				</div>
				<div class="container">
					<h3 class="subheading">
						<?php _e("Latest from the clubroom", 'startup'); ?>
					</h3>

					<?php if($post_query->have_posts()): ?>
						<div id="article-list">
							<div class="row">
						
								<?php while($post_query->have_posts()): $post_query->the_post(); ?>
									<?php $category = get_the_category(); ?>

									<article class="column col-1-3 <?php echo $category[0]->category_nicename ?>" data-filter=".<?php echo $category[0]->category_nicename ?>">
										<div class="inner">
											<div class="category">
												<?php the_category(); ?>
											</div>
											<h2 class="title">
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
													<?php the_title(); ?>
												</a>
											</h2>
											<div class="date">
												<?php the_time('d M Y'); ?>
											</div>
										</div>
									</article>	
								<?php endwhile; ?>

							</div>
						</div>

					<?php endif; ?>
					<?php wp_reset_query(); ?>

				</div>
			</section><!-- .posts .section -->			
		<?php endif; ?>

		<?php if(get_field('display_startups')): ?>
			<section class="partners section alt-section">
				<div class="inner-container">
					<h2 class="subtitle center">
						<?php _e("Our Partners", 'startup'); ?>
					</h2>				
				</div>
				<div class="inner-container">
					<div class="row">
					<?php if(have_rows('partners')): ?>
						<?php while(have_rows('partners')): the_row(); ?>
						<div class="partner column col-1-4">
			 				<div class="inner">
			 					<a href="<?php the_sub_field('partner_link') ?>">
			 						<div class="valign">
			 							<?php $image = get_sub_field('partner_image'); ?>
										<img src="<?php echo $image['url']; ?>" alt="">
			 						</div>
			 					</a>
			 				</div>
						</div>					
						<?php endwhile; ?>
					<?php endif; ?>
					</div>
				</div>
				
				<p class="center">
					<a href="<?php bloginfo('url'); ?>/contact" class="underline">
						want to become a sponsor
					</a>				
				</p>
			</section><!-- .partners .section -->			
		<?php endif; ?>

	</div><!-- #home -->

<?php get_footer(); ?>