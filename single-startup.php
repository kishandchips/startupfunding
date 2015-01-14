<?php get_header(); ?>

	<div id="single-startup">
		
		<header class="section">
			<div class="inner-container center">
				<?php the_post_thumbnail(); ?>	
			</div>
		</header><!-- .section -->
		
		<?php if(have_posts()): while(have_posts()): the_post(); ?>

			<section class="section">
				<div class="inner-container center">
					<h2 class="subtitle">
						<?php the_title(); ?>
					</h2>
					<?php the_content(); ?>			
				</div>
			</section><!-- .section -->
			
			<?php if(have_rows('sections')): while(have_rows('sections')): the_row(); ?>

				<?php 
					$layout = get_row_layout(); 
					switch($layout):
					case 'image_content':
				?>
					<section class="images section clearfix">
						<?php $image_number = count(get_sub_field('images')) ?>
						<?php $size = ($image_number == 1 ? 'full' : 'column col-1-2'); ?>
						<?php if(have_rows('images')): while(have_rows('images')): the_row(); ?>
							<?php $image = get_sub_field('image') ?>
							<div class="image <?php echo $size ?>" style="background-image:url('<?php echo $image['url'] ?>')"></div>
						<?php endwhile;endif; ?>
					</section>
				<?php 
					break;
					case 'information':
				?>
					<section class="description section">
						<div class="inner-container center">
							<?php the_sub_field('text_content') ?>	
						</div>
					</section>
				<?php 
					break;
					case 'video_content':
				?>
					
					<section class="video section">
						<div class="inner-container center">
							<div class="embed-container">
								<?php the_sub_field('video') ?>	
							</div>							
						</div>
					</section>
				<?php 
					break;
					default:
				?>

			<?php endswitch; endwhile; endif; ?>

		<?php endwhile;endif; ?>

		<section class="cta section">
			<div class="inner-container center">
				<h3>
					<?php _e("Find out how we can help your startup", 'startup'); ?>
				</h3>
				
				<a href="<?php bloginfo('url' ); ?>/contact-us" class="primary button">
					<?php _e("Get in touch", 'startup'); ?>
				</a>
			</div>
		</section><!-- .cta -->

	</div><!-- #single-startup -->

<?php get_footer(); ?>