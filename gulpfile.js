var gulp=require ('gulp'),
    gutil=require('gulp-util'),
    concat=require('gulp-concat'),
    browserify=require('gulp-browserify'),
    connect = require('gulp-connect-php'),
    browserSync = require('browser-sync').create();
    

var jsSources,outputDir;
var reload  = browserSync.reload;

jsSources=['components/scripts/temp.js'];
outputDir = 'builds/development/';
phpSources= 'builds/development/*.php';
includeSources= 'builds/development/includes/*.inc.php';

gulp.task('log',function(){    
    gutil.log("Workflows are awesome");
});

//js task
gulp.task('js',function(){
    gulp.src(jsSources)
    .pipe(concat('script.js'))
    .pipe(browserify())
    .pipe(gulp.dest(outputDir+'js'))
    
    
    
});

//php task
gulp.task('php',function(){
    gulp.src(phpSources);
});

gulp.task('includes',function(){
    gulp.src(includeSources);
});

//watch task
gulp.task('watch',function(){
    gulp.watch(jsSources,['js-watch']);
    gulp.watch(phpSources,['php-watch']);
    gulp.watch(includeSources,['include-watch']);
});

// create a task that ensures the `js` task is complete before
// reloading browsers
gulp.task('js-watch', ['js'], function (done) {
    browserSync.reload();
    done();
});

// create a task that ensures the `php` task is complete before
// reloading browsers
gulp.task('php-watch', ['php'], function (done) {
    browserSync.reload();
    done();
});

// create a task that ensures the `include` task is complete before
// reloading browsers
gulp.task('include-watch', ['includes'], function (done) {
    browserSync.reload();
    done();
});

//***************** try 1 ******************
//gulp.task('connect', function() {
//  connect.server({base : 'builds/development',port: 8010, keepalive: true});
//});
//
//gulp.task('browser-sync',['connect'], function() {
//    browserSync.init(null,{
//        proxy: '127.0.0.1:8010',
//        port: 8080,
//        open: true,
//        notify: false
//    });
//});
//
//gulp.task('default',['js','browser-sync','watch']);

//***************** try 2 ******************
//gulp.task('connect-sync', function() {
//  connect.server({base : 'builds/development'}, function (){
//    browserSync({
//      proxy: '127.0.0.1:8000'
//    });
//  });
// 
//  gulp.watch('**/*.php').on('change', function () {
//    browserSync.reload();
//      
//  });
//});
//gulp.task('default',['js','connect-sync']); 


//***************** try 3 ******************
gulp.task('browserSync',['connect'], function() {
    browserSync.init({
        proxy:'127.0.0.1:8010',
        port:8080,
        open: true,
        notify :false
    });
});

gulp.task('connect', function() {
  connect.server({base : 'builds/development',                  
                  port : 8010,
                  keepalive: true
                 });
});



gulp.task('default',['js','watch','browserSync']);    




