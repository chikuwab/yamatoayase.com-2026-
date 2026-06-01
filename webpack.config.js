// const path = require('path');

// module.exports = {
//   // モードの設定
//   mode: 'development',

//   // エントリーポイントの設定
//   entry: `./src/js/*.js`,

//   // ファイルの出力設定
//   output: {
//     // 出力するファイル名
//     filename: "bundle.js",

//     //  出力先のパス
//     path: path.join(__dirname, 'dist/assets/js/')
//   }
// };
const TerserPlugin = require('terser-webpack-plugin'); // ココ

module.exports = {
  // モード値を production に設定すると最適化された状態で、
  // development に設定するとソースマップ有効でJSファイルが出力される
  mode: "development",

  // ローカル開発用環境を立ち上げる
  // 実行時にブラウザが自動的に localhost を開く
  // devServer: {
  //   contentBase: "dist",
  //   open: true // 自動的にブラウザが立ち上がる
  // },

  // メインとなるJavaScriptファイル（エントリーポイント）
  // entry: `./src/js/main.js`,
	optimization: {
		minimize: true,
    minimizer:[
      new TerserPlugin({
        terserOptions:{
          compress:{
            drop_console: true,
          }
        }
      })
    ]
  },

	entry: {
		main: './src/js/main.js',
		map: './src/js/map.js',
		// instagram: './src/js/instagram.js',
    // youtube: './src/js/youtube.js',
    // 'open-house': './src/js/open-house/open-house.js',
    // 'open-house.admin': './src/js/open-house/admin.js',
    // 'open-house.complate': './src/js/open-house/open-house.complate.js',
    // step: './src/js/step.js',
	},
  // babel
  // module: {
  //   rules: [
  //     {
  //       // 拡張子 .js の場合
  //       test: /\.js$/,
				
  //       use: [
  //         {
  //           // Babel を利用する
  //           loader: 'babel-loader',
  //           // Babel のオプションを指定する
  //           options: {
  //             presets: [
  //               // プリセットを指定することで、ES2020 を ES5 に変換
  //               '@babel/preset-env',
  //             ]
  //           }
  //         }
  //       ]
  //     }
  //   ]
  // },
  // plugins: [
  //   new TerserPlugin({
  //     terserOptions: {
  //       compress: { drop_console: true }  // ココ
	// 		},
	// 		extractComments: "all"
  //   }),
  // ],
  // ファイルの出力設定
  output: {
    // 出力ファイル名
    filename: '[name].bundle.js'
	},

};
