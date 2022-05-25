// ## Notice
var noticeEnabled = true;
if(noticeEnabled) {
  console.log('*******************************************************');
  console.log('* WebEnertia Local Setup Guide available here:        *');
  console.log('*   n' +
      '                             *');
  console.log('* If you have any issues, run these commands:         *');
  console.log('*   npm i -g npm    (until version stays the same)    *');
  console.log('*   rm -rf node_modules                               *');
  console.log('*   npm install                                       *');
  console.log('* This is known to work with gulp 3.9.1 on npm 5.5.1  *');
  console.log('*******************************************************');
}

// ## Globals
var argv         = require('minimist')(process.argv.slice(2));
var autoprefixer = require('gulp-autoprefixer');
var browserSync  = require('browser-sync').create();
var changed      = require('gulp-changed');
var concat       = require('gulp-concat');
var flatten      = require('gulp-flatten');
var gulp         = require('gulp');
var gutil        = require('gulp-util');
var print        = require('gulp-print');
var gulpif       = require('gulp-if');
var imagemin     = require('gulp-imagemin');
var sort         = require('sort-stream')
//var jshint       = require('gulp-jshint');
var lazypipe     = require('lazypipe');
var less         = require('gulp-less');
var merge        = require('merge-stream');
var cssNano      = require('gulp-cssnano');
var plumber      = require('gulp-plumber');
var rev          = require('gulp-rev');
var runSequence  = require('run-sequence');
var sass         = require('gulp-sass');
var sourcemaps   = require('gulp-sourcemaps');
var uglify       = require('gulp-uglify');

// See https://github.com/austinpray/asset-builder
var manifest = require('asset-builder')('./manifest.json');

// `path` - Paths to base asset directories. With trailing slashes.
// - `path.source` - Path to the source files. Default: `assets/`
// - `path.dist` - Path to the build directory. Default: `dist/`
var path = manifest.paths;

// `config` - Store arbitrary configuration values here.
var config = manifest.config || {};

// `globs` - These ultimately end up in their respective `gulp.src`.
// - `globs.js` - Array of asset-builder JS dependency objects. Example:
//   ```
//   {type: 'js', name: 'main.js', globs: []}
//   ```
// - `globs.css` - Array of asset-builder CSS dependency objects. Example:
//   ```
//   {type: 'css', name: 'main.css', globs: []}
//   ```
// - `globs.fonts` - Array of font path globs.
// - `globs.images` - Array of image path globs.
// - `globs.bower` - Array of all the main Bower files.
var globs = manifest.globs;

// `project` - paths to first-party assets.
// - `project.js` - Array of first-party JS assets.
// - `project.css` - Array of first-party CSS assets.
var project = manifest.getProjectGlobs();

// CLI options
var enabled = {
  // Enable static asset revisioning when `--production`
  rev: argv.production,
  // Disable source maps when `--production`
  maps: !argv.production,
  // Fail styles task on error when `--production`
  failStyleTask: argv.production,
  // Fail due to JSHint warnings only when `--production`
  //failJSHint: argv.production,
  // Strip debug statments from javascript when `--production`
  stripJSDebug: argv.production
};

// Path to the compiled assets manifest in the dist directory
var revManifest = path.dist + 'manifest.json';

// Error checking; produce an error rather than crashing.
var onError = function(err) {
  console.log(err.toString());
  this.emit('end');
};

// ## Reusable Pipelines
// See https://github.com/OverZealous/lazypipe

// ### CSS processing pipeline
// Example
// ```
// gulp.src(cssFiles)
//   .pipe(cssTasks('main.css')
//   .pipe(gulp.dest(path.dist + 'styles'))
// ```
var cssTasks = function(filename) {
  return lazypipe()
      .pipe(function() {
        return gulpif(!enabled.failStyleTask, plumber());
      })
      .pipe(function() {
        return gulpif(enabled.maps, sourcemaps.init());
      })
      // .pipe(function() {
      //   return gulpif('*.less', less());
      // })
      .pipe(function() {
        return gulpif('*.scss', sass({
          outputStyle: 'nested',
          precision: 10,
          includePaths: ['.'],
          errLogToConsole: !enabled.failStyleTask
        }));
      })
      .pipe(concat, filename)
      .pipe(autoprefixer, {
        browsers: [
          'last 2 versions',
          'android 4',
          'opera 12'
        ]
      })
      // Minify CSS
      .pipe(cssNano, {
        safe: true
      })
      .pipe(function() {
        return gulpif(enabled.rev, rev());
      })
      .pipe(function() {
        return gulpif(enabled.maps, sourcemaps.write('.', {
          sourceRoot: 'assets/styles/'
        }));
      })();
};

