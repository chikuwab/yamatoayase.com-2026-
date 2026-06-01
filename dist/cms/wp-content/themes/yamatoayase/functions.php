<?php

$root_path = (!empty($_SERVER['DOCUMENT_ROOT'])) ? $_SERVER['DOCUMENT_ROOT'] : '';

/**
 * アイキャッチ
 */
add_theme_support('post-thumbnails');

/**
 * head不要なコードの削除
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);

/**
 * oEmbed無効化
 */
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');


/*
 * 自動挿入される不要テーマ（CSS、JS）の削除
 */
add_action('wp_enqueue_scripts', 'remove_block_library_style');
function remove_block_library_style()
{
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
}


/**
 * wp_header()にタイトルタグを出力
 */
function titles()
{
	add_theme_support('title-tag');
}
add_action('after_setup_theme', 'titles');

/**
 * タイトル内のセパレートを「-」を「|」に変更する
 */
function nendebcom_title_separator($sep)
{
	$sep = '|';
	return $sep;
}
add_filter('document_title_separator', 'nendebcom_title_separator');


/**
 * タイトルタグ
 */
function remove_title_description($title)
{

	global $post;
	$post_type = get_post_type($post);

	if (is_home() || is_front_page()) {
		unset($title['tagline']);
	}

	if (is_home() || is_front_page()) {
	} elseif (is_tax()) {
		$post_type_label = esc_html(get_post_type_object(get_post_type($post))->label);
		$ttl = wp_strip_all_tags(get_the_archive_title());
		$title['title'] = $ttl;
	} elseif (is_single()) {
		$post_type_label = esc_html(get_post_type_object(get_post_type($post))->label);
		$ttl = wp_strip_all_tags(get_the_title());
	} elseif (is_archive()) {
		$ttl = wp_strip_all_tags(get_the_archive_title());
		$title['title'] = $ttl;
	} elseif (is_search()) {
		$ttl = wp_strip_all_tags(get_the_archive_title());
		$title['title'] = $ttl;
	}
	return $title;
}
add_filter('document_title_parts', 'remove_title_description', 10, 1);


/**
 * description設定
 */
function get_meta_description()
{
	global $post;
	$description = "";
	if (is_single()) {
	} elseif (is_tax()) {
	} elseif (is_front_page() || is_home()) {
		$description = get_bloginfo('description');
	} else {
	}
	return $description;
}

/**
 * keywords設定
 */
// function get_meta_keywords()
// {
// 	global $post;
// 	$keywords = '';


// 	if (is_home() || is_front_page()) {
// 	} elseif (is_page()) {
// 	} elseif (is_archive()) {

// 		// if (is_post_type_archive('column')) {
// 		// } elseif (is_post_type_archive('leadership')) {
// 		// }
// 	} elseif (is_single()) {
// 		$post_type = get_post_type($post);
// 		if (strcmp($post_type, 'column') == 0) { // コラム
// 			$keywords = get_field('keywords', $post->ID);
// 		}
// 	}

// 	return $keywords;
// }


/**
 * keywords、descriptionを出力する
 */
function echo_meta_description_keywords_tag()
{
	echo '<meta name="description" content="' . get_meta_description() . '" />' . "\n";
	// echo '<meta name="keywords" content="' . get_meta_keywords() . '" />' . "\n";
}

/*
 * アーカイブタイトル
 */
/* the_archive_title 余計な文字を削除 */
add_filter('get_the_archive_title', function ($title) {
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_tax()) {
		$title = single_term_title('', false);
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	} elseif (is_date()) {
		$title = get_the_time('Y年n月');
	} elseif (is_search()) {
		$title = '検索結果：' . esc_html(get_search_query(false));
	} elseif (is_404()) {
		$title = '「404」ページが見つかりません';
	} else {
	}
	return $title;
});

/*
 * 抜粋
 */

function my_excerpt_more($more)
{
	return '…';
}
add_filter('excerpt_more', 'my_excerpt_more');

