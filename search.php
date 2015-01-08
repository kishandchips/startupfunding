<?php get_header(); ?>

	<div id="results">
		
		<!-- <?php get_template_part('content','pageheader' );  ?> -->

		<div id="article-filters" class="section">
			<div class="container">
				<div class="search">
					<?php get_search_form(); ?>					
				</div>				
			</div>
		</div><!-- #filters -->
		
		<section id="article-list" class="section">
			<div class="inner-container">
				<h2 class="section-heading">
					<?php _e('Search Results for "'. get_search_query() . '" ', 'startup'); ?>
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

				<div id="pagination">
				<?php
					global $wp_query;
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
				</div><!-- .pagination -->
			</div>
		</section><!-- #articles -->

	</div><!-- #results -->

<?php get_footer(); ?>