var $ = require('gulp-load-plugins')(),
    watchify = require('watchify'),
    browserify = require('browserify'),
    gulp = require('gulp'),
    source = require('vinyl-source-stream'),
    buffer = require('vinyl-buffer'),
    assign = require('lodash.assign'),
    glob = require('glob'),
    browser = require("browser-sync").create(),
    babelify = require('babelify');

// Config
var config = require('./gulpfile.config')();

/**
 *   Server Task
 * 
 */
 gulp.task('server', function(){
    browser.init({
        proxy: config.document_root // Document root
    });
 });

/**
 *   JS Task
 * 
 */
gulp.task('watchify', function(){
    jsComplie(true);
});

gulp.task('browserify', function(){
    jsComplie(false);
});

// var srcFile = glob.sync(config.js.app),
var srcFile = glob.sync(config.js.app, { ignore : config.js.ignore }),
    browserifyOp = {
        cache: {},
        packageCache: {},
        entries: srcFile,
        debug: true
    },
    options = assign({}, watchify.args, browserifyOp);
    console.log(srcFile);
function jsComplie(isWatch) {

    var b, rebundle;

    if (isWatch) {

        b = watchify(browserify(options).transform(babelify));

        rebundle = function () {
            return b.bundle()
                    .on('error', function(err){
                        console.log($.util.colors.red(err.message));
                        this.emit('end');
                     })
                    .pipe(source(config.js.bundled))
                    .pipe(gulp.dest(config.js.dist));
        };

        b.on('update', rebundle);
        b.on('log', $.util.log);

    } else {

        b = browserify(options).transform(babelify);

        rebundle = function () {
            return b.bundle()
                    .on('error', function(err){
                        console.log($.util.colors.red(err.message));
                        this.emit('end');
                     })
                    .pipe(source(config.js.bundled))
                    .pipe(buffer())
                    .pipe($.sourcemaps.init({ loadMaps: true }))
                    .pipe($.uglify())
                    .pipe($.sourcemaps.write('./'))
                    .pipe(gulp.dest(config.js.dist));
        };

    }
    return rebundle();

}

/**
 *   CSS Task
 * 
 */
gulp.task('css', cssBundle);
function cssBundle() {
    return gulp.src(config.css.app)
               // .pipe($.sass().on('error', sass.logError))
               .pipe($.plumber({
                    errorHander: function(err){
                        console.log(err.messageFormatted);
                        this.emit('end');
                    }
                }))
               .pipe($.sass({outputStyle: 'compressed'}))
               .pipe($.autoprefixer())
               .pipe(gulp.dest(config.css.dist));
}

/**
 *   Use Ref Task
 *   - Optimize CSS and JavaScript files
 * 
 */

gulp.task('useref', function(){
    // return gulp.src(config.html.app)
    //            .pipe($.useref({
    //                 base: '../' // Specify the output folder relative to the 'config.html.dist'
    //            }))
    //            .pipe($.if('*.js', $.uglify()))
    //            .pipe($.if('*.css', $.cssnano()))
    //            // .pipe($.if('*.js', gulp.dest(config.js.dist)))
    //            // .pipe($.if('*.css', gulp.dest(config.css.dist)))
    //            // .pipe($.if('*.php', gulp.dest(config.html.dist)));
    //            .pipe(gulp.dest(config.html.dist));

    var cssFilter = $.filter(['**/*.css'], { restore: true });
    var jsFilter = $.filter(['**/*.js'], { restore: true });
    var phpFilter = $.filter(['**/*.php'], { restore: true });

    var stream = gulp.src(config.html.app)
        .pipe($.useref({
            base: '../'
        }))
        .pipe(cssFilter)
        .pipe($.cssnano())
        .pipe(gulp.dest(config.css.dist))
        .pipe(cssFilter.restore)
        .pipe(jsFilter)
        .pipe($.uglify())
        .pipe(gulp.dest(config.js.dist))
        .pipe(jsFilter.restore)
        .pipe(phpFilter)
        .pipe(gulp.dest(config.html.dist));
    return stream;
});

/**
 *  Image Task
 *  - Optimize the images
 * 
 */
gulp.task('images', function(){
    return gulp.src(config.img.app)
               .pipe($.cache($.imagemin()))
               .pipe(gulp.dest(config.img.dist));
});

/**
 *  Fonts Task
 *  - Copying fonts to dist
 * 
 */
gulp.task('fonts', function(){
    return gulp.src(config.fonts.app)
               .pipe(gulp.dest(config.fonts.dist));
});

/**
 *  Clean up files Task
 * 
 */
var del = require('del');
gulp.task('clean:dist', function(){
    return  del.sync('dist');
});

/**
 *  Combining Gulp Task
 *  - Clean up generated files
 *  - Create JS, CSS, Image, Fonts and put them into dist folder
 *  - Optimize JS and CSS
 * 
 */
var runSequence = require('run-sequence');
gulp.task('build', function(callback){
    runSequence('clean:dist', ['browserify', 'css', 'images', 'fonts'], 'useref', callback);
});

gulp.task('load', function(){
    gulp.watch('./app/*.php', ['useref']);
    gulp.watch('./app/**', function(){
        browser.reload();
    });
});

/**
 *  Watching Task
 *  - Reload server
 *  - Watch task with JS and CSS
 * 
 */
gulp.task('watch', ['watchify'], function(){
    gulp.watch(config.css.app, ['css']);
});

// Default 
gulp.task('default', function(callback){
    runSequence(['watch'], callback);
});
