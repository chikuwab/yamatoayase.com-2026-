<?php



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
  // global $post;
  // $post_type = (empty($post)) ? get_query_var('post_type') : get_post_type($post);
  if (is_home() || is_front_page()) {
    unset($title['tagline']);
  }
  // if (is_home() || is_front_page()) {
  // } elseif (is_tax()) {
  // } elseif (is_singular()) {
  // } elseif (is_archive()) {
  // } elseif (is_search()) {
  // }
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
  if (is_singular()) {
  } elseif (is_front_page() || is_home()) {
    $description = get_bloginfo('description');
  } else {
    $post_type = (is_archive()) ? get_query_var('post_type') : get_post_type($post);
    $post_type_object = get_post_type_object($post_type);
    $description = (!empty($post_type_object->description)) ? $post_type_object->description : $description;
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
/**
 * OG IMAGEを出力する
 */
function echo_meta_og_image_tag()
{
  global $post;
  if (is_singular()) {
    $has_thumbnail = ($post->ID) ? has_post_thumbnail($post->ID) : has_post_thumbnail();
    if ($has_thumbnail) {
      $file = get_the_post_thumbnail_url($post->ID, 'large');
    } else {
      $file = '/assets/img/ogp.webp';
    }
  } else {
    $file = '/assets/img/ogp.webp';
  }
  echo '<meta property="og:image" content="' . $file . '" />' . "\n";
}
