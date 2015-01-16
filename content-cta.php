<section class="cta section">
	<div class="inner-container center">
		<h3 class="subtitle">
			<?php the_field('call_to_action_text'); ?>
		</h3>

		<?php $postObject = get_field('call_to_action_button_link'); ?>
		
		<a href="<?php echo $postObject->guid; ?>" class="primary button">
			<?php the_field('call_to_action_button_text'); ?>
		</a>
	</div>
</section><!-- .cta -->