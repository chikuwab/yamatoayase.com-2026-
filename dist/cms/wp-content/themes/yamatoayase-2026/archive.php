<?php
get_header();
// $post_type = get_post_type($post);
$post_type_obj = get_post_type_object(get_post_type());
$post_type_label = esc_html($post_type_obj->label);
$post_type_name = esc_html($post_type_obj->name);
?>
<main class="l-main">
  <div class="l-main__header">
    <header class="p-header-primary u-inner">
      <div class="p-header-primary__sub"><?php echo ucfirst($post_type_name); ?></div>
      <div class="p-header-primary__main"><?php echo $post_type_label ?></div>
    </header>
  </div>
  <div class="l-main__contents u-pd-t20">
    <section class="p-section-primary">
      <div class="p-section-primary__item u-inner-wide">
        <?php if (is_tax()): ?>
          <div class="u-mg-b-small">
            <h1 class="u-font18 u-font-w500 u-text-center"><?php echo single_term_title('', false); ?></h1>
          </div>
        <?php endif ?>
        <?php if (have_posts()) : ?>
          <div class="p-block-news-list">
            <?php while (have_posts()) : the_post(); ?>
              <?php get_template_part('template-parts/content', 'list'); ?>
            <?php endwhile; ?>
          </div>
          <div class="u-mg-t-section-small">
            <?php
            the_posts_pagination(
              array(
                'prev_text' => '&nbsp;',
                'next_text' => '&nbsp;',
              )
            );
            ?>
          </div>
        <?php else : ?>
          <div class="u-mg-t-section-small">
            <?php get_template_part('template-parts/content-none'); ?>
          </div>
        <?php endif ?>
    </section>
  </div>
</main>

<?php get_footer();
