<?php
get_header();
/*
Template Name: 薬局リスト
*/
?>
<main class="l-main">
  <div class="l-main__header">
    <header class="p-header-primary u-inner">
      <div class="p-header-primary__sub">市民の皆様へ</div>
      <div class="p-header-primary__main">薬局リスト</div>
    </header>
  </div>
  <div class="l-main__contents u-pd-t20">
    <section class="p-section-primary" id="contents">
      <div class="p-section-primary__item u-inner">
        <div class="p-block-search">
          <div class="p-block-search__gmap" id="gmap"></div>
          <div class="p-block-search__buttons">
            <nav class="p-nav-search">
              <div class="p-nav-search__item js-serch-select" data-select="holiday">［ 休日夜間 ］</div>
              <div class="p-nav-search__item js-serch-select" data-select="saigai">［ 災害・進行感染症 ］</div>
              <div class="p-nav-search__item js-serch-select" data-select="zaitaku1">［ 時間外在宅 ］</div>
              <div class="p-nav-search__item js-serch-select" data-select="zaitaku2">［ ターミナルケア・小児在宅 ］</div>
              <div class="p-nav-search__item js-serch-select" data-select="hinin_tyouzai">［ 緊急避妊薬の調剤 ］</div>
              <div class="p-nav-search__item js-serch-select" data-select="hinin_hanbai">［ 緊急避妊薬の販売 ］</div>
            </nav>
            <p class="u-text-center u-mg-t-medium">条件を選択して<span class="u-disp-inb">検索・一覧表示できます。</span><span class="u-disp-inb">詳しくは</span><a href="#note">こちら</a>。</p>
          </div>
          <div class="p-block-search__list js-map-list" id="map-list"></div>
          <div class="p-block-search__notes" id="note">
            <div class="p-block-search__notes-item">
              <div class="p-block-search__notes-label">休日夜間</div>
              <div class="p-block-search__notes-note">
                <p>休日夜間に対応できる薬局</p>
              </div>
            </div>
            <div class="p-block-search__notes-item">
              <div class="p-block-search__notes-label">災害・進行感染症</div>
              <div class="p-block-search__notes-note">
                <p>災害や進行感染症発生時に対応できる薬局</p>
                <p class="u-mg-t-xxs">このリストに掲載している薬局は以下の機能を有する</p>
                <ul class="u-list u-mg-t-xxs">
                  <li>改正感染症法に基づく第二種協定指定医療機関として神奈川県の指定を受けている</li>
                  <li>オンライン服薬指導の対応が可能</li>
                  <li>要指導医薬品・一般用医薬品の取扱</li>
                  <li>体外診断用医薬品 検査キットの取扱</li>
                </ul>
              </div>
            </div>
            <div class="p-block-search__notes-item">
              <div class="p-block-search__notes-label">時間外在宅</div>
              <div class="p-block-search__notes-note">
                <p>急変時等の開局時間外における在宅業務に対応できる薬局</p>
                <ul class="u-list u-mg-t-xxs">
                  <li>休日、夜間における在宅業務の対応が可能</li>
                  <li>医療用麻薬の取扱</li>
                  <li>医療材料、衛生材料の取扱</li>
                </ul>
              </div>
            </div>
            <div class="p-block-search__notes-item">
              <div class="p-block-search__notes-label">ターミナルケア・小児在宅</div>
              <div class="p-block-search__notes-note">
                <p>がん末期などターミナルケア在宅患者、または小児在宅患者などに対応できる薬局</p>
                <ul class="u-list u-mg-t-xxs">
                  <li>休日、夜間における在宅業務の対応が可能</li>
                  <li>医療用麻薬の取扱</li>
                  <li>医療材料、衛生材料の取扱</li>
                  <li>医療用麻薬の規定品目数以上の備蓄および取扱（注射１品目を含む６品目以上）</li>
                  <li>無菌製剤対応（安全キャビネット・クリーンベンチ等）</li>
                  <li>小児在宅患者に対する体制</li>
                  <li>高度管理医療機器販売業の許可</li>
                </ul>
              </div>
            </div>
            <div class="p-block-search__notes-item">
              <div class="p-block-search__notes-label">緊急避妊薬の調剤対応</div>
              <div class="p-block-search__notes-note">
                <p>緊急避妊薬の調剤ができる薬局</p>
              </div>
            </div>
            <div class="p-block-search__notes-item">
              <div class="p-block-search__notes-label">緊急避妊薬の販売対応</div>
              <div class="p-block-search__notes-note">
                <p>緊急避妊薬の販売ができる薬局</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>
<?php get_footer();