function my_excerpt_length($length)
{
	return 180;
}
add_filter('excerpt_length', 'my_excerpt_length', 999);



/*
 * ページネーションカスタマイズ
 */
function custom_the_posts_pagination($template)
{

	$num = (get_query_var('paged') === 0) ? 1 : get_query_var('paged');

	$template = '
	<nav class="%1$s pagination--page' . $num . '" role="navigation">
		%3$s
	</nav>';
	return $template;
}
add_filter('navigation_markup_template', 'custom_the_posts_pagination');



/*
 * 検索結果ページのURLを変更
 */
// function my_custom_search_url()
// {
// 	if (is_search() && !empty($_GET['s'])) {
// 		wp_safe_redirect(home_url('/search/') . urlencode(get_query_var('s')));
// 		exit();
// 	}
// }
// add_action('template_redirect', 'my_custom_search_url');

/*
 * 投稿の並び順を変更
 */
// function change_sort_order($query)
// {
// 	if (is_admin() || !$query->is_main_query()) {
// 		return;
// 	}

// 	if ($query->is_tax() || $query->is_search()) {
// 		$query->set('order', 'ASC');
// 		$query->set('orderby', 'date');
// 	}
// }
// add_action('pre_get_posts', 'change_sort_order');

/*
 * 検索で投稿タイプを指定
 */
// function SearchFilter($query)
// {
// 	if ($query->is_search) {
// 		$query->set('post_type', 'products');
// 	}
// 	return $query;
// }
// add_filter('pre_get_posts', 'SearchFilter');




/*
 * カラムで表示が崩れるので機能削除
 */
remove_filter('render_block', 'wp_render_layout_support_flag', 10, 2);
remove_filter('render_block', 'gutenberg_render_layout_support_flag', 10, 2);

/*
 * パスワード保護ページの「保護中:」を消す
*/
// add_filter('protected_title_format', 'remove_protected');
// function remove_protected($title)
// {
// 	return '%s';
// }

/*
 * 画像タグのwidth、height属性の削除
*/
function remove_width_attribute($html)
{
	$html = preg_replace('/(width|height)="\d*"\s/', "", $html);
	return $html;
}
add_filter('post_thumbnail_html', 'remove_width_attribute', 10);
add_filter('image_send_to_editor', 'remove_width_attribute', 10);


//リライトルールが作成された時に、数字4桁のURLが年のアーカイブページ扱いになることを無効化する（スラッシュ）
function mycus_year_rewrite_rules_invalid($rules)
{
	unset($rules['exhibition/archive/([0-9]{4})/?$']);
	unset($rules['fes/archive/([0-9]{4})/?$']);
	return $rules;
}
add_filter('rewrite_rules_array', 'mycus_year_rewrite_rules_invalid');



/*
 * テンプレート
 */
function custom_single_template($template)
{
	global $wp_query;
	if ($wp_query->query_vars['post_type'] == 'exhibition' || $wp_query->query_vars['post_type'] == 'fes') {
		$template = dirname(__FILE__) . '/single-fes_exhibition.php';
	}
	return $template;
}
add_filter('single_template', 'custom_single_template');

function custom_archive_template($template)
{
	global $wp_query;
	if ($wp_query->query_vars['post_type'] == 'exhibition' || $wp_query->query_vars['post_type'] == 'fes') {
		$template = dirname(__FILE__) . '/archive-fes_exhibition.php';
	}
	return $template;
}
add_filter('archive_template', 'custom_archive_template');

/*
 * classic-theme.min.cssを削除
 */
add_action('wp_enqueue_scripts', 'remove_classic_theme_style');
function remove_classic_theme_style()
{
	wp_dequeue_style('classic-theme-styles');
}

/*
 * サブルーチンなど
 */
locate_template('functions/lib.php', true);

/*
 * Advanced Custom Fields
 */
locate_template('functions/acf.php', true);

/*
 * カスタム投稿タイプ
 */
locate_template('functions/post_type.php', true);

/*
 * 管理画面関連
 */
locate_template('functions/admin.php', true);