// ### JS processing pipeline
// Example
// ```
// gulp.src(jsFiles)
//   .pipe(jsTasks('main.js')
//   .pipe(gulp.dest(path.dist + 'scripts'))
// ```
var jsTasks = function(filename) {
  return lazypipe()
      .pipe(function() {
        return gulpif(enabled.maps, sourcemaps.init());
      })
      .pipe(concat, filename)
      // Minify scripts
      .pipe(uglify, {
        mangle: false
      })
      .pipe(function() {
        return gulpif(enabled.rev, rev());
      })
      .pipe(function() {
        return gulpif(enabled.maps, sourcemaps.write('.', {
          sourceRoot: 'assets/scripts/'
        }));
      })();
};

// ### Write to rev manifest
// If there are any revved files then write them to the rev manifest.
// See https://github.com/sindresorhus/gulp-rev
var writeToManifest = function(directory) {
  //console.log("Writing to manifest "+directory+" at "+path.dist);
  return lazypipe()
      .pipe(gulp.dest, path.dist + directory)
      .pipe(browserSync.stream, {match: 'dist/**/*.{js,css}'})
      .pipe(rev.manifest, revManifest, {
        base: path.dist,
        merge: true
      })
      .pipe(gulp.dest, path.dist)();
};

// ## Gulp tasks
// Run `gulp -T` for a task summary

// ### Homepage Styles
gulp.task('styles-pages', function() {

    // return gulp.src('./sass/**/*.scss')
  //     .pipe(sass().on('error', sass.logError))
  //     .pipe(gulp.dest('./css'));

  return gulp.src('templates/assets/pages/styles/scss/*.scss')
      // .pipe(function() {
      //     return gulpif(!enabled.failStyleTask, plumber());
      // })
      // .pipe(function() {
      //     return gulpif(enabled.maps, sourcemaps.init());
      // })
      .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
      .pipe(autoprefixer('last 2 versions'))
      // .pipe(function() {
      //     return gulpif(enabled.rev, rev());
      // })
      // .pipe(function() {
      //     return gulpif(enabled.maps, sourcemaps.write('.', {
      //         sourceRoot: 'templates/assets/pages/styles/scss/'
      //     }));
      // })
      .pipe(gulp.dest('templates/dist/styles'))
});

// ### Styles
// `gulp styles` - Compiles, combines, and optimizes Bower CSS and project CSS.
// By default this task will only log a warning if a precompiler error is
// raised. If the `--production` flag is set: this task will fail outright.
gulp.task('styles', ['wiredep'], function() {
  //runSequence('styles-components');
  //runSequence('styles-views');
  var merged = merge();
  manifest.forEachDependency('css', function(dep) {
    var cssTasksInstance = cssTasks(dep.name);
    if (!enabled.failStyleTask) {
      cssTasksInstance.on('error', function(err) {
        console.error(err.message);
        this.emit('end');
      });
    }
    merged.add(gulp.src(dep.globs, {base: 'styles'})
        .pipe(plumber({errorHandler: onError}))
        //.pipe(print())
        .pipe(cssTasksInstance));
  });
  return merged
      .pipe(writeToManifest('styles'));
});

// Condensed CSS Tasks function without concat
var compileStyles = (function(){
  return lazypipe() .pipe(function() { return gulpif(!enabled.failStyleTask, plumber()); }) .pipe(function() { return gulpif(enabled.maps, sourcemaps.init()); }) .pipe(function() { return gulpif('*.less', less()); }) .pipe(function() { return gulpif('*.scss', sass({ outputStyle: 'expanded', precision: 10, includePaths: ['.'], errLogToConsole: !enabled.failStyleTask })); }) .pipe(autoprefixer, { browsers: [ 'last 2 versions', 'android 4', 'opera 12' ] }) /* .pipe(cssNano, { safe: true }) */ .pipe(function() { return gulpif(enabled.rev, rev()); }) .pipe(function() { return gulpif(enabled.maps, sourcemaps.write('.', { sourceRoot: 'assets/styles/' }));}); })();

// ### Styles for components
/*
gulp.task('styles-components', function() {
    return gulp.src('assets/styles/components/*.scss')
      .pipe(compileStyles())
      .pipe(gulp.dest('dist/styles/components'));
});
*/

