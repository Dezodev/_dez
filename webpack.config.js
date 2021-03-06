const path = require('path');
const webpack = require('webpack');

// include the js minification plugin
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');

// include the css extraction and minification plugins
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");

module.exports = {
	entry: ['./src/js/global.js', './src/scss/global.scss'],
	output: {
		filename: './dist/js/global.js',
		path: path.resolve(__dirname)
	},
	module: {
		rules: [
			// perform js babelization on all .js files
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: {
					loader: "babel-loader",
					options: {
						presets: ['babel-preset-env']
					}
				}
			},

			// compile all .scss files to plain old css
			{
				test: /\.(sass|scss)$/,
				use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
			},
		]
	},
	plugins: [
		// extract css into dedicated file
		new MiniCssExtractPlugin({
			filename: './dist/css/global.css'
		}),

		new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            Util: 'exports-loader?Util!bootstrap/js/dist/util'
        })
	],
	optimization: {
		minimizer: [
			// enable the js minification plugin
			new UglifyJSPlugin({
				cache: true,
				parallel: true
			}),

			// enable the css minification plugin
			new OptimizeCSSAssetsPlugin({})
		]
	},
	resolve: {
		alias: {
			"~": __dirname,
			"@": path.resolve(__dirname, 'src/')
		}
	}
};
