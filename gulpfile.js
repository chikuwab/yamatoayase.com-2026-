// gulpプラグインの読み込み
const { src, dest, watch, parallel, lastRun} = require("gulp");
const sass = require("gulp-sass");
const dartSass = require("gulp-dart-sass");
const sassGlob = require("gulp-sass-glob");
const autoprefixer = require("gulp-autoprefixer");
const plumber = require("gulp-plumber");
const cssmin = require('gulp-cssmin');
const notify = require('gulp-notify');
const uglify = require("gulp-uglify");
const rename = require("gulp-rename");
const imagemin = require('gulp-imagemin');
const imageminMozjpeg = require('imagemin-mozjpeg');
const imageminPngquant = require('imagemin-pngquant');
const htmlmin = require('gulp-htmlmin');
const crypto = require('crypto');
const hash = crypto.randomBytes(8).toString('hex');
const webp = require('gulp-webp');
var replace = require('gulp-replace');
var svgSprite = require('gulp-svg-sprite');
const babel = require('gulp-babel');
const webpack = require("webpack");
const webpackStream = require("webpack-stream");
const webpackConfig = require("./webpack.config");
const pug = require('gulp-pug'); // Pug
const htmlbeautify = require('gulp-html-beautify');

const dir_src = "./src";
const dir_dest = "./dist/assets";
const dir_root = "./dist";

/**
 * pugタスク
 */
const pugCompile = () =>
	src([dir_src + "/pug/**/*.pug", "!" + dir_src + "/pug/**/_*.pug"])
	.pipe(plumber({
			errorHandler: notify.onError('Error: <%= error.message %>')
		}))
		// .pipe(filter(function (file) { // _から始まるファイルを除外
		// return !/\/_/.test(file.path) && !/^_/.test(file.relative);
		// }))
		.pipe(pug())
		.pipe(htmlbeautify({
			"indent_size": 2,
      "indent_char": " ",
      "inline": [
        'abbr',
        'area',
        'audio',
        'b',
        'bdi',
        'bdo',
        'button',
        'canvas',
        'cite',
        'code',
        'data',
        'datalist',
        'del',
        'dfn',
        'em',
        'embed',
        'i',
        'iframe',
        'img',
        'input',
        'ins',
        'kbd',
        'label',
        'map',
        'mark',
        'meter',
        'noscript',
        'object',
        'output',
        'picture',
        'progress',
        'q',
        'ruby',
        's',
        'samp',
        'select',
        'slot',
        'small',
        'span',
        'strong',
        'sub',
        'sup',
        'svg',
        'template',
        'textarea',
        'time',
        'u',
        'tt',
        'var',
        'video',
        'wbr'
      ]
    }))
		// .pipe(htmlmin({
		// 	collapseWhitespace : true,
		// 	removeComments : true
		// }))
		.pipe(replace('.css"','.css?rev=' + hash + '"'))
		.pipe(replace('main.bundle.js"','main.bundle.js?rev='  + hash + '"'))
		.pipe(replace('.jpg"','.jpg?rev=' + hash + '"'))
		.pipe(replace('.png"','.png?rev=' + hash + '"'))
		.pipe(dest(dir_root));
/**
 * Image
 */
const compileSvgSprite = () =>
	src(dir_src+"/img/svg/*.svg")
	.pipe(plumber({errorHandler: notify.onError('<%= error.message %>')}))
	.pipe(
		imagemin([
			imagemin.svgo({
				plugins: [
					{ removeViewBox: false },
					{ removeMetadata: false },
					{ removeUnknownsAndDefaults: false },
					{ convertShapeToPath: true },
					{ collapseGroups: true },
					{ cleanupIDs: true },
				]
			}),
			]
		)
	)
	.pipe(svgSprite({
		mode: {
			symbol: {
				// スプライト画像を置くディレクトリ名。指定しないとデフォルト設定（svg）に。
				dest: "",
				// スプライト画像のファイル名
				sprite: '_sprite.pug',
				// スプライト画像のプレビュー用HTMLが欲しい人はこちらも記述してください。
				// 任意の場所とファイル名を指定してください。
				example: {
					dest: '../../../dist/sprite.svg',
				}
			},
		},
		shape: {
			transform: [
				{
					svgo: { // svgのスタイルのオプション
						plugins: [
							{ 'removeTitle': true }, // titleを削除
							{ 'removeStyleElement': true }, // <style>を削除
							{ 'removeAttrs': { 'attrs': '(fill|opacity)' } }, // fill属性を削除
						]
				}}
			]
		},
	}))
	.pipe(dest(dir_src+"/pug/_components/"));

