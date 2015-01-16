<?php get_header(); ?>

	<div id="single-event">
		
		<?php if(have_posts()): while(have_posts()): the_post(); ?>
			<section id="event-info" class="section">
				<div class="inner-container">
					<div class="event-details">
						<div class="event-image">
							<?php the_post_thumbnail(); ?>	
						</div>

						<h1 class="event-title">
							<?php the_title(); ?>		
						</h1>

						<div class="event-meta">
							<p><?php the_field('event_date'); ?></p>
							<p><?php the_field('event_times'); ?></p>
							<?php the_field('event_location'); ?>
						</div>
					</div>

					<div class="event-description subtext">
						<?php the_content(); ?>	
					</div>			
				</div>
			</section><!-- #event-info -->

			<section class="section-heading">
				<div class="inner-container">
					<h2 class="subheading">
						<?php _e("Agenda", 'startup'); ?>
					</h2>					
				</div>
			</section>

			<?php if(have_rows('content_section')):?>
				<section id="event-agenda" class="section">
					<div class="inner-container">

					<?php while(have_rows('content_section')): the_row(); ?>

						<?php 
							$layout = get_row_layout(); 
							switch($layout):
							case 'text_area':
						?>

						<h2><?php the_sub_field('title'); ?></h2>

						<section class="content">
							<?php the_sub_field('text_area'); ?>
						</section>

						<?php 
							break;
							case 'speakers_list':
						?>

						<h2><?php the_sub_field('title'); ?></h2>
							
						<section class="speaker-list content">
							<?php if(have_rows('speakers')): ?>
								<ul>
									<?php while(have_rows('speakers')): the_row(); ?>
										<li>
											<h4><?php the_sub_field('speaker_name'); ?></h4>
											<a href="<?php the_sub_field('speaker_website'); ?>" target="_blank"><?php the_sub_field('speaker_website'); ?></a>											
										</li>
									<?php endwhile; ?>									
								</ul>
							<?php endif; ?>
						</section>

						<?php 
							break;
							default:
						?>

					<?php endswitch; endwhile; ?>

					</div>
				</section><!-- .event-detail -->
			<?php endif; ?>

		<?php endwhile;endif; ?>

		<section class="section alt-section">
			<div class="inner-container">
				<h2 class="subtitle center">
					<?php _e("Join Us", 'startup'); ?>
				</h2>
				<div class="join-form">
					<?php $original_date = get_field('event_date',$post->ID); ?>
					<?php $event_date = date("d-m-Y", strtotime($original_date)) ?>

					<?php echo do_shortcode('[gravityform id=3 title=false description=false ajax=true field_values=event_date='. $event_date .' ]' ); ?>	
				</div>
			</div>	
		</section>

	</div><!-- #single-event -->

<?php get_footer(); ?>