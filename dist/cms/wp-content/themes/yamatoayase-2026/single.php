<?php
get_header();
$post_type = get_post_type($post);
$post_type_obj = get_post_type_object(get_post_type());
$post_type_label = esc_html($post_type_obj->label);
$post_type_name = esc_html($post_type_obj->name);

$terms = get_the_terms(get_the_ID(), 'news_category');
$term = "";
if (! empty($terms) && ! is_wp_error($terms)) {
  $term = '<a class="u-mg-l20" href="' . esc_url(get_term_link($terms[0])) . '">' . $terms[0]->name . '</a>';
}

$has_thumbnail = ($post) ? has_post_thumbnail($post) : has_post_thumbnail();

?>
<main class="l-main">
  <div class="l-main__header">
    <header class="p-header-primary u-inner">
      <div class="p-header-primary__sub"><?php echo ucfirst($post_type_name); ?></div>
      <div class="p-header-primary__main"><?php echo $post_type_label ?></div>
    </header>
  </div>
  <div class="l-main__contents u-pd-t50">
    <section class="p-section-primary">
      <div class="p-section-primary__item u-inner">
        <div class="p-block-primary">
          <header class="p-block-primary__header">
            <p><?php the_time('Y年n月j日'); ?><?php echo $term ?></p>
            <h1 class="p-title-secondary u-mg-t-large">
              <div class="p-title-secondary__item"><?php the_title(); ?></div>
            </h1>
          </header>
          <div class="p-block-primary__contents">
            <?php if ($has_thumbnail) : ?>
              <div class="p-block-eyecatch u-mg-b-section-small">
                <div class="p-block-eyecatch__item">
                  <?php the_post_thumbnail() ?>
                </div>
              </div>
            <?php endif; ?>
            <div class="p-block-editor">
              <?php echo the_content(); ?>
            </div>
          </div>
        </div>
        <div class="u-mg-t-section-small">
          <a class="p-link-arrow p-link-arrow--back" href="<?php echo get_post_type_archive_link($post_type); ?>">
            <div class="p-link-arrow__item">一覧に戻る</div>
          </a>
        </div>
      </div>
    </section>
  </div>
</main>
<?php get_footer();
