var gulp 		= require("gulp");
const sass 		= require("gulp-sass");
const notify 	= require("gulp-notify");

gulp.task('sass',function(){
	return gulp.src('./src/scss/*.scss')
	.pipe(sass())
	.pipe(gulp.dest('./dist/css'));
});

gulp.task('sass:watch', function(){
	gulp.watch('./src/js/*.js', ['js']);
	gulp.watch('./src/scss/*.scss', ['sass']);	
})


gulp.task('js', function(){
	return gulp.src('./src/js/*.js')
	.pipe(gulp.dest('./dist/js'));
});
/*
  Task default para iniciar apenas com o comando "gulp" no terminal
*/

gulp.task('on', ['js', 'sass', 'sass:watch']);