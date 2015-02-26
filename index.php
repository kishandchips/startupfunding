<?php

get_header(); ?>

	<div id="home" class="content-area">
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
