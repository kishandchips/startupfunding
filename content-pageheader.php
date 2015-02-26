<?php 
// Check if it's the posts page.
// Needed to pass the right $post->ID to ACF fields.

if( is_home() ): 

?>

	<?php if(get_field('page_header_display_image', get_option('page_for_posts'))): ?>
		<?php $image = get_field('page_header_background_image', get_option('page_for_posts')); ?>
		<header class="page-header bg" style="background-image:url('<?php echo $image['url'] ?>')">
	<?php else : ?>
		<header class="page-header <?php echo get_field('page_header_background_colour', get_option('page_for_posts')); ?>">
	<?php endif; ?>

		<div class="container">
			<div class="page-header-inner">
				<h1 class="page-heading">
					<?php the_field('page_header_title', get_option('page_for_posts')) ?>
				</h1>

				<?php if(get_field('page_header_display_button', get_option('page_for_posts'))): ?>
					<?php $link = get_field('page_header_button_link', get_option('page_for_posts')); ?>
					<a href="<?php echo $link->guid ?>" class="invert button">
						<?php the_field('page_header_button_text', get_option('page_for_posts')); ?>
					</a>
				<?php endif; ?>					
			</div>
		</div>
	</header>

<?php elseif( is_category() ): ?>
	
		<?php  
			$categoryID = get_query_var('cat');
			$categoryObj = get_category ($categoryID);
			$category = $categoryObj->category_nicename;
		?>
  		
		<header class="page-header <?php echo $category; ?>">

		<div class="container">
			<div class="page-header-inner">
				<h1 class="page-heading">
					<?php _e($categoryObj->name, 'startup'); ?>
				</h1>				
			</div>
		</div>
	</header>

<?php else: ?>

	<?php if(get_field('page_header_display_image')): ?>
		<?php $image = get_field('page_header_background_image'); ?>
		<header class="page-header bg" style="background-image:url('<?php echo $image['url'] ?>')">
	<?php else : ?>
		<header class="page-header <?php echo get_field('page_header_background_colour'); ?>">
	<?php endif; ?>

		<div class="container">
			<div class="page-header-inner">
				<h1 class="page-heading">
					<?php the_field('page_header_title') ?>
				</h1>

				<?php if(get_field('page_header_display_button')): ?>
					<?php $link = get_field('page_header_button_link'); ?>
					<a href="<?php echo $link->guid ?>" class="invert button">
						<?php the_field('page_header_button_text'); ?>
					</a>
				<?php endif; ?>					
			</div>
		</div>
	</header>

<?php endif; ?>