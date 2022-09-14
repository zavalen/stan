/* eslint-disable linebreak-style */
/* eslint-disable no-undef */

let projectFolder = 'assets'
let siteName = 'new.stan.org.ua'
let sourceFolder = '#src'
let fs = require('fs')

const path = {
	build: {
		// php: projectFolder + '/',
		css: 'assets/css/',
		js: 'assets/js/',
		img: 'assets/images/',
		fonts: 'assets/fonts/',
	},
	src: {
		php: ['./**/*.php', '!includes/**', '!node_modules/**'],
		css: sourceFolder + '/scss/style.scss',
		js: sourceFolder + '/js/script.js',
		img: sourceFolder + '/img/**/*.{jpg,png,svg,gif,ico,webp}',
		fonts: sourceFolder + '/fonts/*.ttf',
	},
	watch: {
		php: './**/*.php',
		css: sourceFolder + '/scss/**/*.scss',
		js: sourceFolder + '/js/**/*.js',
		img: sourceFolder + '/img/**/*.{jpg,png,svg,gif,ico,webp}',
	},

	clean: './' + projectFolder + '/assets/css/style.min.css',
	clean: './' + projectFolder + '/assets/js/script.min.css',
}

const {src, dest} = require('gulp'),
	gulp = require('gulp'),
	browsersync = require('browser-sync').create(),
	fileinclude = require('gulp-file-include'),
	del = require('del'),
	scss = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	group_media = require('gulp-group-css-media-queries'),
	clean_css = require('gulp-clean-css'),
	rename = require('gulp-rename'),
	uglify = require('gulp-uglify-es').default,
	imagemin = require('gulp-imagemin'),
	svgsprite = require('gulp-svg-sprite'),
	ttf2woff = require('gulp-ttf2woff'),
	ttf2woff2 = require('gulp-ttf2woff2'),
	fonter = require('gulp-fonter')

function browserSync(params) {
	browsersync.init({
		proxy: siteName,
		port: 8080,
		notify: false,
		https: false,
	})
}

function php() {
	return (
		src(path.src.php)
			// .pipe( dest( path.build.php ) )
			.pipe(browsersync.stream())
	)
}

function css() {
	return src(path.src.css)
		.pipe(
			scss({
				outputStyle: 'expanded',
			})
		)
		.pipe(group_media())
		.pipe(
			autoprefixer({
				overrideBrowserslist: ['last 5 versions'],
				cascade: true,
			})
		)

		.pipe(dest(path.build.css))
		.pipe(clean_css())

		.pipe(
			rename({
				extname: '.min.css',
			})
		)
		.pipe(dest(path.build.css))
		.pipe(browsersync.stream())
}

function js() {
	return src(path.src.js)
		.pipe(fileinclude())
		.pipe(dest(path.build.js))
		.pipe(uglify())
		.pipe(
			rename({
				extname: '.min.js',
			})
		)
		.pipe(dest(path.build.js))
		.pipe(browsersync.stream())
}

function images() {
	return (
		src(path.src.img)
			.pipe(dest(path.build.img))
			.pipe(src(path.src.img))
			// .pipe(
			// 	imagemin( {
			// 		progressive: true,
			// 		svgoPlugins: [ { removeViewBox: false } ],
			// 		interlaced: true,
			// 		optimizationLevel: 3, //0 to 7
			// 	} )
			// )
			.pipe(dest(path.build.img))
			.pipe(browsersync.stream())
	)
}

function fonts() {
	src(path.src.fonts).pipe(ttf2woff()).pipe(dest(path.build.fonts))
	return src(path.src.fonts).pipe(ttf2woff2()).pipe(dest(path.build.fonts))
}

gulp.task('otf2ttf', function () {
	return gulp
		.src([sourceFolder + '/fonts/*.otf'])
		.pipe(
			fonter({
				formats: ['ttf'],
			})
		)
		.pipe(dest(sourceFolder + '/fonts/'))
})

gulp.task('svgSprite', function () {
	return gulp
		.src([sourceFolder + '/iconsprite/*.svg'])
		.pipe(
			svgsprite({
				mode: {
					stack: {
						sprite: '../icons/icons.svg',
						example: true,
					},
				},
			})
		)
		.pipe(dest(path.build.img))
})

function fontsStyle(params) {
	// const file_content = fs.readFileAsync(sourceFolder + '/scss/fonts.scss')
	// if (file_content == '') {
	// 	fs.writeFile(sourceFolder + '/scss/fonts.scss', '', cb)
	// 	return fs.readdir(path.build.fonts, function (err, items) {
	// 		if (items) {
	// 			let c_fontname
	// 			for (let i = 0; i < items.length; i++) {
	// 				let fontname = items[i].split('.')
	// 				fontname = fontname[0]
	// 				if (c_fontname != fontname) {
	// 					fs.appendFile(
	// 						sourceFolder + '/scss/fonts.scss',
	// 						'@include font("' +
	// 							fontname +
	// 							'", "' +
	// 							fontname +
	// 							'", "400", "normal");\r\n',
	// 						cb
	// 					)
	// 				}
	// 				c_fontname = fontname
	// 			}
	// 		}
	// 	})
	// }
}

function cb() {}

function watchFiles(params) {
	gulp.watch([path.watch.php], php)
	gulp.watch([path.watch.css], css)
	gulp.watch([path.watch.js], js)
	gulp.watch([path.watch.img], images)
}

function clean(params) {
	return del(path.clean)
}

const build = gulp.series(
	clean,
	gulp.parallel(js, css, php, images, fonts),
	// fontsStyle
)
const watch = gulp.parallel(build, watchFiles, browserSync)

exports.fontsStyle = fontsStyle
exports.fonts = fonts
exports.images = images
exports.js = js
exports.css = css
// exports.php = php;
exports.build = build
exports.watch = watch
exports.default = watch
