<?php
global $root_path;

$slug = "";
if (is_page()) {
	$page = get_post(get_the_ID());
	$slug = $page->post_name;
}
function get_page_title()
{
	// ページタイトルを取得
	$page_title = wp_get_document_title();
	return $page_title;
}

$post_type = (is_archive()) ? get_query_var('post_type') : get_post_type();

if (is_front_page()) {
	$body_id = "home";
} else {
	$body_id = "";
}

?>
<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head>
	<meta charset="utf-8" />
	<?php include($root_path . '/head.html'); ?>
	<?php wp_head(); ?>
	<?php echo_meta_description_keywords_tag(); ?>
</head>

<body <?php body_class(); ?> id="<?php echo $body_id ?>">
	<?php include($root_path . '/header.html'); ?>
	<div id="wrapper">
		<div id="contents" class="clearfix">
			<div id="main">