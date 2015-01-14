<?php 
/*
	Template Name: Mentors
*/
?>
<?php get_header(); ?>

	<div id="mentors">
		
		<?php if(get_field('page_header')): ?>
				<?php get_template_part('content','pageheader' );  ?>
		<?php endif; ?>
		
		<?php if(have_posts()): ?> 
			<?php while(have_posts()): the_post(); ?>

			<section class="section">
				<div class="inner-container center">
					<h2 class="subtitle">
						<?php the_field('section_heading'); ?>
					</h2>
					<div class="med-font">
						<?php the_field('section_text'); ?>
					</div>
				</div>
			</section><!-- .section -->
			
			<section class="accredited section dblue-section">
				<div class="inner-container center">
					<h2 class="subheading">
						<?php the_field('accredited_text') ?>
					</h2>
					<?php $image = get_field('accredited_image'); ?>
					<img src="<?php echo $image['url']; ?>">
				</div>	
			</section>
			<!-- .section -->

			<?php endwhile; ?>
		<?php endif; ?>

		<?php
			$args = array(
				'post_type'   => 'mentors',
				'post_status' => 'publish',
				'posts_per_page' => 99,
				'order' => 'ASC'
			);
		
			$mentor_query = new WP_Query( $args );
		?>
		<?php if($mentor_query->have_posts()): ?>
			<section id="mentors-list" class="section alt-section match-elements">
				<div class="container">
					<div class="row">

					<?php while($mentor_query->have_posts()): $mentor_query->the_post(); ?>

						<article class="mentor column col-1-3">

							<div class="mentor-image">
								<?php the_post_thumbnail('thumbnail'); ?>	
							</div>

							<div class="inner match-height">

								<h3 class="mentor-title">
									<?php the_title(); ?>
								</h3>

								<span class="mentor-cat">
									<?php 
									$terms = get_the_terms( $post->ID, 'mentor-category' );
									$categories_array = array();
									$categories_links_array = array();

									foreach ($terms as $term){
										$categories_array[] = $term->name;
										$categories_links_array[] = $term->slug;
									}

									$categories = join(' & ', $categories_array);
									?>

									<?php echo $categories; ?>
									<span class="mentor-cat-bar">
										<?php foreach ($categories_links_array as $cat_link): ?>
											<span class="<?php echo $cat_link; ?>">
												
											</span>
										<?php endforeach; ?>
									</span>
								</span>

								<div class="mentor-bio">
									<?php the_content(); ?>
								</div>

								<?php if(have_rows('social_networks')): ?>
									<ul class="mentor-networks social">
										<?php while(have_rows('social_networks')): the_row(); ?>
											<li>
												<a href="<?php the_sub_field('network_link') ?>" title="<?php the_sub_field('network');?>">
													<i class="icon-<?php the_sub_field('network');?>"></i>
												</a>
											</li>
										<?php endwhile; ?>
									</ul>
								<?php endif; ?>

							</div>
						</article>

					<?php endwhile; ?>

					</div>
				</div>
			</section><!-- #mentors-list -->
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		
		<?php get_template_part('content','cta' );  ?>

	</div><!-- #mentors -->

<?php get_footer(); ?>