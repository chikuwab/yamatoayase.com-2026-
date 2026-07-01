<?php
get_header();
$query = new WP_Query(array(
  'post_type' => 'news',
  'posts_per_page' => 5,
));
?>
<div class="p-block-fullscreen">
  <div class="p-block-fullscreen__box p-block-fullscreen__box--sp-absolute">
    <div class="p-block-fullscreen__bg"><img class="p-block-fullscreen__img" src="/assets/img/home-visual@2x.webp" srcset="/assets/img/home-visual.webp 1x, /assets/img/home-visual@2x.webp 2x, " alt=""></div>
    <div class="p-block-fullscreen__cont">
      <div class="p-block-fullscreen__logo"><img src="/assets/img/logo-mark.svg" alt=""></div>
      <div class="p-block-fullscreen__copy">
        <p>大和綾瀬薬剤師会は、<br>地域住民の信頼に応え、<br>公衆衛生に寄与いたします。</p>
      </div>
    </div>
  </div>
</div>
<main class="l-main">
  <div class="l-main__contents">
    <section class="p-section-primary">
      <div class="p-section-primary__item u-inner">
        <div class="p-block-editor">
          <p class="u-lh-xl u-lh-sp-medium u-font-xl u-font-sp-large">医療・福祉・介護、そして行政の方々と協働しながら、地域を支える体制づくりを推進し、市民・住民の皆さまが病気になったり体が衰えたりしても、なじみのある綾瀬市・大和市で最後まで安心して暮らせる地域づくり、そして誰にとっても住みやすい街の実現を目指して、大和綾瀬薬剤師会は活動しています。</p>
        </div>
      </div>
    </section>
    <section class="p-section-primary">
      <div class="p-section-primary__item u-inner-wide">
        <nav class="p-nav-global p-nav-global--home">
          <div class="p-nav-global__box">
            <div class="p-nav-global__item p-nav-global__item--title">市民の皆様へ</div>
            <div class="p-nav-global__item"><a class="p-link-gnav" href="<?php echo esc_url(home_url('/emergency/')) ?>">救急医療・休日夜間診療</a></div>
            <div class="p-nav-global__item"><a class="p-link-gnav" href="<?php echo esc_url(home_url('/search/')) ?>">薬局リスト</a></div>
            <div class="p-nav-global__item"><a class="p-link-gnav" href="<?php echo esc_url(home_url('/faq/')) ?>">よくある質問</a></div>
          </div>
          <div class="p-nav-global__box">
            <div class="p-nav-global__item p-nav-global__item--title">医療機関の皆様へ</div>
            <div class="p-nav-global__item"><a class="p-link-gnav" href="<?php echo esc_url(home_url('/membership/')) ?>">入会・変更・退会のご案内</a></div>
            <div class="p-nav-global__item"><a class="p-link-gnav" href="<?php echo esc_url(home_url('/pharmacy-inventory/')) ?>">医薬品在庫情報</a></div>
          </div>
          <div class="p-nav-global__box">
            <div class="p-nav-global__item p-nav-global__item--title">薬剤師会の活動について</div>
            <div class="p-nav-global__item"><a class="p-link-gnav" href="<?php echo esc_url(home_url('/about/')) ?>">薬剤師会紹介</a></div>
            <div class="p-nav-global__item"><a class="p-link-gnav" href="<?php echo esc_url(home_url('/activities/')) ?>">活動内容</a></div>
          </div>
        </nav>
      </div>
    </section>
    <section class="p-section-primary">
      <div class="p-section-primary__item u-inner-wide">
        <div class="p-block-news-list p-block-news-list--home">
          <div class="p-block-news-list__header">
            <h2 class="p-title-primary">お知らせ</h2>
          </div>
          <div class="p-block-news-list__content u-mg-t-small">
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
        </div>
        <div class="p-block-more u-text-right">
          <div class="p-block-more__item">
            <a class="p-link-arrow" href="<?php echo esc_url(home_url('/news/')) ?>">
              <div class="p-link-arrow__item">お知らせ一覧</div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <div class="p-section-primary u-inner">
      <div class="p-section-primary__item">
        <div class="p-block-border">
          <div class="p-block-border__item u-editor">
            <p class="u-text-center u-text-sp-left">夜間、処方箋のお薬の受け取りにお困りの際には夜間当番薬局へご連絡ください。</p>
            <p class="u-text-center">大和市休日・夜間当番薬局<span class="u-disp-inb">TEL：<span class="u-font-w600">046-200-8380</span></span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer();
