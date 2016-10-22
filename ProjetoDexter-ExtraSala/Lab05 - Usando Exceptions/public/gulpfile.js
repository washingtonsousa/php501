var gulp = require('gulp'),

    // some paths
    src = 'assets/',
    dest = 'dist/',

    // plugins
    concat    = require('gulp-concat'),
    uglify    = require('gulp-uglify'),
    rename    = require('gulp-rename'),
    minifyCss = require('gulp-minify-css'),
    imagemin  = require('gulp-imagemin'),
    pngquant  = require('imagemin-pngquant');


// JS
gulp.task('js', function() {
    return gulp.src(src + 'js/*.js')
      .pipe(concat('dexter.js'))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(gulp.dest(dest + 'js'));
});

// CSS
gulp.task('css', function() {
    return gulp.src(src + 'css/*.css')
	.pipe(concat('dexter.css'))
	.pipe(rename({suffix: '.min'}))
	.pipe(minifyCss())
	.pipe(gulp.dest(dest + 'css'));
});

// IMAGES
gulp.task('images', function () {
    return gulp.src(src + 'images/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest(dest + 'images'));
});

gulp.task('default', ['js', 'css', 'images']);
