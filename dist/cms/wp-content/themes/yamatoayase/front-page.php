<?php
get_header();
$query = new WP_Query(array(
	'post_type' => 'news',
	'posts_per_page' => 5,
));
?>
<h1>大和綾瀬薬剤師会は、<br />地域住民の信頼に応え、<br />公衆衛生に寄与いたします。</h1>
<div id="main_in" class="inner">
	<h2 class="mi3">
		<span>お知らせ</span>
	</h2>
	<?php if ($query->have_posts()) : ?>
		<div class="news-list">
			<?php while ($query->have_posts()) : $query->the_post(); ?>
				<?php get_template_part('template-parts/content', 'list'); ?>
			<?php endwhile; ?>
		</div>
	<?php else : ?>
		<p>現在、お知らせは準備中です。</p>
	<?php wp_reset_postdata();
	endif; ?>
</div>
<?php get_footer();
