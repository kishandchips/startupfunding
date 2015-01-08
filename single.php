<?php get_header(); ?>

	<div id="single">
		<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID) ); ?>
		
		<header id="single-header" style="background-image:url(<?php echo $thumb[0]; ?>)">
			
		</header><!-- #single-header -->
		
		<article id="content">
			
			<div class="inner">
				<?php while(have_posts()): the_post(); ?>
					<?php $category = get_the_category(); ?>

					<header id="post-header">
						<span class="category <?php echo $category[0]->category_nicename ?>">
							<?php the_category(); ?>
						</span>
						<div class="title"></div>
						<ul class="social-links">
							<li>
								<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" title="Share on Facebook" target="_blank">
									<i class="icon-facebook"></i>
								</a>							
							</li>
							<li>
								<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="Share on Google" target="_blank">
									<i class="icon-google"></i>
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
								<a href="mailto:?&subject=<?php the_title(); ?> by Metis&body=<?php the_permalink(); ?>" title="Share by Email">
									<i class="icon-mail"></i>
								</a>
							</li>
						</ul>
					</header>
					
					<article class="column col-1-3 <?php echo $category[0]->category_nicename ?>" data-filter=".<?php echo $category[0]->category_nicename ?>">
						<div class="inner">
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
		</article><!-- #content -->

	</div><!-- #single-->

<?php get_footer(); ?>