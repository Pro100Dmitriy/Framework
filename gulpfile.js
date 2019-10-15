var gulp    = require("gulp"),
    concat  = require("gulp-concat"),
    uglify  = require("gulp-uglifyjs");


gulp.task('js',function(){
  return gulp.src([
      'public/js/resours/**/*.js',
      '!public/js/main.js',
      '!public/js/scripts.min.js'
    ])
    .pipe( concat('scripts.min.js') )
    .pipe( uglify() )
    .pipe( gulp.dest('public/js') );
});