// ### Styles for views
/*
gulp.task('styles-views', function() {
    return gulp.src('assets/styles/views/*.scss')
      .pipe(compileStyles())
      .pipe(gulp.dest('dist/styles/views'));
});
*/

// ### Scripts
// `gulp scripts` - Runs JSHint then compiles, combines, and optimizes Bower JS
// and project JS.
gulp.task('scripts', function() {
  var merged = merge();
  manifest.forEachDependency('js', function(dep) {
    //console.log(dep.name);
    merged.add(
        gulp.src(dep.globs, {base: 'scripts'})
            .pipe(gulpif(dep.name == 'components.js', sort(function (a, b) {
              //console.log(a.history[0]);
              //console.log(b.history[0]);
              return a.history[0].localeCompare(b.history[0]);
            })))
            //.pipe(print())
            .pipe(plumber({errorHandler: onError}))
            .pipe(jsTasks(dep.name))
    );
  });
  return merged
      .pipe(writeToManifest('scripts'));
});

// ### Fonts
// `gulp fonts` - Grabs all the fonts and outputs them in a flattened directory
// structure. See: https://github.com/armed/gulp-flatten
gulp.task('fonts', function() {
  return gulp.src(globs.fonts)
      .pipe(flatten())
      .pipe(gulp.dest(path.dist + 'fonts'))
      .pipe(browserSync.stream());
});

// ### Images
// `gulp images` - Run lossless compression on all the images.
gulp.task('images', function() {
  return gulp.src(globs.images)
      .pipe(imagemin([
        imagemin.jpegtran({progressive: true}),
        imagemin.gifsicle({interlaced: true}),
        imagemin.svgo({plugins: [{removeUnknownsAndDefaults: false}, {cleanupIDs: false}]})
      ]))
      .pipe(gulp.dest(path.dist + 'images'))
      .pipe(browserSync.stream());
});

// ### JSHint
// `gulp jshint` - Lints configuration JSON and project JS.
/*
gulp.task('jshint', function() {
  return gulp.src([
    'bower.json', 'gulpfile.js'
  ].concat(project.js))
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'))
    .pipe(gulpif(enabled.failJSHint, jshint.reporter('fail')));
});
*/

// ### Clean
// `gulp clean` - Deletes the build folder entirely.
gulp.task('clean', require('del').bind(null, [path.dist]));

// ### Watch
// `gulp watch` - Use BrowserSync to proxy your dev server and synchronize code
// changes across devices. Specify the hostname of your dev server at
// `manifest.config.devUrl`. When a modification is made to an asset, run the
// build step for that asset and inject the changes into the page.
// See: http://www.browsersync.io
gulp.task('watch', function() {
  browserSync.init({
    files: ['**/*.php', '*.php', 'dist/**/*.{js,css}'],
    open: false,
    watchTask: true,
    proxy: config.devUrl,
    host: config.devUrl,
    //port: 3000,
    port: 4000,
    snippetOptions: {
      whitelist: ['/wp-admin/admin-ajax.php'],
      blacklist: ['/wp-admin/**'],
    }
  });
  gulp.watch([path.source + 'styles/**/*'], ['styles']);
    // gulp.watch([path.source + 'pages/styles/**/*'], ['styles-pages']);
    gulp.watch([path.source + 'scripts/**/*'], ['scripts']);
  gulp.watch([path.source + 'fonts/**/*'], ['fonts']);
  gulp.watch([path.source + 'images/**/*'], ['images']);
  gulp.watch(['bower.json', 'assets/manifest.json'], ['build']);
  gulp.watch(['**/*.html'], ['build']);
  gulp.watch(['*.html'], ['build']);
});

// ### Build
// `gulp build` - Run all the build tasks but don't clean up beforehand.
// Generally you should be running `gulp` instead of `gulp build`.
gulp.task('build', function(callback) {
  runSequence('styles',
      'styles-pages',
      'scripts',
      ['fonts', 'images'],
      callback);
});

// ### Wiredep
// `gulp wiredep` - Automatically inject Less and Sass Bower dependencies. See
// https://github.com/taptapship/wiredep
gulp.task('wiredep', function() {
  var wiredep = require('wiredep').stream;
  return gulp.src(project.css)
      .pipe(wiredep())
      .pipe(changed(path.source + 'styles', {
        hasChanged: changed.compareSha1Digest
      }))
      .pipe(gulp.dest(path.source + 'styles'));
});

// ### Gulp
// `gulp` - Run a complete build. To compile for production run `gulp --production`.
gulp.task('default', ['clean'], function() {
  gulp.start('build');
});
