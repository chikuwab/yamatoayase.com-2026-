<?php
get_header();
?>
<div class="p-section">
	<section class="p-section__item p-section__item--bread">
		<div class="p-bread u-inner">
			<?php if (function_exists('bcn_display')) {
				bcn_display();
			} ?>
		</div>
	</section>

	<section class="p-section__item">
		<div class="u-inner">
			<?php get_template_part('template-parts/content');
			?>
		</div>
	</section>

</div>
<?php get_footer();
