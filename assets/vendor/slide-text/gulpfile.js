var gulp   = require('gulp');        // Сам Gulp JS
var rename = require('gulp-rename'); // Переименование файлов
var uglify = require('gulp-uglify'); // Минификация JS

// JS

function js() {
    return gulp.src('src/jquery.slidetext.js')
        .pipe(gulp.dest('dist'));
}

function jsMin() {
    return gulp.src('src/jquery.slidetext.js')
        .pipe(uglify())
        .pipe(rename('jquery.slidetext.min.js'))
        .pipe(gulp.dest('dist'));
}

// TASKS

gulp.task('build', gulp.parallel(js, jsMin));