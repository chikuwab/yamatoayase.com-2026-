<?php


/*
 * 不要項目削除
 */
add_action('admin_menu', 'remove_menus');
function remove_menus()
{
  remove_menu_page('edit.php'); // 投稿
  remove_menu_page('edit-comments.php'); //コメントメニュー
  if (current_user_can('editor')) {
    // remove_menu_page('index.php'); //ダッシュボード
    // remove_menu_page('upload.php'); //メディア
    remove_menu_page('edit.php?post_type=page'); //ページ追加
    remove_menu_page('themes.php'); //外観メニュー
    remove_menu_page('plugins.php'); //プラグインメニュー
    remove_menu_page('tools.php'); //ツールメニュー
    remove_menu_page('options-general.php'); //設定メニュー
    remove_menu_page('edit.php?post_type=mw-wp-form'); // MW WP Form.
    // remove_menu_page('profile.php'); // プロフィール
    // remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag');
  }
}

/*
 * 投稿編集画面で不要な項目を非表示にする
 */
function my_remove_post_support()
{
  // remove_post_type_support('consul','editor');
  // remove_post_type_support('maintenance','editor');
  // remove_post_type_support('design','editor');
  // remove_post_type_support('shouka_shiken','editor');
  // remove_post_type_support('products','editor');
}
add_action('init', 'my_remove_post_support');


/*
 * ツールバー(admin bar)の表示・非表示
 */
add_filter('show_admin_bar', '__return_false');

/*
 * メディアボタンを削除
 */
// function remove_all_media_buttons()
// {
// 	global $pagenow;

// 	if ('post.php' == $pagenow && isset($_GET['post'])) {
// 		$post_type = get_post_type($_GET['post']);
// 		if ($post_type === 'page') return false; // 固定ページを無視
// 	}
// 	remove_all_actions('media_buttons');
// }
// add_action('admin_init', 'remove_all_media_buttons');

/*
 * H1、H3~をCSSで非表示にする
 */
// function add_admin_style()
// {
// 	global $post_type;
// 	if ($post_type === 'information' || $post_type === 'products_documents' || $post_type === 'products') {
// 		echo '<style>.block-library-heading-level-toolbar .components-toolbar-group button:nth-child(n + 3),.block-library-heading-level-toolbar .components-toolbar-group button:nth-child(1){display: none;}</style>';
// 	} else {
// 		return false;
// 	}
// }
// add_action("admin_head", "add_admin_style");

//管理画面の「見出し１」等を削除する
// function custom_editor_settings($initArray)
// {
// 	$initArray['block_formats'] = "段落=p; 見出し2=h2;";
// 	return $initArray;
// }
// add_filter('tiny_mce_before_init', 'custom_editor_settings');


// add_filter('mce_buttons', 'remove_mce_buttons');
// function remove_mce_buttons($buttons)
// {
// 	$remove = array(
// 		// 'formatselect', // フォーマット
// 		// 'bold',         // 太字
// 		'italic',       // イタリック
// 		// 'bullist',      // 番号なしリスト
// 		// 'numlist',      // 番号付きリスト
// 		'blockquote',   // 引用
// 		// 'alignleft',    // 左寄せ
// 		// 'aligncenter',  // 中央揃え
// 		// 'alignright',   // 右寄せ
// 		// 'link',         // リンクの挿入/編集
// 		// 'unlink',       // リンクの削除
// 		'wp_more',      // 「続きを読む」タグを挿入
// 		'wp_adv',       // ツールバー切り替え
// 		'dfw'           // 集中執筆モード
// 	);
// 	return array_diff($buttons, $remove);
// }

// add_filter('mce_buttons_2', 'remove_mce_buttons_2');
// function remove_mce_buttons_2($buttons)
// {
// 	$remove = array(
// 		'strikethrough', // 打ち消し
// 		'hr',            // 横ライン
// 		'forecolor',     // テキスト色
// 		'pastetext',     // テキストとしてペースト
// 		'removeformat',  // 書式設定をクリア
// 		'charmap',       // 特殊文字
// 		'outdent',       // インデントを減らす
// 		'indent',        // インデントを増やす
// 		'undo',          // 取り消し
// 		'redo',          // やり直し
// 		'wp_help'        // キーボードショートカット
// 	);
// 	return array_diff($buttons, $remove);
// }


// 絞り込む機能を追加
// add_action('restrict_manage_posts', 'add_custom_taxonomies_term_filter');
// function add_custom_taxonomies_term_filter()
// {
// 	global $post_type;
// 	if ($post_type == 'products') {
// 		$taxonomy = $post_type . '_category';
// 		wp_dropdown_categories(array(
// 			'show_option_all' => 'すべてのカテゴリー',
// 			// 'orderby' => 'name',
// 			'selected' => get_query_var($taxonomy),
// 			'hide_empty' => 1,
// 			'name' => $taxonomy,
// 			'taxonomy' => $taxonomy,
// 			'value_field' => 'slug',
// 		));
// 	}
// }

