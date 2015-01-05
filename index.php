<?php

get_header(); ?>

	<div id="home" class="content-area">
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<div class="headings">
			<div class="red">
				<h1 class="page-heading">H1 Main Titles - Roboto Slab Light 49px</h1>	
			</div>
			
			<h2 class="section-heading">H2 Main Titles - Roboto Slab Light 36px</h2>
			<h3>Heading H3</h3>
			<h4>Heading H4</h4>
			<h5>Heading H5</h5>
			<h6>Heading H6</h6>

			<h3 class="subheading">SubHeading - Montserrat Bold 18px</h3>

			<p>p Body Copy - Source Sans Regular 18px</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, voluptatem, repudiandae. Ad aspernatur error aliquam sint repudiandae perferendis dignissimos voluptate sed minima accusantium earum porro nihil ipsa, alias. Modi, eaque?
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, voluptatem, repudiandae. Ad aspernatur error aliquam sint repudiandae perferendis dignissimos voluptate sed minima accusantium earum porro nihil ipsa, alias. Modi, eaque?
			</p>			
		</div>	

		<hr>

		<div class="buttons">
			<a href="#" class="primary button large">
				View All Startups
			</a>
			<a href="#" class="primary button">
				View All Startups
			</a>
			<a href="#" class="primary button small">
				View All Startups
			</a>
			
			<a href="#" class="underline">
				Show More
			</a>
		</div>

		<div class="dropdown">
			<select name="select" id="select-dd">
				<option value="0" selected>Show All</option>
				<option value="1">One</option>
				<option value="2">Two</option>
				<option value="3">Three</option>
			</select>
		</div>

		<?php endwhile; endif; ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
