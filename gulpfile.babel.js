'use strict';

import gulp from 'gulp';
import sass from 'gulp-sass';
import svgmin from 'gulp-svgmin';
import rename from 'gulp-rename';
import svgstore from 'gulp-svgstore';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'gulp-autoprefixer';

gulp.task('svg', () => {
    return gulp.src(`assets/img/svg/*.svg`)
        .pipe(svgmin({js2svg: {pretty: false}}))
        .pipe(svgstore({inlineSvg: true}))
        .pipe(rename({basename: 'svg', prefix: '', suffix: '-sprite', extname: '.svg'}))
        .pipe(gulp.dest(`assets/img/`));
});

gulp.task('sass', () => {
    return gulp.src('assets/sass/**/*.scss')
        // .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'compact', // nested, expanded, compact, compressed
            includePaths: [`assets/sass`],
            indentType: 'space',
            indentWidth: 2,
            linefeed: 'crlf',
            sourceComments: false,
        }).on('error', sass.logError))
        // .pipe(sourcemaps.write('/'))
        .pipe(autoprefixer({
            browsers: ['last 3 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('./'));
});

gulp.task('watch', () => {
    gulp.watch('assets/sass/**/*.scss', gulp.series('sass'));
    gulp.watch('assets/img/svg/*.svg', gulp.series('svg'));
});

gulp.task('default', () => {
    gulp.watch('assets/sass/**/*.scss', gulp.series('sass'));
    gulp.watch('assets/img/svg/*.svg', gulp.series('svg'));
});
