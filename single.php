<?php get_header(); ?>

	<div id="single">
		<?php $category = get_the_category(); ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) ); ?>
		
		<header id="single-header" style="background-image:url(<?php echo $image[0]; ?>)">
			
		</header><!-- #single-header -->
		
		<article id="post" <?php if($category): ?>class="<?php echo $category[0]->category_nicename; ?>" <?php endif; ?>>

			<?php while(have_posts()): the_post(); ?>

				<header id="post-header">
					<?php if($category): ?>
					<span class="post-category <?php echo $category[0]->category_nicename ?>">
						<?php echo $category[0]->name; ?>
					</span>
					<?php endif; ?>

					<ul class="social">
						<li>
							<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" title="Share on Facebook" target="_blank">
								<i class="icon-facebook"></i>
							</a>							
						</li>
						<li>
							<a href="http://twitter.com/share?text=<?php the_title(); ?>" title="Share on Twitter" target="_blank">
								<i class="icon-twitter"></i>
							</a>
						</li>
						<li>
							<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode( get_permalink() ); ?>&title=<?php echo urlencode( get_the_title() ); ?>" title="Share on Linkedin" target="_blank">
								<i class="icon-linkedin"></i>
							</a>
						</li>
						<li>
							<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="Share on Google" target="_blank">
								<i class="icon-google"></i>
							</a>
						</li>
					</ul>

					<h2 class="post-title ">
						<?php the_title(); ?>
					</h2>

					<span class="post-date">
						<?php the_time('d F Y'); ?>
					</span>

				</header><!-- #post-header -->
				
				<section id="post-content">
					<?php the_content(); ?>
				</section>

				<ul class="social ">
					<li>
						<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" title="Share on Facebook" target="_blank">
							<i class="icon-facebook"></i>
						</a>							
					</li>
					<li>
						<a href="http://twitter.com/share?text=<?php the_title(); ?>" title="Share on Twitter" target="_blank">
							<i class="icon-twitter"></i>
						</a>
					</li>
					<li>
						<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode( get_permalink() ); ?>&title=<?php echo urlencode( get_the_title() ); ?>" title="Share on Linkedin" target="_blank">
							<i class="icon-linkedin"></i>
						</a>
					</li>
					<li>
						<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="Share on Google" target="_blank">
							<i class="icon-google"></i>
						</a>
					</li>
				</ul>
				
			<?php endwhile; ?>
				
		</article><!-- #post -->
		
		<?php
			$categories = get_the_category($post->ID);
			if ($categories) {
				$category_ids = array();

				foreach($categories as $category){
					$category_ids[] = $category->term_id;	
				} 

			$args=array(
			'category__in' => $category_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page' => 3, // Number of related posts that will be displayed.
			);

			$related = new wp_query( $args );
		?>
		
			<?php if($related->have_posts()):  ?>
				
				<section id="related">

				<h3>
					<?php _e("More Like This", 'startup'); ?>
				</h3>
				<div class="row">
					<?php while($related->have_posts()): $related->the_post(); ?>
						<?php $category = get_the_category(); ?>
						<?php $image= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) ); ?>

						<article class="column col-1-3 <?php echo $category[0]->category_nicename; ?>">
							<div class="inner">
								<div class="related-image" style="background-image:url(<?php echo $image[0]; ?>)">
								</div>
								<span class="related-category">
									<?php echo $category[0]->name; ?>
								</span>
								<div class="meta">
									<h4 class="related-title">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php the_title(); ?>
										</a>
									</h4>
									<div class="related-time">
										<?php the_time('d M Y'); ?>
									</div>
								</div>
							</div>
						</article>
					<?php endwhile; ?>					
				</div>

			<?php endif; ?>

				</section><!-- #related -->

		<?php } ?>
		<?php wp_reset_query();  ?>

	</div><!-- #single-->

<?php get_footer(); ?>