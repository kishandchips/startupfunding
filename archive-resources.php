<?php get_header(); ?>

	<div id="archive-resources">
		
		<?php if(get_field('page_header')): ?>
				<?php get_template_part('content','pageheader' );  ?>
		<?php endif; ?>

		<div id="article-filters" class="section">
			<div class="container">
				<div class="search">
					<?php get_search_form(); ?>					
				</div>				
			</div>
		</div><!-- #filters -->


		<section id="resource-list" class="section alt-section">
			<div class="inner-container">
				<h2 class="section-heading">
					<?php _e("Latest Resources", 'startup'); ?>
				</h2>
				<div class="med-font">
					<?php the_field('resources_header_description') ?>
				</div>
			</div>

			<div class="container">
				<?php if(have_posts()): ?>
					<div class="row">
						<?php while(have_posts()): the_post(); ?>

							<article class="column col-1-2">
								<div class="inner">
									<h2 class="title">
										<a href="<?php the_permalink(); ?>" title="<?php the_title ?>">
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
				
				<div id="pagination">
				<?php
					$big = 999999999; // need an unlikely integer

					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $wp_query->max_num_pages,
						'prev_text' => __('Previous'),
						'next_text' => __('Next')
					) );
				?>
				</div><!-- #pagination -->

			</div>
		</section><!-- #resource-list -->

	</div><!-- #archive-resources -->

<?php get_footer(); ?>