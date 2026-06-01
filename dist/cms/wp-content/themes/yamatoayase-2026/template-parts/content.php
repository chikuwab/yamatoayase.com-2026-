<?php

$post_type = get_post_type($post);
$has_thumbnail = ($post) ? has_post_thumbnail($post) : has_post_thumbnail();
?>
<article class="news-article">
	<header class="news-article__header">
		<h1 class="news-article__title"><?php the_title(); ?></h1>
		<div class="news-article__date"><?php the_time('Y年n月j日'); ?></div>
		<?php if ($has_thumbnail) : ?>
			<div class="news-article__eyecatch">
				<?php the_post_thumbnail() ?>
			</div>
		<?php endif; ?>
	</header>
	<div class="news-article__entry">
		<?php echo the_content(); ?>
	</div>
	<div class="news-article__footer">
		<div class="news-button">
			<a href="<?php echo get_post_type_archive_link($post_type); ?>" class="news-button__item">一覧に戻る</a>
		</div>
	</div>
</article>