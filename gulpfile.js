var gulp=require ('gulp'),
    gutil=require('gulp-util'),
    concat=require('gulp-concat'),
    browserify=require('gulp-browserify');
    

var jsSources=['components/scripts/temp.js'];

gulp.task('log',function(){    
    gutil.log("Workflows are awesome");
});

gulp.task('js',function(){
    gulp.src(jsSources)
    .pipe(concat('script.js'))
    .pipe(browserify())
    .pipe(gulp.dest('builds/development/js'))
});

gulp.task('watch',function(){
    gulp.watch(jsSources,['js']);    
});

gulp.task('default',['js','watch']);