const compileImageSvg = () =>
	src(dir_src+"/img/**/*.svg", {since: lastRun(compileImageSvg)})
	.pipe(plumber({errorHandler: notify.onError('<%= error.message %>')}))
	.pipe(
		imagemin([
			imagemin.svgo({
				plugins: [
					{ removeViewBox: false },
					{ removeMetadata: false },
					{ removeUnknownsAndDefaults: false },
					{ convertShapeToPath: true },
					{ collapseGroups: true },
					{ cleanupIDs: true },
				]
			}
			),
		]
	)
).pipe(dest(dir_dest+"/img/"));


	// const compileImage1 = () =>
	// src(dir_src+"/img/**/*.{gif,svg}", {since: lastRun(compileImage1)})
	// .pipe(plumber({errorHandler: notify.onError('<%= error.message %>')}))
	// .pipe(
	// 	imagemin([
	// 		imageminMozjpeg({quality: 70,}),
	// 		imageminPngquant({quality: [.7, .85],}),
	// 		imagemin.svgo({
	// 			plugins: [
	// 				// viewBox属性を削除する（widthとheight属性がある場合）。
	// 				// 表示が崩れる原因になるので削除しない。
	// 				{ removeViewBox: false },
	// 				// <metadata>を削除する。
	// 				// 追加したmetadataを削除する必要はない。
	// 				{ removeMetadata: false },
	// 				// SVGの仕様に含まれていないタグや属性、id属性やvertion属性を削除する。
	// 				// 追加した要素を削除する必要はない。
	// 				{ removeUnknownsAndDefaults: false },
	// 				// コードが短くなる場合だけ<path>に変換する。
	// 				// アニメーションが動作しない可能性があるので変換しない。
	// 				{ convertShapeToPath: true },
	// 				// 重複や不要な`<g>`タグを削除する。
	// 				// アニメーションが動作しない可能性があるので変換しない。
	// 				{ collapseGroups: true },
	// 				// SVG内に<style>や<script>がなければidを削除する。
	// 				// idにアンカーが貼られていたら削除せずにid名を縮小する。
	// 				// id属性は動作の起点となることがあるため削除しない。
	// 				{ cleanupIDs: true },
	// 			]
	// 		}),
	// 		imagemin.optipng(),
	// 		imagemin.gifsicle(),
	// 	  ]
	// 	)
	// )
	// .pipe(dest(dir_dest+"/img/"));

const compileWebp = () =>
	src(dir_src + "/img/**/*.{png,jpg}", { since: lastRun(compileWebp) })
		.pipe(plumber({ errorHandler: notify.onError('<%= error.message %>') }))
		.pipe(webp())
		.pipe(dest(dir_dest + "/img/"));
	// .pipe(del(dir_dest + "/img/*.png"));

	/**
 * Sass
 */
const compileSass1 = () =>
	src(dir_src+"/scss/**/*.scss", { sourcemaps: true })
	.pipe(plumber({errorHandler: notify.onError('<%= error.message %>')}))
	.pipe(sassGlob())
	.pipe(dartSass())
	.pipe(autoprefixer())
	.pipe(cssmin())
	.pipe(dest(dir_dest+"/css/", { sourcemaps: "." }));

/**
 * JS
 */
const compileJs_ES6 = () =>
	src(dir_src+"/js/*.js", {since: lastRun(compileJs_ES6)})
	.pipe(plumber({errorHandler: notify.onError('<%= error.message %>')}))
	.pipe(babel({
		presets: ['@babel/preset-env']
	}))
	.pipe(dest(dir_dest+"/js/"));

// webpack
const bundleJs = () => {
  // webpackStreamの第2引数にwebpackを渡す
  return webpackStream(webpackConfig, webpack)
	.pipe(dest(dir_dest+"/js/"));
};


const watchSvgSprite = () => watch(dir_src + "/img/svg/*.svg", compileSvgSprite);
// const watchImageFiles1 = () => watch(dir_src + "/img/**/**", compileImage1);
const watchImageSvg = () => watch(dir_src + "/img/**/*.svg", compileImageSvg);
const watchWebp = () => watch(dir_src + "/img/**/*.{png,jpg}", compileWebp);
const watchSassFiles1 = () => watch(dir_src+"/scss/**/*.scss", compileSass1);
// const watchJsFiles1 = () => watch(dir_src+"/js/*.js", compileJs_ES6);
const watch_bundleJs = () => watch(dir_src+"/js/**/*.js", bundleJs);
const watchHTMLFiles1 = () => watch(dir_src+"/pug/**/*.pug", pugCompile);

// npx gulpというコマンドを実行した時、watchSassFilesが実行されるようにします
exports.default = parallel(watchImageSvg, watchSassFiles1, watch_bundleJs, watchHTMLFiles1, watchWebp);
exports.pug = pugCompile;
exports.img = compileWebp;
exports.js6 = compileJs_ES6;


function fontello() {
	var fs = require('fs'), conf = require(dir_dest+"/css/fontello/config.json");
	var mixins = conf.glyphs
		.filter(function (f) {return f.selected != false;})
		.map(function (f) {
			return '@mixin aicon-' + f.css + ' {@include icon-_base; content: "\\' + f.code.toString(16) + '";}' ;
		});
	fs.writeFileSync(dir_src+'/scss/foundation/_mixin-fontello-fonts.scss', mixins.join('\n'));
}
exports.fontello = fontello;



