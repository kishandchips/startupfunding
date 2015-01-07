<?php 
/*
	Template Name: Clubroom
*/
?>
<?php get_header(); ?>

	<div id="clubroom">
		
		<?php if(get_field('page_header')): ?>
				<?php get_template_part('content','pageheader' );  ?>
		<?php endif; ?>

		<div id="filters" class="section">
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
		
		<section id="articles" class="section">
			<div class="inner-container">
				<h2 class="section-heading">
					<?php _e("Latest Articles", 'startup'); ?>
				</h2>				
			</div>
			
			<div class="container">
				<?php 
					$query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 2,));
				?>
				<?php if($query->have_posts()): ?>
					<div id="posts" class="row">
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
				<?php wp_reset_query(); ?>

				<div class="more inner-container">
					<?php $next = get_next_posts_link(); ?>
					<?php echo $next; ?>
					<a href="#" class="arrow"> View All</a>				
				</div>
			</div>
		</section><!-- #articles -->

		<section id="resources" class="section alt-section">
			<div class="inner-container">
				<h2 class="section-heading">
					<?php _e("Latest Resources", 'startup'); ?>
				</h2>
				<div class="med-font">
					<?php the_field('resources_header_description') ?>
				</div>
			</div>

			<div class="container">
				<?php 
					$resources = new WP_Query( array('post_type' => 'resources', 'posts_per_page' => 4,));
				?>
				<?php if($resources->have_posts()): ?>
					<div class="row">
						<?php while($resources->have_posts()): $resources->the_post(); ?>

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
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="arrow"> View Resource</a>
								</div>
							</article>					
							
						<?php endwhile; ?>
					</div>	
				<?php else: ?>						
					
					No Posts

				<?php endif; ?>
				<?php wp_reset_query(); ?>
			</div>
		</section><!-- #resources -->

		<section id="tweet" class="section">
			<div class="inner-container">
				<?php dynamic_sidebar('social' ); ?>					
			</div>
		</section><!-- #tweet -->

	</div><!-- #clubroom -->

<?php get_footer(); ?>