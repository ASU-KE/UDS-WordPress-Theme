// Defining requirements
import gulp from 'gulp';
import { deleteAsync } from 'del';
import filter from 'gulp-filter';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
import autoprefixer from 'gulp-autoprefixer';
import cleanCSS from 'gulp-clean-css';
import rename from 'gulp-rename';
import babel from 'gulp-babel';
import concat from 'gulp-concat';
import uglify from 'gulp-uglify';
const sass = gulpSass(dartSass);

//get latest asu unity stack js
gulp.task('update-asu-unity-stack-js', function () {
    return gulp.src(['node_modules/@asu/unity-bootstrap-theme/dist/js/bootstrap.bundle.min.js',])
    .pipe(gulp.dest('./dist/js/'));
});
//get latest asu header
gulp.task('update-asu-header-js', function () {
    return gulp.src(['node_modules/@asu/component-header/dist/**/*'],{encoding: false})
	.pipe(filter(['**', '!*.cjs.js*', '!*.es.js*']))
    .pipe(gulp.dest('./src/js/uds-asu-header'));
});
//get latest uds images
gulp.task('update-uds-images', function () {
    return gulp.src(['node_modules/@asu/unity-bootstrap-theme/dist/img/**/*'],{encoding: false})
    .pipe(gulp.dest('./dist/img/'));
});

//get latest asu header
gulp.task('update-cookie-consent-js', function () {
    return gulp.src([
        'node_modules/@asu/component-cookie-consent/dist/**/*'
    ])
	.pipe(filter(['**', '!*.cjs.js*', '!*.es.js*']))
    .pipe(gulp.dest('./src/js/uds-cookie-consent'));
});

//get latest fontawesome css
gulp.task('update-fontawesome-css', function () {
    return gulp.src([
		'node_modules/@fortawesome/fontawesome-free/css/all.css'
    ])
    .pipe(gulp.dest('./src/css/fontawesome'));
});

//get latest fontawesome js
gulp.task('update-fontawesome-js', function () {
    return gulp.src([
		'node_modules/@fortawesome/fontawesome-free/js/all.js'
    ])
    .pipe(gulp.dest('./src/js/fontawesome'));
});

//Compiles .scss to .css files.
gulp.task("compile-sass", function () {
	return gulp.src( './src/sass/*.scss', { sourcemaps: true } )
	.pipe(sass().on('error', sass.logError))
	.pipe(autoprefixer())
	.pipe(gulp.dest('./src/css/compiled-sass', { sourcemaps: '.' }));
});

//minify css
gulp.task("minifycss", function () {
	return gulp
		.src([
			"./src/css/compiled-sass/theme.css",
			"./src/css/compiled-sass/admin.css"
		], { sourcemaps: true })
		// .pipe(
		// 	sourcemaps.init({
		// 		loadMaps: true,
		// 	})
		// )
		.pipe(
			cleanCSS({
				compatibility: "*",
			})
		)
		.pipe(rename({ suffix: ".min" }))
		//.pipe(sourcemaps.write("./"))
		.pipe(gulp.dest('./dist/css', { sourcemaps: '.' }))
		//.pipe(browserSync.reload({ stream: true }));
});


// var plumber = require("gulp-plumber");
// var sass = require("gulp-sass")(require("sass"));
// var babel = require("gulp-babel");
// var postcss = require("gulp-postcss");
// var rename = require("gulp-rename");
// var concat = require("gulp-concat");
// var uglify = require("gulp-uglify");
// var imagemin = require("gulp-imagemin");
// var sourcemaps = require("gulp-sourcemaps");
// var browserSync = require("browser-sync").create();
// var del = require("del");
// var cleanCSS = require("gulp-clean-css");
// var autoprefixer = require("autoprefixer");

// // Configuration file to keep your code DRY
// var bso = require("./browserSyncOptions.json");
// var cfg = require("./gulpconfig.json");
// var paths = cfg.paths;


/**
 * Front-end Javascript compilation.
 *
 * This creates 'theme.min.js' and an
 * uncompressed 'theme.js' that we use when building the admin scripts. This
 * file contains both Bootstrap and FontAwesome JS.
 */
