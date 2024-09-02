/*--------------------------------------
   Gulp
--------------------------------------*/

// Notes...

/* Title
--------------------------------------*/

// Notes...

var gulp = require('gulp');

var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

var sass = require('gulp-sass');

var autoprefixer = require('gulp-autoprefixer');

var imagemin = require('gulp-imagemin');

var browsersync = require('browser-sync');

/* Directories
--------------------------------------*/

// Notes...

var basePaths = {

	root: 'dist/html/wp-content/themes/vtml/',
	src: 'src/',
	dest: 'dist/html/wp-content/themes/vtml/assets/'

};

/* Sass
--------------------------------------*/

// Notes...

gulp.task('sass', function() {

	return gulp.src(basePaths.src + 'scss/**/*.scss')

	.pipe(sass({

		outputStyle: 'compressed'

	}).on('error', sass.logError))

	.pipe(autoprefixer({

		browsers: ['last 2 versions'],
		cascade: false

	}))

	.pipe(gulp.dest(basePaths.dest + 'css'))

	.pipe(browsersync.stream());

});

/* JavaScript
--------------------------------------*/

// Notes...

gulp.task('js', function() {

	return gulp.src([

		basePaths.src + 'js/modernizr.js',
		basePaths.src + 'js/flexslider.js',
		// basePaths.src + 'js/scroll.js',
		// basePaths.src + 'js/holder.js',
		basePaths.src + 'js/functions.js'

	])

	.pipe(concat('global.js'))

	// .pipe(rename({

	//     suffix: '.min'

	// }))

	.pipe(uglify())

	.pipe(gulp.dest(basePaths.dest + 'js'))

	.pipe(browsersync.stream());

});

/* Images
--------------------------------------*/

// Notes...

gulp.task('img', function() {

	return gulp.src(basePaths.src + 'img/**/*')

	.pipe(imagemin({

		optimizationLevel: 5,
		progressive: true,
		interlaced: true

	}))

	.pipe(gulp.dest(basePaths.dest + 'img'));

});

/* Fonts
--------------------------------------*/

// Notes...

gulp.task('fonts', function() {

	return gulp.src(basePaths.src + 'fonts/**/*')

	.pipe(gulp.dest(basePaths.dest + 'fonts'));

});

/* Watch
--------------------------------------*/

// Notes...

gulp.task('watch', function() {

	browsersync.init({

		proxy: "http://agah-lab.dev",
		host: "agah-lab.dev",
		open: "external"

	});

	// gulp.watch(basePaths.root + '**/*.php').on('change', function(file) {

	//     livereload.changed(file.path);

	// });

	gulp.watch(basePaths.src + 'scss/**/*.scss', ['sass']);

	gulp.watch(basePaths.src + 'js/*.js', ['js']);

	gulp.watch(basePaths.src + 'img/**/*', ['img']);

	gulp.watch(basePaths.src + 'fonts/**/*', ['fonts']);

	gulp.watch(basePaths.root + '**/*.php').on('change', browsersync.reload);

});

/* Title
--------------------------------------*/

// Notes...

gulp.task('default', ['sass', 'js', 'img', 'fonts', 'watch']);
