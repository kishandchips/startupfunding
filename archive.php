<?php 
/*
	Template Name: Clubroom Archive
*/
?>
<?php get_header(); ?>

	<div id="archive">
		
		<?php if(get_field('page_header')): ?>
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
			<?php 
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 15,
					'paged' => $paged,
				) 
			?>
			<?php $query = new WP_Query($args); ?>
				<?php if($query->have_posts()): ?>
					<div id="isotope" class="row">
						<?php while($query->have_posts()): $query->the_post(); ?>
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
					$big = 999999999; // need an unlikely integer

					echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('paged') ),
						'total' => $query->max_num_pages,
						'prev_text' => __('Previous'),
						'next_text' => __('Next')
					) );
				?>
				</div><!-- #pagination -->
			</div>
		</section><!-- #article-list -->

	</div><!-- #archive -->

<?php get_footer(); ?>