<?php
/*
* 半角英数字
*/
function is_alnum($text)
{
	if (preg_match("/^[a-zA-Z0-9]+$/", $text)) {
		return true;
	} else {
		return false;
	}
}

/*
* 半角数字
*/
function is_num($text)
{
	if (preg_match('/^[0-9]+$/', $text)) {
		return true;
	} else {
		return false;
	}
}

/*
* エスケープ処理
*/
function htmlsc($s)
{
	return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

/*
* スラッグなど取得
*/
function get_page_info($post)
{
	$info['slug'] = "";
	$info['parent_id'] = "";
	$info['parent_slug'] = "";
	if (is_page()) {
		$page = get_post(get_the_ID());
		$info['slug'] = $page->post_name;
		$info['parent_id'] = $post->post_parent;
		$info['parent_slug'] = ($info['parent_id']) ? get_post($info['parent_id'])->post_name : "";
	} elseif (is_home() || is_front_page()) {
	}
	return $info;
}

/**
 * アイキャッチがない場合はNOIMAGE画像を表示
 */
function post_thumbnail_set($size = 'medium', $slug = false, $post_id = null, $noimage = true)
{
	$has_thumbnail = ($post_id) ? has_post_thumbnail($post_id) : has_post_thumbnail();

	if ($has_thumbnail) {
		if (empty($post_id)) {
			return get_the_post_thumbnail_url(get_the_ID(), $size);
		} else {
			return get_the_post_thumbnail_url($post_id, $size);
		}
	} elseif ($noimage) {
		$thumb = "";
		if ($size === 'thumbnail') {
			$thumb = "-thumbnail";
		}
		if ($slug) :
			return get_template_directory_uri() . '/img/noimage_' . $slug . $thumb . '.png';
		else :
			return get_template_directory_uri() . '/img/noimage' . $thumb . '.png';
		endif;
	} else {
		return false;
	}
}

/**
 * 文字抜粋
 */
function excerpt_text($txt, $length = 180)
{
	if (mb_strlen($txt) > $length) {
		return mb_substr($txt, 0, $length) . '…';
	} else {
		return $txt;
	}
}
/**
 * OG TYPE 出力
 */
function og_type()
{
	if (is_home() || is_front_page()) {
		echo "website";
	} else {
		echo "article";
	}
}

/**
 * 言語取得
 */
function is_en()
{
	global $post;
	$page_info = get_page_info($post);
	$post_type = get_post_type($post);

	if (strpos($post_type, "en_") !== false || strpos($page_info['slug'], "en_") !== false) {
		return true;
	} else {
		return false;
	}
}

/**
 * スラッグでURLを取得
 */
function get_url_by_slug($slug)
{
	$page = get_page_by_path($slug);
	return esc_url(get_permalink($page->ID));
}

/**
 * テンプレートURL
 */
function template_url($path)
{
	echo esc_url(get_template_directory_uri() . $path);
}
function get_template_url($path)
{
	return esc_url(get_template_directory_uri() . $path);
}

/**
 * ユニークファイル名
 * キャッシュ対策
 */
function enqueue_file($file)
{
	$ver_file = get_template_directory() . $file;
	$show_file = get_template_directory_uri() . $file;

	echo $show_file . "?ver=" . date('YmdGi', filemtime($ver_file));
}

/**
 * ユニークファイル名
 * キャッシュ対策
 */
function get_file_rev($file)
{
	$ver_file = get_template_directory() . $file;
	if (file_exists($ver_file)) {
		return date('YmdGi', filemtime($ver_file));
	}
}

/**
 * pictureタグの出力
 */
function pictureTag($src, $sp = "", $className = "", $alt = "", $ext = "webp", $bp = "376px")
{
	$template_path = get_template_directory_uri();
	$tag = <<<EOS
<picture class="{$className}">
	<source
		media="(min-width: {$bp})"
		srcset="{$template_path}/assets/img/{$src}.{$ext} 1x, {$template_path}/assets/img/{$src}@2x.{$ext} 2x"
		type="image/{$ext}"
	/>
	<img
		src="{$template_path}/assets/img/{$src}{$sp}.{$ext}"
		alt="{$alt}"
	/>
</picture>
EOS;
	echo $tag;
}
/**
 * figureタグの出力
 */
function figureTag($src, $sp = "", $className = "", $alt = "", $cap = "", $ext = "webp")
{
	$template_path = get_template_directory_uri();
	if ($cap) {
		$cap = '<figcaption>' . $cap . '</figcaption>';
	}
	$tag = <<<EOS
<figure class="{$className}">
	<img
	srcset="{$template_path}/assets/img/{$src}.{$ext} 1x, {$template_path}/assets/img/{$src}@2x.{$ext} 2x"
		src="{$template_path}/assets/img/{$src}.{$ext}"
		alt="${alt}"
	/>
	{$cap}
</figure>
EOS;
	echo $tag;
}