gulp.task("front-end-scripts", function() {
	const scripts = [
		//"./src/js/bootstrap.bundle.min.js",
		"./src/js/fontawesome/all.js",
		"./src/js/custom/skip-link-focus-fix.js",
		"./src/js/custom/init-uds-header.js",
		"./src/js/custom/init-cookie-consent.js",
		"./src/js/custom/hero_video.js",
		"./src/js/custom/modals.js",
		"./src/js/custom/side-menu-active-child.js",
		"./src/js/custom/ga-footer.js",
	]

	// Create uglifified min.js
	gulp
		.src(scripts, { allowEmpty: true })
		.pipe(babel({ presets: ["@babel/preset-env"] }))
		.pipe(concat("theme.min.js"))
		.pipe(uglify())
		.pipe(gulp.dest("./dist/js"));

	// Create full-sized version
	return gulp
		.src(scripts, { allowEmpty: true })
		.pipe(babel())
		.pipe(concat("theme.js"))
		.pipe(gulp.dest("./src/js"))
		//.pipe(browserSync.reload({ stream: true }));
});


/**
 * Admin JS compilation
 *
 * This creates a minified 'admin-bundle.js' that we enqueue in the WordPress
 * admin area. This takes the uncompressed 'theme.js' we build in the front-end
 * step, adds any other custom editor JS we have written, abd then compresses that.
 *
 */
gulp.task("admin-scripts", function() {
	const adminScripts = [
		"./src/js/custom/admin/admin.js",
		"./src/js/fontawesome/all.js",
		"./src/js/custom/skip-link-focus-fix.js",
		"./src/js/custom/hero_video.js",
		"./src/js/custom/modals.js",
		"./src/js/custom/side-menu-active-child.js",
	]

	return gulp
		.src(adminScripts, { allowEmpty: true })
		.pipe(babel({ presets: ["@babel/preset-env"] }))
		.pipe(concat("admin-bundle.js"))
		.pipe(gulp.dest("./dist/js"));

});

gulp.task("admin-core-scripts", function() {
	const adminScripts = [
		"./src/js/custom/admin/core-list-block.js",
		"./src/js/custom/admin/core-divider.js",
		"./src/js/custom/admin/core-image-block.js",
		"./src/js/custom/admin/heading-highlights.js",
	]

	return gulp
		.src(adminScripts, { allowEmpty: true })
		.pipe(babel({ presets: ["@babel/preset-env"] }))
		.pipe(concat("admin-core-bundle.js"))
		.pipe(gulp.dest("./dist/js"));

});

// /**
//  * Task: scripts
//  * Runs the front-end and editor tasks in series, which should result in the following files:
//  *
//  * 1) A _minified_ theme.js
//  * 2) A full-size theme.js, to be minified as part of buidling...
//  * 3) A minified admin-bundle.js
//  */
// gulp.task("scripts", function (callback) {
// 	gulp.series("front-end-scripts", "editor-scripts")(callback);
// });

// // Run:
// // gulp copy-assets.
// // Copy all needed dependency assets files from node_modules to theme's /js, /scss and /fonts folder.
// // Run this task after npm update

// ////////////////// All Bootstrap SASS  Assets /////////////////////////
// gulp.task("copy-assets", function (done) {
// 	////////////////// Vanilla Bootstrap 4 Assets /////////////////////////

// 	// Copy vanilla Bootstrap JS files
// 	var stream = gulp
// 		.src(paths.node + "/bootstrap/dist/js/*.js")
// 		.pipe(gulp.dest(paths.dev + "/js/bootstrap4"));

// 	// Copy Font Awesome JS (Auto-replaces FA <i> & <span> tags with SVGs)
// 	gulp
// 		.src(paths.node + "/@fortawesome/fontawesome-free/js/*")
// 		.pipe(gulp.dest(paths.js + "/fontawesome"));

// 	////////////////// All UDS Assets /////////////////////////

