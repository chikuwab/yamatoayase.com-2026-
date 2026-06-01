<?php
$category = "";
$category_item = "";
$post_type = get_post_type($post);
$taxonomy_terms = get_terms($post_type . '_category'); // タクソノミースラッグを指定
if (empty($taxonomy_terms) && is_wp_error($taxonomy_terms)) return;
?>
<div class="p-block-side">
	<div class="p-block-side__header">
		<h2 class="p-btn-cate p-btn-cate--ttl">カテゴリー</h2>
	</div>
	<div class="p-block-side__list">
		<nav class="p-nav-side">
			<?php foreach ($taxonomy_terms as $term) : ?>
				<a class="p-nav-side__item" href="<?php echo get_term_link($term) ?>"><?php echo $term->name ?></a>
			<?php endforeach; ?>
		</nav>
	</div>
</div>