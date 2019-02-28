// including plugins
var gulp = require('gulp')
var sass = require('gulp-sass');

sass.compiler = require('node-sass');

var minifyCss = require("gulp-minify-css");
var rename = require('gulp-rename');

var uglify = require('gulp-uglifyjs');
var concat = require('gulp-concat-multi');

debug = require('gulp-debug');

gulp.task('watch', function () {
  gulp.watch('css/*.css', gulp.series('minify-css'));
});

//task css
gulp.task('minify-css', function (done) {
  gulp.src(['css/*.css', '!css/*.min.css'])
    .pipe(minifyCss())
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('dist/css'))
  done();
});


var paths = {
  styles: {
    src: 'scss/styles.scss',
    dest: 'test/'
  }
}



gulp.task('sass', function (done) {
  return gulp.src('scss/styles.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./test'));
  done();
});

// task sass
gulp.task('styles', function (done) {
  return sass(paths.styles.src, {
      style: 'expanded',
      quiet: true,
      "sourcemap=none": true
    })
    // .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(minifycss())
    .pipe(gulp.dest(paths.styles.dest));
  done();
});


//task JS
gulp.task('minify-js', function (done) {
  concat({
      'app.js': [
        'scripts/third/plugins/viewport-bugfill.js',
        'scripts/massive/plugins/MultiFilter.js',
        'scripts/main.js',
        'scripts/modules.js',
        'scripts/common.js',
        'scripts/services.js',
        'scripts/third/plugins/TweenMax.min.js',
        'scripts/third/plugins/is.js',
        'scripts/third/plugins/imagesLoaded.pkgd.min.js',
        //'scripts/massive/utils/NormalizeEvents.js',
        'scripts/third/plugins/typeahead.bundle.js',
        'scripts/third/plugins/isotope.js',
        'scripts/third/plugins/packery.pckg.js',
        'scripts/third/jquery.ui.widget.js',
        'scripts/third/jquery.iframe-transport.js',
        'scripts/third/jquery.fileupload.js',
        'scripts/third/plugins/enquire.js',
        'bower_components/lodash/dist/lodash.compat.js',
        'bower_components/backbone/backbone.js',
        'scripts/third/backbone.analytics.js',
        'scripts/third/plugins/ScrollToPlugin.min.js',
        'scripts/third/plugins/jquery.validate.min.js',
        'scripts/third/plugins/jquery.validate.extend.js',
        'scripts/third/plugins/jquery.easing.1.3.js',
        //'scripts/third/plugins/noframework.waypoints.min.js',
        'scripts/third/plugins/TimelineMax.js',
        'scripts/third/plugins/iscroll.js',
        'scripts/third/plugins/mockjax.min.js',
        'scripts/third/plugins/froogaloop.min.js',
        'scripts/massive/plugins/MassiveSlider.js'
      ]
    })
    .pipe(uglify())
    .pipe(debug())
    .pipe(gulp.dest('dist/js'));
  done();
})


gulp.task('minify-js-profissoes', function () {
  gulp.src(['scripts/profissoes.js'])
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(uglify())
    .pipe(gulp.dest('dist/js'))
});



var gcmq = require('gulp-group-css-media-queries');

// task
gulp.task('combine-css', function (done) {
  gulp.src('css/styles.css', 'css/profissoes.css')
    .pipe(gcmq())
    .pipe(gulp.dest('css/combined'));
  done();
});

// gulp.task('build', function(done) {
//   sequence('clean', ['pages', 'sass', 'javascript', 'images', 'copy'], 'styleguide', done);
// });