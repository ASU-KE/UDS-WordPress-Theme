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

/**
 * get latest asu unity stack js
 */
gulp.task('update-asu-unity-stack-js', function () {
    return gulp.src(['node_modules/@asu/unity-bootstrap-theme/dist/js/bootstrap.bundle.min.js',])
    .pipe(gulp.dest('./dist/js/'));
});

/**
 * get latest asu header
 */
gulp.task('update-asu-header-js', function () {
    return gulp.src(['node_modules/@asu/component-header-footer/dist/**/*'],{encoding: false})
	.pipe(filter(['**', '!*.cjs.js*', '!*.es.js*']))
    .pipe(gulp.dest('./src/js/uds-asu-header'));
});

/**
 * get latest uds images
 */
gulp.task('update-uds-images', function () {
    return gulp.src(['node_modules/@asu/unity-bootstrap-theme/dist/img/**/*'],{encoding: false})
    .pipe(gulp.dest('./dist/img/'));
});

/**
 * get latest fontawesome css
 */
gulp.task('update-fontawesome-css', function () {
    return gulp.src([
		'node_modules/@fortawesome/fontawesome-free/css/all.css'
    ])
    .pipe(gulp.dest('./src/css/fontawesome'));
});

/**
 * get latest fontawesome js
 * update: get file from fontawesome website, pro pack is paid by unit
 */
// gulp.task('update-fontawesome-js', function () {
//     return gulp.src([
// 		'node_modules/@fortawesome/fontawesome-free/js/all.js'
//     ])
//     .pipe(gulp.dest('./src/js/fontawesome'));
// });

/**
 * Compile SCSS to CSS
 */
gulp.task("compile-sass", function () {
	return gulp.src( './src/sass/*.scss', { sourcemaps: true } )
	.pipe(sass().on('error', sass.logError))
	.pipe(autoprefixer())
	.pipe(gulp.dest('./src/css/compiled-sass', { sourcemaps: '.' }));
});

/**
 * Minify css
 */
gulp.task("minify-css", function () {
	return gulp
		.src([
			"./src/css/compiled-sass/theme.css",
			"./src/css/compiled-sass/admin.css"
		], { sourcemaps: true })
		.pipe(
			cleanCSS({
				compatibility: "*",
			})
		)
		.pipe(rename({ suffix: ".min" }))
		.pipe(gulp.dest('./dist/css', { sourcemaps: '.' }))
});


/**
 * Front-end Javascript compilation. Scripts enqueued in the front-end of the site.
 */
gulp.task("front-end-scripts", function() {
	const scripts = [
		"./src/js/fontawesome/fontawesome.js",
		"./src/js/fontawesome/brands.js",
		"./src/js/fontawesome/solid.js",
		"./src/js/custom/skip-link-focus-fix.js",
		"./src/js/custom/init-uds-header.js",
		"./src/js/custom/hero_video.js",
		"./src/js/custom/modals.js",
		"./src/js/custom/side-menu-active-child.js",
		"./src/js/custom/accordion.js",
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
});


/**
 * Admin JS compilation. This creates a minified 'admin-bundle.js' that is enqueued in the WordPress admin area.
 */
gulp.task("admin-scripts", function() {
	const adminScripts = [
		"./src/js/custom/admin/admin.js",
		"./src/js/fontawesome/fontawesome.js",
		"./src/js/fontawesome/brands.js",
		"./src/js/fontawesome/solid.js",
		"./src/js/custom/hero_video.js",
		"./src/js/custom/modals.js",
		"./src/js/custom/side-menu-active-child.js",
		"./src/js/custom/accordion.js",
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
