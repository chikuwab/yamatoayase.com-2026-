<?php
?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400..700&amp;display=swap" />
  <link rel="stylesheet" href="/assets/css/main.css?rev=8d58b9cf673d0e41" />
  <link rel="stylesheet" href="/assets/css/fontello/css/fontello.css?rev=8d58b9cf673d0e41" />
  <?php wp_head(); ?>
  <?php echo_meta_description_keywords_tag(); ?>
  <?php echo_meta_og_image_tag(); ?>
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o), m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-39613905-1', 'yamatoayase.com');
    ga('send', 'pageview');
  </script>
</head>

<body>
  <header class="l-header js-header">
    <div class="l-header__inne">
      <div class="l-header__logo"><a class="p-link-logo" href="<?php echo esc_url(home_url('/')) ?>"><img class="p-link-logo__img" src="/assets/img/logo.svg" alt="<?php bloginfo('name'); ?>" /></a></div>
      <div class="l-header__btn">
        <div class="l-header__btn__inner">
          <div class="c-hamburger js-button-hamburger">
            <div class="c-hamburger__inner">
              <div class="c-hamburger__lines"><i class="c-hamburger__line"></i><i class="c-hamburger__line"></i></div>
              <div class="c-hamburger__label">メニュー</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="l-nav l-nav--slide">
    <div class="l-nav__wrap">
      <div class="l-nav__inner">
        <div class="l-nav__nav">
          <nav class="p-nav-global">
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
          <nav class="p-nav-sub u-mg-t40">
            <div class="p-nav-sub__box">
              <div class="p-nav-sub__item"><a class="p-link-sub" href="<?php echo esc_url(home_url('/contact/')) ?>">お問い合わせ</a></div>
              <div class="p-nav-sub__item"><a class="p-link-sub" href="<?php echo esc_url(home_url('/news/')) ?>">お知らせ</a></div>
              <div class="p-nav-sub__item"><a class="p-link-sub" href="<?php echo esc_url(home_url('/member/')) ?>">
                  <div class="p-icon-member">会員ページ</div>
                </a></div>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>