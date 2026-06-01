<?php
get_header();
$post_type = get_post_type($post);
$post_type_label = esc_html(get_post_type_object(get_post_type())->label);
?>
<h1 id="ttl"><?php echo $post_type_label ?></h1>
<div id="main_in" class="inner">
	<?php get_template_part('template-parts/content'); ?>
</div>

</div>
<?php get_footer();
