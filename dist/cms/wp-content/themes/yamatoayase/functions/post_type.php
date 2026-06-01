<?php
/*
 * カスタム投稿タイプを追加
 */
function create_post_type()
{

	// お知らせ
	register_post_type(
		'news',
		array(
			'label' => 'お知らせ',
			'public' => true,
			'has_archive' => true,
			'menu_position' => 1,
			'rewrite' => array('slug' => 'news'),
			'supports' => ['title', 'editor', 'revisions', 'thumbnail'],
			'description' => '',
			'show_in_rest' => true,
		)
	);
	// register_taxonomy(
	// 	'news_category',
	// 	'news',
	// 	array(
	// 		'label' => 'カテゴリー',
	// 		'labels' => array(
	// 			'all_items' => 'カテゴリー一覧',
	// 			'add_new_item' => 'カテゴリーを追加'
	// 		),
	// 		'rewrite' => array('slug' => 'category'),
	// 		'hierarchical' => true,
	// 		'show_in_rest' => true,
	// 	)
	// );
	// register_taxonomy(
	// 	'news_tag',
	// 	'news',
	// 	array(
	// 		'label' => 'タグ',
	// 		'labels' => array(
	// 			'all_items' => 'タグ一覧',
	// 			'add_new_item' => 'タグを追加'
	// 		),
	// 		'rewrite' => array('slug' => 'tag'),
	// 		'hierarchical' => false,
	// 		'show_in_rest' => true,
	// 	)
	// );
}
add_action('init', 'create_post_type'); // アクションに上記関数をフックします


//カスタム投稿タイプを変更した際は下記リセット処理を実行
// global $wp_rewrite;
// $wp_rewrite->flush_rules();
