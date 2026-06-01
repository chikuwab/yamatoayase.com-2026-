<?php
$terms = get_the_terms(get_the_ID(), 'news_category');
$term = "";
if (! empty($terms) && ! is_wp_error($terms)) {
  $term = $terms[0]->name;
}
?>
<a class="p-block-news-list__item" href="<?php the_permalink() ?>">
  <div class="p-block-news-list__date"><?php the_time('Y年n月j日'); ?></div>
  <div class="p-block-news-list__category"><?php echo $term; ?></div>
  <div class="p-block-news-list__title"><?php the_title(); ?></div>
</a>