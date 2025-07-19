'use strict';

// Define variables.
var gulp   = require('gulp'),
    prefix = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    beauty = require('gulp-cssbeautify'),
    nano   = require('gulp-cssnano'),
    rename = require('gulp-rename'),
    sass   = require('gulp-sass'),
    maps   = require('gulp-sourcemaps'),
    uglify = require('gulp-uglify'),
    sort   = require('gulp-sort'),
    pot    = require('gulp-wp-pot'),
    files  = require('main-bower-files');

// Bower task.
gulp.task('files', function() {
    gulp.src(files(), {
        base: './bower_components/'
    })

    .pipe(rename(function(path) {
        if (path.dirname.match(/\/dist/)) {
            path.dirname = path.dirname.replace('/dist', '/', path.dirname);
        }

        if (path.dirname.match(/\/src/)) {
            path.dirname = path.dirname.replace('/src', '/', path.dirname);
        }

        if (path.dirname.match(/\/build/)) {
            path.dirname = path.dirname.replace('/build', '/', path.dirname);
        }

        if (path.dirname.match(/\/slick/)) {
            path.dirname = path.dirname.replace('/slick', '/', path.dirname);
        }

        path.dirname = path.dirname.toLowerCase();
    }))

    .pipe(gulp.dest('./assets/vendor'));
});

// Compile sass.
gulp.task('sass', function() {
    gulp.src('assets/scss/*.scss')
        .pipe(sass())
        .pipe(prefix())
        .pipe(beauty())
        .pipe(gulp.dest('assets/css'));
});

// Compile scripts.
gulp.task('js', function() {
    gulp.src('assets/js/*.js')
        .pipe(maps.init())
        .pipe(maps.write('.'))
        .pipe(gulp.dest('assets/js'));
});

// Generate .POT file.
gulp.task('pot', function() {
    gulp.src('**/*.php')
        .pipe(sort())
        .pipe(pot({
            domain: 'writsy',
            destFile:'writsy.pot',
            package: 'Writsy',
            bugReport: 'https://incredibbble.com',
            lastTranslator: 'Incredibbble <support@incredibbble.com>',
            team: 'Incredibbble <support@incredibbble.com>'
        }))
        .pipe(gulp.dest('languages'));
});

// Watch changes.
gulp.task('watch', function() {
    gulp.watch('assets/scss/**/*.scss', ['sass']);
});

// Default task.
gulp.task('default', [
    'sass'
]);