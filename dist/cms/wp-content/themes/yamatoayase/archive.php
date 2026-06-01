<?php
get_header();
$post_type = get_post_type($post);
$post_type_label = esc_html(get_post_type_object(get_post_type())->label);
if (is_tax()) {
	$title = single_term_title('', false);
} else {
	$title = $post_type_label;
}
?>
<h1 id="ttl"><?php echo $title ?></h1>
<div id="main_in" class="inner">
	<?php if (have_posts()) : ?>
		<div class="news-list">
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('template-parts/content', 'list'); ?>
			<?php endwhile; ?>
		</div>
		<?php
		the_posts_pagination(
			array(
				'prev_text' => '&nbsp;',
				'next_text' => '&nbsp;',
			)
		);
		?>
	<?php else : ?>
		<?php get_template_part('template-parts/content-none'); ?>
	<?php endif ?>

</div>
<?php get_footer();
