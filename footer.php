</main><!-- #joebudden -->

<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="column col-1-5">
				<div class="logo">
                    <a href="<?php echo bloginfo('url'); ?> ">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo-symbol.png" alt="">
                    </a>
				</div>
			</div>
			<div class="column col-2-5">
				<nav class="sitemap">
	                <?php 
	                    $args = array('theme_location' => 'footer_menu', 'menu' => '', 'container' => '');
	                    wp_nav_menu( $args ); 
	                ?>   
				</nav>
			</div>
			<div class="column col-2-5">
				<?php the_field('address','options'); ?>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>