// 	// Copy UDS image files
// 	gulp
// 		.src(paths.node + "/@asu-design-system/bootstrap4-theme/dist/img/**/*")
// 		.pipe(gulp.dest(paths.dev + "/img/asu-unity"));

// 	// Copy UDS JS files
// 	var stream = gulp
// 		.src(paths.node + "/@asu-design-system/bootstrap4-theme/src/js/*.js")
// 		.pipe(gulp.dest(paths.dev + "/js/bootstrap4-asu"));

// 	// Copy UDS cookie-consent JS files
// 	var stream = gulp
// 		.src(paths.node + "/@asu-design-system/cookie-consent/dist/*.js")
// 		.pipe(gulp.dest(paths.dev + "/js/bootstrap4-asu"));

// 	// Copy UDS SCSS files
// 	var stream = gulp
// 		.src(paths.node + "/@asu-design-system/bootstrap4-theme/src/scss/**/*.scss")
// 		.pipe(gulp.dest(paths.dev + "/sass"));

// 	done();
// });

// // Deleting the files distributed by the copy-assets task
// gulp.task("clean-vendor-assets", function () {
// 	return del([
// 		paths.dev + "/img",
// 		paths.dev + "/js/bootstrap4",
// 		paths.dev + "/js/bootstrap4-asu",
// 		paths.dev + "/sass",
// 		paths.js + "/fontawesome",
// 	]);
// });

// /**
//  * Deletes all files inside the dist folder and the folder itself.
//  *
//  * Run: gulp clean-dist
//  */
// gulp.task("clean-dist", function () {
// 	return del(paths.dist);
// });

// // Run
// // gulp dist
// // Copies the files to the dist folder for distribution as simple theme
// gulp.task(
// 	"dist",
// 	gulp.series(["clean-dist"], function () {
// 		return gulp
// 			.src(
// 				[
// 					"**/*",
// 					"!" + paths.node,
// 					"!" + paths.node + "/**",
// 					"!" + paths.dev,
// 					"!" + paths.dev + "/**",
// 					"!" + paths.dist,
// 					"!" + paths.dist + "/**",
// 					"!" + paths.distprod,
// 					"!" + paths.distprod + "/**",
// 					"!" + paths.sass,
// 					"!" + paths.sass + "/**",
// 					"!" + paths.composer,
// 					"!" + paths.composer + "/**",
// 					"!+(readme|README).+(txt|md)",
// 					"!*.+(dist|json|js|lock|xml)",
// 					"!CHANGELOG.md",
// 				],
// 				{ buffer: true }
// 			)
// 			.pipe(gulp.dest(paths.dist));
// 	})
// );

// /**
//  * Deletes all files inside the dist-product folder and the folder itself.
//  *
//  * Run: gulp clean-dist-product
//  */
// gulp.task("clean-dist-product", function () {
// 	return del(paths.distprod);
// });

// // Run
// // gulp dist-product
// // Copies the files to the /dist-prod folder for distribution as theme with all assets
// gulp.task(
// 	"dist-product",
// 	gulp.series(["clean-dist-product"], function () {
// 		return gulp
// 			.src([
// 				"**/*",
// 				"!" + paths.node,
// 				"!" + paths.node + "/**",
// 				"!" + paths.composer,
// 				"!" + paths.composer + "/**",
// 				"!" + paths.dist,
// 				"!" + paths.dist + "/**",
// 				"!" + paths.distprod,
// 				"!" + paths.distprod + "/**",
// 			])
// 			.pipe(gulp.dest(paths.distprod));
// 	})
// );

// // Run
// // gulp reset-assets
// // Clear and re-copy the vendor assets
// gulp.task("reset-assets", gulp.series("clean-vendor-assets", "copy-assets"));

// // Run
// // gulp compile
// // Compiles the styles and scripts and runs the dist task
// gulp.task(
// 	"compile",
// 	gulp.series("styles", "scripts", "imagemin", "dist")
// );

// // Run:
// // gulp
// // Starts watcher (default task)
// gulp.task("default", gulp.series("watch"));