/*
 * カスタム投稿の記事一覧に列を追加
 */

// 取扱い製品
// function products_add_columns($columns) // 列の追加
// {
// 	$columns['products_category_columns'] = 'カテゴリー';
// 	// 日付を列の最後に移動
// 	$date = $columns['date'];
// 	unset($columns['date']);
// 	$columns['date'] = $date;
// 	return $columns;
// }
// add_filter('manage_edit-products_columns', 'products_add_columns');

// function products_add_columns_content($column_name, $post_id) // 列の内容を追加
// {
// 	if ($column_name == 'products_category_columns') {
// 		// タームを表示
// 		$my_terms = get_the_terms($post_id, 'products_category');
// 		if ($my_terms && !is_wp_error($my_terms)) {
// 			$draught_links = array();
// 			foreach ($my_terms as $my_term) {
// 				$draught_links[] = $my_term->name;
// 			}
// 			$stitle = join(", ", $draught_links);
// 		}
// 	}

// 	if (isset($stitle) && $stitle) {
// 		echo esc_attr($stitle);
// 	}
// }
// add_action('manage_products_posts_custom_column', 'products_add_columns_content', 10, 2);


/*
 * 管理画面専用のJS
 */
// function mytheme_admin_enqueue() {
// 	wp_enqueue_style( 'my_admin_style', get_stylesheet_directory_uri() . '/admin-style.css' );
// }
// add_action( 'admin_enqueue_scripts', 'mytheme_admin_enqueue' );
//
// add_action('admin_enqueue_scripts', function ($hook_suffix) {
// 	$admin_js_uri = get_template_directory_uri() . "/js/admin.js";
// 	$admin_js_path = get_template_directory() . "/js/admin.js";
// 	wp_enqueue_script("admin-js", $admin_js_uri, ['wp-element', 'wp-editor',], filemtime($admin_js_path));
// });

// function myguten_enqueue()
// {
// 	wp_enqueue_script(
// 		'myguten-script',
// 		plugins_url('block_custom.js', __FILE__),
// 		array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
// 		filemtime(plugin_dir_path(__FILE__) . '/block_custom.js')
// 	);
// }
// add_action('enqueue_block_editor_assets', 'myguten_enqueue');

/*
 * 固定ページでGUTENBERG（ブロックエディタ）を無効化
 */
// add_filter('use_block_editor_for_post_type', 'hide_block_editor', 10, 10);
// function hide_block_editor($use_block_editor, $post_type)
// {
// 	if ($post_type === 'page') return false;
// 	return $use_block_editor;
// }

/**
 * 管理画面スタイル
 */
// function my_admin_style()
// {
// 	wp_enqueue_style('my_admin_style', get_template_directory_uri() . '/admin.css');
// }
// add_action('admin_enqueue_scripts', 'my_admin_style');


/**
 *  メディアを追加でデフォルトで挿入されるwidth/height/classをimgタグから削除 
 */
add_filter('wp_img_tag_add_width_and_height_attr', '__return_false');

/**
 *  Gutenbergのデフォルトブロックを非表示（ホワイトリスト）
 * https://www.nxworld.net/wp-gutenberg-remove-default-block-ver-5-8.html
 */
// add_filter('allowed_block_types_all', function ($allowed_block_types, $block_editor_context) {
// 	$allowed_block_types = [
// 		'core/image',
// 		'core/columns',
// 		'core/paragraph',
// 		'core/heading',
// 		'core/list',
// 		'core/separator',
// 		'core/spacer',
// 		'core/table',
// 		'core/html',
// 		'core/embed',
// 	];
// 	return $allowed_block_types;
// }, 10, 2);


/**
 *  Gutenberg（ブロックエディタ）カスタマイズ
 */
// function add_my_block_editor()
// {
// 	wp_enqueue_script(
// 		'block-script',
// 		get_template_directory_uri() . '/block_custom.js', //JSのパス
// 		array('wp-blocks', 'wp-dom-ready', 'wp-edit-post'),
// 		'1.0.0',
// 		true
// 	);
// }
// add_action('enqueue_block_editor_assets', 'add_my_block_editor');


// register_block_style(
// 	'core/column',
// 	[
// 		'name' => 'empty',
// 		'label' => '空ブロック',
// 	]
// );

/**
 *  Public Post Preview 有効期限を変更
 */
// add_filter('ppp_nonce_life', 'my_nonce_life');
// function my_nonce_life()
// {
// 	return 60 * 60 * 24 * 14; //14日間(秒×分×時間×日数)
// }


function whitelist_block_types($allowed_block_types, $block_editor_context)
{
  $allowed_block_types = array(
    'core/paragraph',
    'core/heading',
    'core/image',
    'core/list', //リスト (text)
    'core/list-item', //リスト項目 (text)
  );
  return $allowed_block_types;
}
add_filter('allowed_block_types_all', 'whitelist_block_types', 10, 2);
