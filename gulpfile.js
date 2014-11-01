// Load plugins
var gulp = require('gulp'),
	plugins = require('gulp-load-plugins')({ camelize: true }),
	lr = require('tiny-lr'),
	server = lr();
 
// Styles
gulp.task('styles', function() {
  return gulp.src('library/scss/*.scss')
	.pipe(plugins.rubySass({ style: 'expanded', compass: true }))
	.pipe(plugins.autoprefixer('last 2 versions', 'ie 9', 'ios 6', 'android 4'))
	.pipe(gulp.dest('library/css'))
	.pipe(plugins.livereload(server))
	.pipe(gulp.dest('./'));
});
 
// Watch
gulp.task('watch', function() {
 
  // Listen on port 35729
  server.listen(35729, function (err) {
	if (err) {
	  return console.log(err)
	};
 
	// Watch .scss files
	gulp.watch('library/scss/**/*.scss', ['styles']);
 
  });
 
});
 
// Default task
gulp.task('default', ['styles', 'watch']);