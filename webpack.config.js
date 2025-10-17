const path = require('path');

module.exports = {
	mode: 'production',
	entry: {
		// Block viewScripts (frontend)
		'blocks/tabbed-panels/view': path.resolve(process.cwd(), 'src/js/custom/tabbed-panels.js'),
		'blocks/modals/view': path.resolve(process.cwd(), 'src/js/custom/modals.js'),
		'blocks/overlay-card/view': path.resolve(process.cwd(), 'src/js/custom/overlay-card.js'),
		
		// Block editorScripts (admin/editor)
		'admin/core-list-block': path.resolve(process.cwd(), 'src/js/custom/admin/core-list-block.js'),
		'admin/core-divider': path.resolve(process.cwd(), 'src/js/custom/admin/core-divider.js'),
		'admin/core-image-block': path.resolve(process.cwd(), 'src/js/custom/admin/core-image-block.js'),
		'admin/heading-highlights': path.resolve(process.cwd(), 'src/js/custom/admin/heading-highlights.js'),
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