var gulp = require('gulp');
var pug = require('gulp-pug');
var less = require('gulp-less');
var watch = require('gulp-watch');
//var pretty = require('gulp-pretty');
//var semi = require('gulp-semi').remove;

//gulp.task('html', function(){
//  return gulp.src('src/pug/*.pug')
//    .pipe(pug())
//    .pipe(pretty())
//    .pipe(semi({ leading: true }))
//    .pipe(gulp.dest('views'))
//});

gulp.task('css', function(){
  return gulp.src('src/less/*.less')
    .pipe(less())
    .pipe(gulp.dest('style'))
});

//gulp.task('default', [ 'html', 'css' ])
gulp.task('default', [ 'css' ])

//gulp.watch('src/pug/*.pug', ['html'])
gulp.watch('src/less/*.less', ['css'])