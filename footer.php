</main><!-- #joebudden -->

<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="logo column col-1-5">
                <a href="<?php echo bloginfo('url'); ?> ">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo-symbol.png" alt="">
                </a>
			</div>
			<div class="sitemap column col-2-5">
				<nav>
	                <?php 
	                    $args = array('theme_location' => 'footer_menu', 'menu' => '', 'container' => '');
	                    wp_nav_menu( $args ); 
	                ?>   
				</nav>
			</div>
			<div class="footer-info column col-2-5">
				<div class="address">
					<?php the_field('address','options'); ?>	
				</div>
				
				<div class="social">
					<?php if(have_rows('social_networks','options')): while(have_rows('social_networks','options')): the_row(); ?>
						<a href="<?php the_sub_field('social_url', 'options'); ?>" target="_blank">
							<i class="icon-<?php the_sub_field('social_icon', 'options'); ?>" alt=""></i>
						</a>
					<?php endwhile;endif; ?>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>