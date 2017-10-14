var gulp = require('gulp'),
    sass = require('gulp-sass'),
    minify = require('gulp-minify');
    var sourcemaps = require('gulp-sourcemaps');
    const autoprefixer = require('gulp-autoprefixer');
    var rename = require('gulp-rename');
    var gulps = require("gulp-series");

    gulp.task('sass:watch', function () {
      gulp.watch('./sass/**/*.scss', ['sass']);
    });


  gulps.registerTasks({
    "js-min" : (function() {
      gulp.src('src/js/*.js')
        .pipe(minify({
          ext:{
            src:'-debug.js',
            min:'.min.js'
          },
          exclude: ['tasks'],
          ignoreFiles: ['.combo.js', '-min.js']
        }))
        .pipe(gulp.dest('js/'));
       console.log("js minification complete");
    }),
    "sass-compile" : (function () {
      return gulp.src('src/sass/includes.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(rename('style.css'))
        .pipe(gulp.dest('src/css/'));

      console.log("sass compilation complete");
    }),
    "sass-compile-print-styles" : (function () {
      return gulp.src('src/sass/print.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoprefixer({
          browsers: ['last 50 versions'],
          cascade: true
        }))
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(sourcemaps.write('./'))
        .pipe(rename('print.css'))
        .pipe(gulp.dest('css/'));

      console.log("print styles compilation complete");
    }),
    "autoprefixize" : (function () {
      gulp.src('src/css/style.css')
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoprefixer({
          browsers: ['last 50 versions'],
          cascade: true
        }))
        .pipe(gulp.dest('css/'))
    }),
    "sass-source-map" : (function () {
      gulp.src('src/sass/includes.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(rename('style.css'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('css/'));
    }),
    "sass-minify" : (function () {
      return gulp.src('css/style.css')
        .pipe(sass().on('error', sass.logError))
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(rename('style.min.css'))
        .pipe(gulp.dest('css/'));

      console.log("sass compilation complete");
    }),

  });

  gulp.task('watch', function() {
    gulp.watch('src/sass/*.scss', ['js-min', 'sass-compile', 'autoprefixize', 'sass-source-map', 'sass-minify', 'sass-compile-print-styles']);
    gulp.watch('src/js/*.js', ['js-min']);
  });

  gulps.registerSeries("default", ["js-min", "sass-compile",  "autoprefixize", "sass-source-map", "sass-minify", "sass-compile-print-styles" ]);
