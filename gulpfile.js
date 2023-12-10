const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));

gulp.task('styles', function() {
  return gulp.src('web/themes/custom/yummy_theme/scss/style.scss') 
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('web/themes/custom/yummy_theme/css'));
});

gulp.task('watch', function() {
  gulp.watch('web/themes/custom/yummy_theme/scss/**/*.scss', gulp.series('styles'));
});

gulp.task('default', gulp.series('styles', 'watch'));
