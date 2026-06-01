<footer class="l-footer js-footer">
  <div class="l-footer__inner u-inner-full">
    <div class="l-footer__box">
      <div class="l-footer__logo"><a href="<?php echo esc_url(home_url('/')) ?>"><img src="/assets/img/logo-vertical.svg" alt="大和綾瀬薬剤師会" /></a></div>
      <div class="l-footer__nav">
        <nav class="p-nav-global p-nav-global--footer">
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
    <div class="l-footer__copy">&copy; Yamato Ayase Pharmaceutical Association.</div>
  </div>
</footer>
<script src="/assets/js/main.bundle.js"></script>
<?php if (is_page('search')): ?>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="/assets/js/map.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKzxOCuVhlbHSX61Pn4ASWLv2KSPiyaZQ&amp;callback=initMap"></script>
  <div class="js-locations"></div>
<?php endif; ?>
<?php wp_footer(); ?>
</body>

</html>