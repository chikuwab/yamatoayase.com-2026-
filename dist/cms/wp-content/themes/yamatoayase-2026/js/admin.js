// 画像ブロックからスタイルを削除
wp.domReady(function () {
	console.log("ok");
	wp.blocks.unregisterBlockStyle( 'core/image', 'rounded' );
  wp.blocks.unregisterBlockStyle("core/image", "rounded");
  wp.blocks.unregisterBlockStyle("core/image", "default");
});