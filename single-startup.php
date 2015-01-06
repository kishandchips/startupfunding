<?php get_header(); ?>

	<div id="single-startup">
		
		<header class="section">
			<?php the_post_thumbnail(); ?>
		</header><!-- .section -->
		
		<?php if(have_posts()): while(have_posts()): the_post(); ?>

			<section class="section alt-section">
				<div class="inner-container">
					<h2>
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
					<section class="section">
						<?php $image_number = count(get_sub_field('images')) ?>
						<?php $size = ($image_number == 1 ? 'full' : 'column col-1-2'); ?>
						<?php if(have_rows('images')): while(have_rows('images')): the_row(); ?>
							<div class="image <?php echo $size ?>"></div>
						<?php endwhile;endif; ?>
					</section>
				<?php 
					break;

					case 'information':
				?>
					<section class="section">
						<?php $image_number = count(get_sub_field('images')) ?>
						<?php $size = ($image_number == 1 ? 'full' : 'column col-1-2'); ?>
						<?php if(have_rows('images')): while(have_rows('images')): the_row(); ?>
							<div class="image <?php echo $size ?>"></div>
						<?php endwhile;endif; ?>
					</section>
				<?php 
					break;

					case 'video_content':
				?>
					<section class="section">
						<?php $image_number = count(get_sub_field('images')) ?>
						<?php $size = ($image_number == 1 ? 'full' : 'column col-1-2'); ?>
						<?php if(have_rows('images')): while(have_rows('images')): the_row(); ?>
							<div class="image <?php echo $size ?>"></div>
						<?php endwhile;endif; ?>
					</section>
									<section class="section">
						<?php $image_number = count(get_sub_field('images')) ?>
						<?php $size = ($image_number == 1 ? 'full' : 'column col-1-2'); ?>
						<?php if(have_rows('images')): while(have_rows('images')): the_row(); ?>
							<div class="image <?php echo $size ?>"></div>
						<?php endwhile;endif; ?>
					</section>
				<?php 
					break;
					default:
				?>

			<?php endswitch; endwhile; endif; ?>

		<?php endwhile;endif; ?>

		<?php get_template_part('content','cta' );  ?>

	</div><!-- #single-startup -->

<?php get_footer(); ?>