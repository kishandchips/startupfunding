<?php 
/*
	Template Name: About Us
*/
?>
<?php get_header(); ?>

	<div id="about">
		
		<?php if(get_field('page_header')): ?>
				<?php get_template_part('content','pageheader' );  ?>
		<?php endif; ?>

			<?php if(have_rows('sections')): while(have_rows('sections')): the_row(); ?>

				<?php 
					$layout = get_row_layout(); 
					switch($layout):
					case 'text_area':

					$columns_number = count(get_sub_field('column'));
					if ($columns_number == 2){
						$class = "column col-1-2";
					} else if($columns_number == 3) {
						$class = "column col-1-3";
					} else {
						$class = "column col-full";
					}
				?>

				<?php if(get_sub_field('display_background_image')): ?>
					<?php $image = get_sub_field('background_image'); ?>
					<section class="section bg" style="background-image:url(<?php echo $image['url']; ?>)">
				<?php else: ?>
					<?php $bg_color = get_sub_field('background_color'); ?>
					<section class="section <?php echo $bg_color; ?>">
				<?php endif; ?>

						<div class="inner-container">
							<h2 class="subtitle center">
								<?php the_sub_field('section_title'); ?>	
							</h2>
						</div>

						<?php if(have_rows('column')): ?>
							<?php if($columns_number == 1): ?>
								<div class="inner-container">
							<?php else: ?>
								<div class="container">
							<?php endif; ?>	

									<div class="row">
										<?php while(have_rows('column')): the_row(); ?>

											<div class="subtext <?php echo $class; ?>">
												<?php the_sub_field('text_area'); ?>	
											</div>

										<?php endwhile; ?>									
									</div>

								</div>
						<?php endif; ?>	

					</section><!-- .section -->

				<?php
					break;
					case 'funds':

					$columns_number = count(get_sub_field('column'));
					if ($columns_number == 2){
						$class = "column col-1-2";
					} else if($columns_number == 3) {
						$class = "column col-1-3";
					} else {
						$class = "column col-full";
					}
				?>

					<section class="funds section match-elements">

						<?php if(have_rows('column')): ?>
							<?php if($columns_number == 1): ?>
								<div class="inner-container">
							<?php else: ?>
								<div class="container">
							<?php endif; ?>	

									<div class="row">
										<?php while(have_rows('column')): the_row(); ?>

											<div class="subtext <?php echo $class; ?>">
												<div class="subtext-inner match-height ">
													<?php the_sub_field('text_area'); ?>
												</div>
											</div>

										<?php endwhile; ?>									
									</div>

								</div>
						<?php endif; ?>	

					</section><!-- .section -->

				<?php 
					break;
					case 'team':

					$members_number = count(get_sub_field('members'));
					if ($members_number == 2){
						$class = "column col-1-2";
					} else if($members_number == 3) {
						$class = "column col-1-3";
					} else if($members_number == 4) {
						$class = "column col-1-4";
					} else {
						$class = "column col-full";
					}
				?>

				<?php if(get_sub_field('display_background_image')): ?>
					<?php $image = get_sub_field('background_image'); ?>
					<section class="section bg" style="background-image:url(<?php echo $image['url']; ?>)">
				<?php else: ?>
					<?php $bg_color = get_sub_field('background_color'); ?>
					<section class="section <?php echo $bg_color; ?>">
				<?php endif; ?>

						<div class="inner-container center">
							<h2 class="subtitle">
								<?php the_sub_field('section_title'); ?>	
							</h2>
							<div class="subtext">
								<?php the_sub_field('section_text'); ?>
							</div>
						</div>

						<div class="members container">
						<?php if(have_rows('members')): ?>

							<?php while(have_rows('members')): the_row(); ?>
								<div class="member center <?php echo $class; ?>">
									<?php if(get_sub_field('member_image')): ?>
									<div class="member-image">
										<?php $member_image = get_sub_field('member_image'); ?>
										<img src="<?php echo $member_image['sizes']['custom-thumb']; ?>">
									</div>
									<?php endif; ?>

									<h3 class="member-name">
										<?php the_sub_field('member_name'); ?>
									</h3>
									<div class="member-meta">
										<span><?php the_sub_field('member_title'); ?></span>	
									
										<?php if(have_rows('social_networks')): ?>
												<?php while(have_rows('social_networks')): the_row(); ?>
													<a href="http://<?php the_sub_field('network_link') ?>" title="<?php the_sub_field('network');?>" target="_blank">
														<i class="icon-<?php the_sub_field('network');?>"></i>
													</a>	
												<?php endwhile; ?>
										<?php endif; ?>
									</div>
								</div><!-- .member -->
							<?php endwhile; ?> 

						<?php endif; ?>	
						</div>

					</section><!-- .section -->

				<?php 
					break;
					case 'list':
				?>

					<section class="about-list section">
						<div class="container">
							<?php if(have_rows('list_items')): ?>
								<ul>
									<?php while(have_rows('list_items')): the_row(); ?>
										<li>
											<i class="icon-tick"></i>
											<span>
												<?php the_sub_field('title'); ?>
											</span>
										</li>
									<?php endwhile; ?>							
								</ul>
							<?php endif; ?>							
						</div>
					</section><!-- .section -->

				<?php 
					break;
					default:
				?>

			<?php endswitch; endwhile; endif; ?>
		
		<?php get_template_part('content','cta' );  ?>

	</div><!-- #about -->

<?php get_footer(); ?>