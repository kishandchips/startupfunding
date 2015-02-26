<?php get_header(); ?>

	<div id="clubroom">
		
		<?php if(get_field('page_header', get_option('page_for_posts'))): ?>
				<?php get_template_part('content','pageheader' );  ?>
		<?php endif; ?>

		<div id="article-filters" class="section">
			<div class="container">
			 <?php $categories = get_categories(); ?>
		 
				<select>
					<?php foreach ($categories as $category): ?>
						<option value=".<?php echo $category->category_nicename; ?>"><?php echo $category->name; ?></option>
					<?php endforeach; ?>	
				</select>

				<div class="search">
					<?php get_search_form(); ?>					
				</div>				
			</div>
		</div><!-- #filters -->
		
		<section id="article-list" class="section">
			<div class="inner-container center">
				<h2 class="subtitle">
					<?php _e("Latest Articles", 'startup'); ?>
				</h2>				
			</div>
			
			<div class="container">
				<?php if(have_posts()): ?>
					<div id="isotope" class="row">
						<?php while(have_posts()): the_post(); ?>
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
				<?php else: ?>						
					
					No Posts

				<?php endif; ?>
				<?php wp_reset_query(); ?>

				<?php if( wp_count_posts()->publish > get_option('posts_per_page')): ?>
				<div class="more inner-container center">
					<a href="<?php bloginfo('url') ?>/clubroom-archive" class="arrow-right">View All</a>				
				</div>
				<?php endif; ?>
				
			</div>
		</section><!-- #article-list -->

		<?php if(get_field('display_resources', get_option('page_for_posts'))): ?>

			<section id="resource-list" class="section alt-section">
				<div class="inner-container center">
					<h2 class="subtitle">
						<?php _e("Latest Resources", 'startup'); ?>
					</h2>
					<p><?php the_field('resources_header_description', get_option('page_for_posts')) ?></p>
				</div>

				<div class="container">
					<?php 
						$posts_per_page = 4;
						$resources = new WP_Query( array('post_type' => 'resources', 'posts_per_page' => $posts_per_page));
					?>
					<?php if($resources->have_posts()): ?>
						<div class="row">
							<?php while($resources->have_posts()): $resources->the_post(); ?>

								<article class="column col-1-2">
									<div class="inner">
										<h2 class="title">
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
												<?php the_title(); ?>
											</a>
										</h2>
										<div class="excerpt">
											<?php the_excerpt(); ?>
										</div>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="arrow-right"> View Resource</a>
									</div>
								</article>					
								
							<?php endwhile; ?>
						</div>	
					<?php else: ?>						
						
						No Posts

					<?php endif; ?>
					<?php wp_reset_query(); ?>

					<?php if( wp_count_posts('resources')->publish > $posts_per_page): ?>
					<div class="more inner-container center">
						<a href="<?php echo get_post_type_archive_link( 'resources' ); ?>" class="arrow-right"> View All Resources</a>				
					</div>
					<?php endif; ?>

				</div>
			</section><!-- #resource-list -->

		<?php endif; ?>

		<?php if(is_active_sidebar( 'social' )): ?> 
			<section id="tweet" class="section">
				<div class="inner-container center">
					<?php dynamic_sidebar('social' ); ?>					
				</div>
			</section><!-- #tweet -->
		<?php endif; ?>

	</div><!-- #clubroom -->

<?php get_footer(); ?>