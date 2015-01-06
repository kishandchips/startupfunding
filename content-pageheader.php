<?php if(get_field('page_header_display_image')): ?>
	<?php $image = get_field('page_header_background_image'); ?>
	<header class="page-header bg" style="background-image:url('<?php echo $image['url'] ?>')">
<?php else : ?>
	<header class="page-header <?php echo get_field('page_header_background_colour'); ?>">
<?php endif; ?>

	<div class="container">
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
</header>