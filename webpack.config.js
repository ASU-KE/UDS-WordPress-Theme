const path = require('path');

module.exports = {
	mode: 'production',
	entry: {
		'blocks/tabbed-panels/view': path.resolve(process.cwd(), 'src/js/custom/tabbed-panels.js'),
		'blocks/modals/view': path.resolve(process.cwd(), 'src/js/custom/modals.js'),
		'blocks/overlay-card/view': path.resolve(process.cwd(), 'src/js/custom/overlay-card.js'),
	},
	output: {
		path: path.resolve(process.cwd(), 'build'),
		filename: '[name].js',
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: ['@babel/preset-env']
					}
				}
			}
		]
	}
};