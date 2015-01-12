<?php 
/*
	Template Name: Contact Us
*/
?>
<?php get_header(); ?>

	<div id="contact">
		
		<?php if(have_posts()): ?> 
			<?php while(have_posts()): the_post(); ?>

			<div id="map">
				<iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=London%20WC1H%208BU%2C%20United%20Kingdom&key=AIzaSyCHQcusxyrL3CHhKQ_Ui_MF78sMeOs84es"></iframe>
			</div><!-- #map -->

			<section class="section">
				<div class="container">
					<div class="row">
						<div class="column col-1-2">
							<h2 class="subheading">
								<?php _e("Make an Enquiry", 'startup'); ?>	
							</h2>
							<p class="med-font"><?php the_field('contact_form_message'); ?></p>
							<div class="contact-form">
								<?php echo do_shortcode('[gravityform id=1 title=false description=true ajax=true ]' ); ?>	
							</div>
						</div>
						<div class="column col-1-2">
							<h2 class="subheading">
								<?php _e("Get in touch", 'startup'); ?>	
							</h2>
							<p class="med-font"><?php the_field('contact_form'); ?></p>
							<div class="details">
								<ul>
									<li>
										<i class="icon-pin"></i>
										<?php the_field('address'); ?>
									</li>
									<li>
										<i class="icon-phone"></i>
										<?php the_field('telephone_number'); ?>
									</li>
									<li>
										<i class="icon-mail"></i>
										<?php the_field('email_address'); ?>
									</li>
								</ul>
							</div>
						</div>
					</div>					
				</div>
			</section><!-- .section -->

			<?php endwhile; ?>
		<?php endif; ?>

	</div><!-- #contact -->

<?php get_footer(); ?>