'use strict';

var gulp         = require('gulp');
var sass         = require('gulp-sass');
var cssmin       = require('gulp-cssmin');
var rename       = require('gulp-rename');
var concat       = require('gulp-concat');
var uglify       = require('gulp-uglify');
var pump         = require('pump');
var browserSync  = require('browser-sync');
var inject       = require('gulp-inject');
var autoprefixer = require('gulp-autoprefixer');
var del          = require('del');
var font2css = require('gulp-font2css').default;
var notify = require("gulp-notify");
gulp.task('sass', function () {
    return gulp.src('scss/style.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./'))
        .pipe(autoprefixer({
            cascade: false}
        ))
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./'))
        .pipe(notify("Done CSS!"));
});

gulp.task('fonts', function() {
    return gulp.src('fonts/**/*.{otf,ttf,woff,woff2}')
        .pipe(font2css())
        .pipe(concat('fonts.css'))
        .pipe(gulp.dest('./'))
});

gulp.task('build-js', function (cb) {
    pump([
            gulp.src([
                //'libs/odometer/odometer.min.js',
                'libs/tether/dist/js/tether.min.js',
                'libs/bootstrap/dist/js/bootstrap.min.js',
                'js/scripts.js'
            ]),
            concat('vendor.min.js'),
            uglify(),
            gulp.dest('js'),
            notify("Done JS!"),
            browserSync.reload({stream: true})
        ],
        cb
    );
});

gulp.task('browser-sync', function() {
    browserSync({
        proxy: "http://swm.idealabs.eu/",
        notify: false
    });
});

gulp.task('watch', ['browser-sync', 'sass', 'build-js'], function() {
    gulp.watch('scss/**/*.scss', ['sass']);
    gulp.watch('*.php', ['sass']);
    gulp.watch('js/scripts.js', ['build-js']);
});


gulp.task('default', ['watch']);